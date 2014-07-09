<?php
class CommentsController extends AppController {
    public $helpers = array('Html', 'Form');
    public function index() {
        $this->set('comments', $this->Comment->find('all'));
    }
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid comment'));
        }

        $comment = $this->Comment->findById($id);
        if (!$comment) {
            throw new NotFoundException(__('Invalid comment'));
        }
        $this->set('comment', $comment);
    }
}
