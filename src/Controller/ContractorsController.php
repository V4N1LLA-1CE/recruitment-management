<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Contractors Controller
 *
 * @property \App\Model\Table\ContractorsTable $Contractors
 */
class ContractorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // get limit of datatable entries, if none use 10
        $limit = $this->request->getQuery('limit', 10);

        // Create query builder
        $query = $this->Contractors->find()
            ->contain(['Skills', 'Projects']);

        // Get all skills for the filter checkboxes
        $skills = $this->Contractors->Skills->find('list', [
            'keyField' => 'id',
            'valueField' => 'skill_name'
        ])->toArray();

        // Apply name filter only if name is not empty
        $name = trim($this->request->getQuery('name', ''));
        if (!empty($name)) {
            $query->where([
                'OR' => [
                    'first_name LIKE' => "%$name%",
                    'last_name LIKE' => "%$name%"
                ]
            ]);
        }

        // Apply email filter only if email is not empty
        $email = trim($this->request->getQuery('email', ''));
        if (!empty($email)) {
            $query->where(['contractor_email LIKE' => "%$email%"]);
        }

        // Apply skills filter only if skills are actually selected
        $selectedSkills = $this->request->getQuery('skills', []);
        if (is_array($selectedSkills) && !empty(array_filter($selectedSkills))) {
            $query->leftJoinWith('Skills')
                ->where(['Skills.id IN' => $selectedSkills])
                ->group(['Contractors.id']);
        }

        // Apply sorting only if a valid sort option is selected
        $sort = $this->request->getQuery('sort');
        if (!empty($sort)) {
            switch ($sort) {
                case 'name':
                    $query->order(['first_name' => 'ASC', 'last_name' => 'ASC']);
                    break;
                case 'email':
                    $query->order(['contractor_email' => 'ASC']);
                    break;
                case 'projects':
                    $query->select([
                        'Contractors.id',
                        'Contractors.first_name',
                        'Contractors.last_name',
                        'Contractors.phone_number',
                        'Contractors.contractor_email',
                        'project_count' => $query->func()->count('Projects.id')
                    ])
                        ->leftJoinWith('Projects')
                        ->group(['Contractors.id'])
                        ->order(['project_count' => 'DESC']);
                    break;
            }
        }

        // Set up pagination
        $contractors = $this->paginate($query, ['limit' => (int)$limit, 'maxLimit' => 1000]);
        $this->set(compact('contractors', 'skills'));
    }

    /**
     * View method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contractor = $this->Contractors->get($id, contain: ['Skills', 'Contacts', 'Projects']);
        $this->set(compact('contractor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contractor = $this->Contractors->newEmptyEntity();
        if ($this->request->is('post')) {
            $contractor = $this->Contractors->patchEntity($contractor, $this->request->getData());
            if ($this->Contractors->save($contractor)) {
                $this->Flash->success(__('The contractor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
        }
        $skills = $this->Contractors->Skills->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'skill_name'])->all();
        $this->set(compact('contractor', 'skills'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contractor = $this->Contractors->get($id, contain: ['Skills']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contractor = $this->Contractors->patchEntity($contractor, $this->request->getData());
            if ($this->Contractors->save($contractor)) {
                $this->Flash->success(__('The contractor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contractor could not be saved. Please, try again.'));
        }
        $skills = $this->Contractors->Skills->find('list', ['keyField' => 'id', 'valueField' => 'skill_name', 'limit' => 200])->all();

        $this->set(compact('contractor', 'skills'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contractor = $this->Contractors->get($id);
        if ($this->Contractors->delete($contractor)) {
            $this->Flash->success(__('The contractor has been deleted.'));
        } else {
            $this->Flash->error(__('The contractor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
