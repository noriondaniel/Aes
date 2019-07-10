<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Boxs Controller
 *
 * @property \App\Model\Table\BoxsTable $Boxs
 *
 * @method \App\Model\Entity\Box[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BoxsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $boxs = $this->paginate($this->Boxs);

        $this->set(compact('boxs'));
    }

    /**
     * View method
     *
     * @param string|null $id Box id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $box = $this->Boxs->get($id, [
            'contain' => ['Rentals']
        ]);

        $this->set('box', $box);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $box = $this->Boxs->newEntity();
        if ($this->request->is('post')) {
            $box = $this->Boxs->patchEntity($box, $this->request->getData());
            if ($this->Boxs->save($box)) {
                $this->Flash->success(__('The box has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The box could not be saved. Please, try again.'));
        }
        $this->set(compact('box'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Box id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $box = $this->Boxs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $box = $this->Boxs->patchEntity($box, $this->request->getData());
            if ($this->Boxs->save($box)) {
                $this->Flash->success(__('The box has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The box could not be saved. Please, try again.'));
        }
        $this->set(compact('box'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Box id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $box = $this->Boxs->get($id);
        if ($this->Boxs->delete($box)) {
            $this->Flash->success(__('The box has been deleted.'));
        } else {
            $this->Flash->error(__('The box could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
