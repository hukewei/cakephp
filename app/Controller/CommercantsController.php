<?php
class CommercantsController extends AppController {
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'commercants',
                'action' => 'view'
            ),
            'logoutRedirect' => array(
                'controller' => 'comments',
                'action' => 'index',
                'home'
            ),
            'authenticate' => array(
                'Form' => array('userModel' => 'Commercant'),
                'Basic' => array('userModel' => 'Commercant')
            )
        )
    );

    public function index() {
        $this->set('commercants', $this->Commercant->find('all'));
    }
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid commercant'));
        }

        $commercant = $this->Commercant->findById($id);
        if (!$commercant) {
            throw new NotFoundException(__('Invalid commercant'));
        }
        $this->set('commercant', $commercant);
    }
	
	public function add() {
        if ($this->request->is('post')) {
            $this->Commercant->create();
            if ($this->Commercant->save($this->request->data)) {
                $this->Session->setFlash(__('Your commercant has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your commercant.'));
        }
    }

	public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid commercant'));
    }

    $commercant = $this->Commercant->findById($id);
		if (!$commercant) {
			throw new NotFoundException(__('Invalid commercant'));
		}

		if ($this->request->is(array('commercant', 'put'))) {
			$this->Commercant->id = $id;
			if ($this->Commercant->save($this->request->data)) {
				$this->Session->setFlash(__('Your commercant has been updated.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to update your commercant.'));
		}

		if (!$this->request->data) {
			$this->request->data = $commercant;
		}
	}

	public function to_com($id = null) {
	    if (!$id) {
	        throw new NotFoundException(__('Invalid commercant'));
	    }

    	return $this->redirect(array('controller' => 'comments', 'action' => 'history/'.$id));
	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Commercant->delete($id)) {
			$this->Session->setFlash(
				__('The commercant with id: %s has been deleted.', h($id))
			);
			return $this->redirect(array('action' => 'index'));
		}
	}

	public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect($this->redirect(array("controller" => "commercants", 
                      "action" => "view/".$this->Auth->user('id'))
                )));
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function client() {
    	$this->set('com_id', $this->params['pass'][0]);
        if ($this->request->is('post')) {
            $this->Comment->create();
            
            //$this->data['commercial'] = $this->params['pass'][0];
            
            if ($this->Comment->save($this->request->data)) {
                $this->Session->setFlash(__('Your commentaire has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your commentaire.'));
        }
    }
}

?>