<!-- File: /app/View/Commercants/index.ctp -->

<h1>commercants</h1>
<p><?php echo $this->Html->link('Add Commercant', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Numero</th>
        <th>Nom</th>
		<th>Adresse</th>
		<th>Code Postal</th>
		<th>Ville</th>
		<th>Pays</th>
		<th>Téléphone</th>
		<th>Portable</th>
		<th>Email</th>
		<th>Activité</th>
        <th>site Web</th>
		<th>Actions</th>
    </tr>

    <?php foreach ($commercants as $commercant): ?>
    <tr>
        <td>
            <?php
                echo $this->Html->link(
                    $commercant['Commercant']['numero'],
                    array('action' => 'view', $commercant['Commercant']['id'])
                );
            ?>
        </td>
		<td><?php echo $commercant['Commercant']['nom']; ?></td>
		<td><?php echo $commercant['Commercant']['adresse']; ?></td>
		<td><?php echo $commercant['Commercant']['codepostal']; ?></td>
		<td><?php echo $commercant['Commercant']['ville']; ?></td>
		<td><?php echo $commercant['Commercant']['pays']; ?></td>
		<td><?php echo $commercant['Commercant']['telephone']; ?></td>
		<td><?php echo $commercant['Commercant']['portable']; ?></td>
		<td><?php echo $commercant['Commercant']['email']; ?></td>
		<td><?php echo $commercant['Commercant']['activite']; ?></td>
		<td><?php echo $commercant['Commercant']['site']; ?></td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $commercant['Commercant']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $commercant['Commercant']['id'])
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
