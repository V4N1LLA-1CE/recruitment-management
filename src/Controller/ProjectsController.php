<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Get limit for pagination
        $limit = $this->request->getQuery('limit', 10);

        // Base query with containments
        $query = $this->Projects->find()
            ->contain(['Contractors', 'Organisations', 'Skills']);

        // Get all skills for filter checkboxes
        $skills = $this->Projects->Skills->find('list', [
            'keyField' => 'id',
            'valueField' => 'skill_name'
        ])->toArray();

        // Get status options
        $statusOptions = [
            '0' => 'In Progress',
            '1' => 'Completed'
        ];

        // Apply skills filter
        $selectedSkills = $this->request->getQuery('skills', []);
        if (is_array($selectedSkills) && !empty(array_filter($selectedSkills))) {
            $query->leftJoinWith('Skills')
                ->where(['Skills.id IN' => $selectedSkills])
                ->group(['Projects.id']);
        }

        // Apply status filter
        $status = $this->request->getQuery('status');
        if (isset($status) && $status !== '') {
            $query->where(['Projects.complete' => $status]);
        }

        // Apply date range filter
        $startDate = $this->request->getQuery('start_date');
        $endDate = $this->request->getQuery('end_date');

        if (!empty($startDate) && !empty($endDate)) {
            $query->where([
                'Projects.project_due_date >=' => $startDate,
                'Projects.project_due_date <=' => $endDate . ' 23:59:59'
            ]);
        } elseif (!empty($startDate)) {
            $query->where(['Projects.project_due_date >=' => $startDate]);
        } elseif (!empty($endDate)) {
            $query->where(['Projects.project_due_date <=' => $endDate . ' 23:59:59']);
        }

        // Apply sorting
        $sort = $this->request->getQuery('sort');
        if (!empty($sort)) {
            switch ($sort) {
                case 'name':
                    $query->order(['project_name' => 'ASC']);
                    break;
                case 'due_date':
                    $query->order(['project_due_date' => 'ASC']);
                    break;
                case 'status':
                    $query->order(['complete' => 'ASC']);
                    break;
            }
        }

        // Set up pagination
        $projects = $this->paginate($query, [
            'limit' => (int)$limit,
            'maxLimit' => 1000
        ]);

        $this->set(compact('projects', 'skills', 'statusOptions'));
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, contain: ['Contractors', 'Organisations', 'Skills']);
        $this->set(compact('project'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEmptyEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }

        $contractors = $this->Projects->Contractors->find('list', [
            'keyField' => 'id',
            'valueField' => function ($contractor) {
                return $contractor->first_name . ' ' . $contractor->last_name;
            },
            'limit' => 200
        ])->all();

        $organisations = $this->Projects->Organisations->find('list', [
            'keyField' => 'id',
            'valueField' => 'business_name',
            'limit' => 200
        ])->all();

        $skills = $this->Projects->Skills->find('list', [
            'keyField' => 'id',
            'valueField' => 'skill_name',
            'limit' => 200
        ])->all();
        $this->set(compact('project', 'contractors', 'organisations', 'skills'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, contain: ['Skills']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $contractors = $this->Projects->Contractors->find('list', [
            'keyField' => 'id',
            'valueField' => function ($contractor) {
                return $contractor->first_name . ' ' . $contractor->last_name;
            },
            'limit' => 200
        ])->all();

        $organisations = $this->Projects->Organisations->find('list', [
            'keyField' => 'id',
            'valueField' => 'business_name',
            'limit' => 200
        ])->all();

        $skills = $this->Projects->Skills->find('list', [
            'keyField' => 'id',
            'valueField' => 'skill_name',
            'limit' => 200
        ])->all();
        $this->set(compact('project', 'contractors', 'organisations', 'skills'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
