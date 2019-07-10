<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Workers Controller
 *
 * @property \App\Model\Table\WorkersTable $Workers
 *
 * @method \App\Model\Entity\Worker[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $workers = $this->paginate($this->Workers);

        $this->set(compact('workers'));
    }

    /**
     * View method
     *
     * @param string|null $id Worker id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $worker = $this->Workers->get($id, [
            'contain' => ['Users', 'Rentals']
        ]);

        $this->set('worker', $worker);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $worker = $this->Workers->newEntity();
        if ($this->request->is('post')) {
            $worker = $this->Workers->patchEntity($worker, $this->request->getData());
            if ($this->Workers->save($worker)) {
                $this->Flash->success(__('The worker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The worker could not be saved. Please, try again.'));
        }
        $users = $this->Workers->Users->find('list', ['limit' => 200]);
        $this->set(compact('worker', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Worker id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $worker = $this->Workers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $worker = $this->Workers->patchEntity($worker, $this->request->getData());
            if ($this->Workers->save($worker)) {
                $this->Flash->success(__('The worker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The worker could not be saved. Please, try again.'));
        }
        $users = $this->Workers->Users->find('list', ['limit' => 200]);
        $this->set(compact('worker', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Worker id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $worker = $this->Workers->get($id);
        if ($this->Workers->delete($worker)) {
            $this->Flash->success(__('The worker has been deleted.'));
        } else {
            $this->Flash->error(__('The worker could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
