<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ballots Controller
 *
 * @property \App\Model\Table\BallotsTable $Ballots
 *
 * @method \App\Model\Entity\Ballot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BallotsController extends AppController
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
        $ballots = $this->paginate($this->Ballots);

        $this->set(compact('ballots'));
    }

    /**
     * View method
     *
     * @param string|null $id Ballot id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ballot = $this->Ballots->get($id, [
            'contain' => ['Clients', 'Purchases']
        ]);
        
        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Ballot_' . $id . '.pdf'
            ]
        ]);
        $this->set('ballot', $ballot);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ballot = $this->Ballots->newEntity();
        if ($this->request->is('post')) {
            $ballot = $this->Ballots->patchEntity($ballot, $this->request->getData());
            if ($this->Ballots->save($ballot)) {
                $this->Flash->success(__('The ballot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ballot could not be saved. Please, try again.'));
        }
        $clients = $this->Ballots->Clients->find('list', ['limit' => 200]);
        $this->set(compact('ballot', 'clients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ballot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ballot = $this->Ballots->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ballot = $this->Ballots->patchEntity($ballot, $this->request->getData());
            if ($this->Ballots->save($ballot)) {
                $this->Flash->success(__('The ballot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ballot could not be saved. Please, try again.'));
        }
        $clients = $this->Ballots->Clients->find('list', ['limit' => 200]);
        $this->set(compact('ballot', 'clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ballot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ballot = $this->Ballots->get($id);
        if ($this->Ballots->delete($ballot)) {
            $this->Flash->success(__('The ballot has been deleted.'));
        } else {
            $this->Flash->error(__('The ballot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
