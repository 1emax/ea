<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EventsTags Controller
 *
 * @property \App\Model\Table\EventsTagsTable $EventsTags
 */
class EventsTagsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events', 'Tags']
        ];
        $this->set('eventsTags', $this->paginate($this->EventsTags));
        $this->set('_serialize', ['eventsTags']);
    }

    /**
     * View method
     *
     * @param string|null $id Events Tag id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventsTag = $this->EventsTags->get($id, [
            'contain' => ['Events', 'Tags']
        ]);
        $this->set('eventsTag', $eventsTag);
        $this->set('_serialize', ['eventsTag']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventsTag = $this->EventsTags->newEntity();
        if ($this->request->is('post')) {
            $eventsTag = $this->EventsTags->patchEntity($eventsTag, $this->request->data);
            if ($this->EventsTags->save($eventsTag)) {
                $this->Flash->success(__('The events tag has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The events tag could not be saved. Please, try again.'));
            }
        }
        $events = $this->EventsTags->Events->find('list', ['limit' => 200]);
        $tags = $this->EventsTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('eventsTag', 'events', 'tags'));
        $this->set('_serialize', ['eventsTag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Events Tag id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventsTag = $this->EventsTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventsTag = $this->EventsTags->patchEntity($eventsTag, $this->request->data);
            if ($this->EventsTags->save($eventsTag)) {
                $this->Flash->success(__('The events tag has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The events tag could not be saved. Please, try again.'));
            }
        }
        $events = $this->EventsTags->Events->find('list', ['limit' => 200]);
        $tags = $this->EventsTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('eventsTag', 'events', 'tags'));
        $this->set('_serialize', ['eventsTag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Events Tag id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventsTag = $this->EventsTags->get($id);
        if ($this->EventsTags->delete($eventsTag)) {
            $this->Flash->success(__('The events tag has been deleted.'));
        } else {
            $this->Flash->error(__('The events tag could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
