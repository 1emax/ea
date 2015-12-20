<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 */
class EventsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Places'],
            'conditions' => [
                'Events.user_id' => $this->Auth->user('id')
            ]
        ];
        $this->set('events', $this->paginate($this->Events));
        $this->set('_serialize', ['events']);
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Users', 'Places', 'Tags', 'Tickets']
        ]);
        $this->set('event', $event);
        $this->set('_serialize', ['event']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            $event->user_id = $this->Auth->user('id');
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $users = $this->Events->Users->find('list', ['limit' => 200]);
        $places = $this->Events->Places->find('list', ['limit' => 200]);
        $tags = $this->Events->Tags->find('list', ['limit' => 200]);
        $this->set(compact('event', 'users', 'places', 'tags'));
        $this->set('_serialize', ['event']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            $event->user_id = $this->Auth->user('id');
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $users = $this->Events->Users->find('list', ['limit' => 200]);
        $places = $this->Events->Places->find('list', ['limit' => 200]);
        $place = $this->Events->Places->get($event->place_id, [
            'contain' => ['Rooms']
        ]);
        $tags = $this->Events->Tags->find('list', ['limit' => 200]);
        $this->set(compact('event', 'users', 'places', 'tags', 'place'));
        $this->set('_serialize', ['event']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function tags()
    {
        // The 'pass' key is provided by CakePHP and contains all
        // the passed URL path segments in the request.
        $tags = $this->request->params['pass'];

        // Use the EventsTable to find tagged events.
        $events = $this->Events->find('tagged', [
            'tags' => $tags
            ])->where(['Events.user_id' => $this->Auth->user('id')]);

        // Pass variables into the view template context.
        $this->set([
            'events' => $events,
            'tags' => $tags
        ]);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];

        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'add', 'tags'])) {
            return true;
        }
        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            return false;
        }

        // Check that the event belongs to the current user.
        $id = $this->request->params['pass'][0];
        $event = $this->Events->get($id);
        if ($event->user_id == $user['id']) {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
