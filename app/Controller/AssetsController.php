<?php
App::uses('AppController', 'Controller');

/**
 * Assets Controlleur
 *
 * Gere l'activite relative aux ressources.
 *
 * @copyright     Copyright 2012, Akendewa. (http://www.akendewa.org)
 * @author        Regis Bamba (regis.bamba@gmail.com)
 * @package       app.Controller
 * @since         v 0.1.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

class AssetsController extends AppController {

    public function add() {
        if (isset($this->request->query['event_id'])) {
            $event_id = $this->request->query['event_id'];
        }
        if ($this->request->is('post')) {
            $this->Asset->create();
            if ($this->Asset->save($this->request->data)) {
                $this->Session->setFlash(__('The asset has been saved', 'default', array('class' => 'alert alert-success')));
                $this->redirect(array('controller' => 'events', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The asset could not be saved. Please, try again.', 'default', array('class' => 'alert alert-error')));
            }
        }
        $events = $this->Asset->Event->find('list');
        $this->set(compact('events', 'event_id'));
    }

    public function edit($id = null) {
        $this->Asset->id = $id;
        if (!$this->Asset->exists()) {
            throw new NotFoundException(__('Invalid asset'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Asset->save($this->request->data)) {
                $this->Session->setFlash(__('The asset has been saved'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('controller' => 'events', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The asset could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        } else {
            $this->request->data = $this->Asset->read(null, $id);
        }
        $events = $this->Asset->Event->find('list');
        $this->set(compact('events'));
    }

    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Asset->id = $id;
        if (!$this->Asset->exists()) {
            throw new NotFoundException(__('Invalid asset'));
        }
        if ($this->Asset->delete()) {
            $this->Session->setFlash(__('Asset deleted'), 'default', array('class' => 'alert alert-success'));
            $this->redirect(array('controller' => 'events', 'action' => 'index', 'admin' => false));
        }
        $this->Session->setFlash(__('Asset was not deleted'), 'default', array('class' => 'alert alert-error'));
        $this->redirect(array('controller' => 'events', 'action' => 'index', 'admin' => false));
    }

}
