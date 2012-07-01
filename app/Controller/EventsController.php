<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

/**
 * Events Controlleur
 *
 * Gere l'activite relative aux evenements.
 *
 * @copyright     Copyright 2012, Akendewa. (http://www.akendewa.org)
 * @author        Regis Bamba (regis.bamba@gmail.com)
 * @package       app.Controller
 * @since         v 0.1.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

class EventsController extends AppController {

    public $paginate = array('order' => array('Event.start_date' => 'DESC'));

    public function beforeFilter() {
        $this->Auth->Allow('api_list', 'api_get');
        parent::beforeFilter();
    }

    public function api_list() {
        $events = $this->Event->find('all', array('order' => array('start_date' => 'ASC')));
        $this->set(compact('events'));
        $this->set('_serialize', array('events'));
    }

    public function api_get($id) {
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException();
        }
        $this->set('event', $this->Event->read(null, $id));
        $this->set('_serialize', array('event'));
    }

    public function api_search() {
        $this->request->query = Sanitize::clean($this->request->query, array('encode' => false));
        $findConditions = Array();
        if (isset($this->request->query['start_date']) && $this->request->query['start_date'] != '') {
            $findConditions['AND']['Event.start_date LIKE'] = '%'.$this->request->query['start_date'].'%';
        }
        if (isset($this->request->query['end_date']) && $this->request->query['end_date'] != '') {
            $findConditions['AND']['Event.end_date LIKE'] = '%'.$this->request->query['end_date'].'%';
        }
        if (isset($this->request->query['keyword']) && $this->request->query['keyword'] != '') {
            $findConditions['AND']['OR']['Event.headline LIKE'] = '%'.$this->request->query['keyword'].'%';
            $findConditions['AND']['OR']['Event.description LIKE'] = '%'.$this->request->query['keyword'].'%';
        }

        $events = $this->Event->find('all', array('order' => array('start_date' => 'ASC'), 'conditions' => $findConditions));

        $this->set(compact('events'));
        $this->set('_serialize', array('events'));
    }

    public function index() {
        $events = $this->paginate();
        $this->set(compact('events'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => true));
            $this->Event->create();
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        }
    }

    public function edit($id = null) {
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => true));
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-success'));
            }
        } else {
            $this->request->data = $this->Event->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->Event->delete()) {
            $this->Event->Asset->deleteAll(array('Asset.event_id' => $id));
            $this->Session->setFlash(__('Event deleted'), 'default', array('class' => 'alert alert-success'));
            $this->redirect(array('action' => 'index', 'admin' => false));
        }
        $this->Session->setFlash(__('Event was not deleted'), 'default', array('class' => 'alert alert-success'));
        $this->redirect(array('action' => 'edit', 'admin' => false, $id));
    }

}
