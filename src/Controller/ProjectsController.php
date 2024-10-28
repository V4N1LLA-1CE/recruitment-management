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
        $projects = $this->Projects->find()
            ->contain(['Contractors', 'Organisations'])
            ->all();  // Get all projects without pagination

        $this->set(compact('projects'));
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
