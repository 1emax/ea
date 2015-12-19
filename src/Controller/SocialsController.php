<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Socials Controller
 *
 * @property \App\Model\Table\SocialsTable $Socials
 */
class SocialsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'SocialTypes']
        ];
        $this->set('socials', $this->paginate($this->Socials));
        $this->set('_serialize', ['socials']);
    }

    /**
     * View method
     *
     * @param string|null $id Social id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $social = $this->Socials->get($id, [
            'contain' => ['Users', 'SocialTypes']
        ]);
        $this->set('social', $social);
        $this->set('_serialize', ['social']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $social = $this->Socials->newEntity();
        if ($this->request->is('post')) {
            $social = $this->Socials->patchEntity($social, $this->request->data);
            if ($this->Socials->save($social)) {
                $this->Flash->success(__('The social has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The social could not be saved. Please, try again.'));
            }
        }
        $users = $this->Socials->Users->find('list', ['limit' => 200]);
        $socialTypes = $this->Socials->SocialTypes->find('list', ['limit' => 200]);
        $this->set(compact('social', 'users', 'socialTypes'));
        $this->set('_serialize', ['social']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Social id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $social = $this->Socials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $social = $this->Socials->patchEntity($social, $this->request->data);
            if ($this->Socials->save($social)) {
                $this->Flash->success(__('The social has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The social could not be saved. Please, try again.'));
            }
        }
        $users = $this->Socials->Users->find('list', ['limit' => 200]);
        $socialTypes = $this->Socials->SocialTypes->find('list', ['limit' => 200]);
        $this->set(compact('social', 'users', 'socialTypes'));
        $this->set('_serialize', ['social']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Social id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $social = $this->Socials->get($id);
        if ($this->Socials->delete($social)) {
            $this->Flash->success(__('The social has been deleted.'));
        } else {
            $this->Flash->error(__('The social could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
