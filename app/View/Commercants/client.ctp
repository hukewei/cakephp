<!-- File: /app/View/Commercants/add.ctp -->

<h1>Add Commentaire</h1>
<?php

echo $this->Form->input('sex', array(
            'options' => array( 'homme' => 'Homme', 'femme' => 'Femme')
        ));
echo $this->Form->input('firstname');
echo $this->Form->input('lastname');
echo $this->Form->input('email');
echo $this->Form->input('title');
echo $this->Form->input('pays');
echo $this->Form->input('comment');
echo $this->Form->input('created');
echo $this->Form->input('email');
echo $this->Form->input('status');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('commercial', array('type' => 'hidden','value' => $com_id));
echo $this->Form->end('Save Commentaire');

?>