<!-- File: /app/View/Commercants/view.ctp -->

<h1>Numéro de siret: <?php echo h($commercant['Commercant']['numero']); ?></h1>

<p>nom: <?php echo h($commercant['Commercant']['nom']); ?></p>

<p>adresse: <?php echo h($commercant['Commercant']['adresse']); ?></p>

<p>codepostal: <?php echo h($commercant['Commercant']['codepostal']); ?></p>

<p>ville: <?php echo h($commercant['Commercant']['ville']); ?></p>

<p>pays: <?php echo h($commercant['Commercant']['pays']); ?></p>

<p>telephone: <?php echo h($commercant['Commercant']['telephone']); ?></p>

<p>portable: <?php echo h($commercant['Commercant']['portable']); ?></p>

<p>email: <?php echo h($commercant['Commercant']['email']); ?></p>

<p>activite: <?php echo h($commercant['Commercant']['activite']); ?></p>

<p>site: <?php echo h($commercant['Commercant']['site']); ?></p>

<?php echo $this->Html->link(
                    'voir commentaires', array('action' => 'to_com', $commercant['Commercant']['id'])
                ); ?>