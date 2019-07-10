<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Punishments Controller
 *
 * @property \App\Model\Table\PunishmentsTable $Punishments
 *
 * @method \App\Model\Entity\Punishment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PunishmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients']
        ];
        $punishments = $this->paginate($this->Punishments);

        $this->set(compact('punishments'));
    }

    /**
     * View method
     *
     * @param string|null $id Punishment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $punishment = $this->Punishments->get($id, [
            'contain' => ['Clients']
        ]);

        $this->set('punishment', $punishment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $punishment = $this->Punishments->newEntity();
        if ($this->request->is('post')) {
            $punishment = $this->Punishments->patchEntity($punishment, $this->request->getData());
            if ($this->Punishments->save($punishment)) {
                $this->Flash->success(__('The punishment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The punishment could not be saved. Please, try again.'));
        }
        $clients = $this->Punishments->Clients->find('list', ['limit' => 200]);
        $this->set(compact('punishment', 'clients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Punishment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $punishment = $this->Punishments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $punishment = $this->Punishments->patchEntity($punishment, $this->request->getData());
            if ($this->Punishments->save($punishment)) {
                $this->Flash->success(__('The punishment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The punishment could not be saved. Please, try again.'));
        }
        $clients = $this->Punishments->Clients->find('list', ['limit' => 200]);
        $this->set(compact('punishment', 'clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Punishment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $punishment = $this->Punishments->get($id);
        if ($this->Punishments->delete($punishment)) {
            $this->Flash->success(__('The punishment has been deleted.'));
        } else {
            $this->Flash->error(__('The punishment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
