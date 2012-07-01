<?php

App::uses('AppController', 'Controller');

/**
 * Users Controlleur
 *
 * Gere l'activite relative aux utilisateurs.
 *
 * @copyright     Copyright 2012, Akendewa. (http://www.akendewa.org)
 * @author        Regis Bamba (regis.bamba@gmail.com)
 * @package       app.Controller
 * @since         v 0.1.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

class UsersController extends AppController {

    public function beforeFilter() {
        $this->Auth->allow('login');
        if (Configure::read('install')) {
            $this->Auth->allow('admin_add', 'admin_index');
        }
        parent::beforeFilter();
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Username or password is incorrect'), 'default', array('class' => 'alert alert-error'));
            }
        }
        $this->set('title_for_layout', __('Login'));
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    /**
      * admin_index method
      *
      * @return void
    */
    public function admin_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
      * admin_add method
      *
      * @return void
    */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        }
        $this->set('title_for_layout', __('Add a user account'));
    }

    /**
      * admin_edit method
      *
      * @param string $id
      * @return void
    */
    public function admin_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['User']['password']) && $this->request->data['User']['password'] == '') {
                unset($this->request->data['User']['password']);
            }
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
        $this->set('title_for_layout', 'Edit user');
    }

    /**
      * admin_delete method
      *
      * @param string $id
      * @return void
    */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
