<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Security;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\ORM\Entity;
use Cake\Datasource\ConnectionManager;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Clients', 'Workers']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
   public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            // validate the user-entered Captcha code 
            $isHuman = captcha_validate($this->request->data['CaptchaCode']); 

            // clear previous user input, since each Captcha code can only be validated once 
            unset($this->request->data['CaptchaCode']);
            
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($isHuman && $this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                Email::configTransport('mailtrap', [
                    'host' => 'smtp.mailtrap.io',
                    'port' => 2525,
                    'username' => '55c381ab14f46c',
                    'password' => 'f74ee5ce9f9269',
                    'className' => 'Smtp'
                ]);
                $emailTo=$user->email;
                $mytoken=$user->id;
                $email=new Email('default');
                $email->transport('mailtrap');
                $email->emailFormat('html');
                $email->from('lgomezp@unsa.edu.pe','Luis Gomez');
                $email->subject('Please confirm your email');
                $email->to($emailTo);
                $email->send('Hi <br/>Please confirm your email link below<br/><a href="http://localhost/plantillaFinal/users/verification/'.$mytoken.'">Verification Email</a><br/>Thank you for joining us');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function verification($id)
    {
        $connection = ConnectionManager::get('default');
        $connection->update('users', ['status' => 1], ['id'=>$id]);
    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            // validate the user-entered Captcha code 
            $isHuman = captcha_validate($this->request->data['CaptchaCode']); 

            // clear previous user input, since each Captcha code can only be validated once 
            unset($this->request->data['CaptchaCode']);
            
            $user = $this->Auth->identify();
            if ($user && $isHuman) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'add','verification']);
        
        // load the Captcha component and set its parameter 
        $this->loadComponent('CakeCaptcha.Captcha', [ 
            'captchaConfig' => 'ExampleCaptcha' 
        ]); 
    }
    
    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
}
