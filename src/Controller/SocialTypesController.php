<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SocialTypes Controller
 *
 * @property \App\Model\Table\SocialTypesTable $SocialTypes
 */
class SocialTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('socialTypes', $this->paginate($this->SocialTypes));
        $this->set('_serialize', ['socialTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Social Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $socialType = $this->SocialTypes->get($id, [
            'contain' => ['Socials']
        ]);
        $this->set('socialType', $socialType);
        $this->set('_serialize', ['socialType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $socialType = $this->SocialTypes->newEntity();
        if ($this->request->is('post')) {
            $socialType = $this->SocialTypes->patchEntity($socialType, $this->request->data);
            if ($this->SocialTypes->save($socialType)) {
                $this->Flash->success(__('The social type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The social type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('socialType'));
        $this->set('_serialize', ['socialType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Social Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $socialType = $this->SocialTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $socialType = $this->SocialTypes->patchEntity($socialType, $this->request->data);
            if ($this->SocialTypes->save($socialType)) {
                $this->Flash->success(__('The social type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The social type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('socialType'));
        $this->set('_serialize', ['socialType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Social Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $socialType = $this->SocialTypes->get($id);
        if ($this->SocialTypes->delete($socialType)) {
            $this->Flash->success(__('The social type has been deleted.'));
        } else {
            $this->Flash->error(__('The social type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
