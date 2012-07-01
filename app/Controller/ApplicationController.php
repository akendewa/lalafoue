<?php
/**
 * Controlleur principal
 *
 * Contient l'action pour la page d'Accueil
 *
 * @copyright     Copyright 2012, Akendewa. (http://www.akendewa.org)
 * @author        Regis Bamba (regis.bamba@gmail.com)
 * @package       app.Controller
 * @since         v 0.1.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');
class ApplicationController extends AppController {

    public function beforeFilter() {
        $this->Auth->allow('*');
    }

    public function index() {
        $this->set('title_for_layout', 'Bienvenue');
        $this->layout = 'application';
    }
}
