<?php
class AdministrateursController extends AppController {
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'commercants',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'comments',
                'action' => 'index',
                'home'
            ),
            'authenticate' => array(
                'Form' => array('userModel' => 'Administrateur'),
                'Basic' => array('userModel' => 'Administrateur')
            )
        )
    );

    public function index() {
        $this->Administrateur->recursive = 0;
        $this->set('administrateurs', $this->paginate());
    }

    public function view($id = null) {
        $this->Administrateur->id = $id;
        if (!$this->Administrateur->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('administrateur', $this->Administrateur->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Administrateur->create();
            if ($this->Administrateur->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
        $this->Administrateur->id = $id;
        if (!$this->Administrateur->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Administrateur->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->Administrateur->read(null, $id);
            unset($this->request->data['Administrateur']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Administrateur->id = $id;
        if (!$this->Administrateur->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Administrateur->delete()) {
            $this->Session->setFlash(__('Administrateur deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Administrateur was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow administrateurs to register and logout.
        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}