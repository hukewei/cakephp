<!-- File: /app/View/Commercants/edit.ctp -->

<h1>Edit Commercant</h1>
<?php
echo $this->Form->create('Commercant');
echo $this->Form->input('username');
echo $this->Form->input('password');
        echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
echo $this->Form->input('numero');
echo $this->Form->input('nom');
echo $this->Form->input('adresse', array('rows' => '3'));
echo $this->Form->input('codepostal');
echo $this->Form->input('ville');
echo $this->Form->input('pays');
echo $this->Form->input('telephone');
echo $this->Form->input('portable');
echo $this->Form->input('email');
echo $this->Form->input('activite', array('rows' => '3'));
echo $this->Form->input('site');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Commercant');
?>