<!-- File: /app/View/Comments/index.ctp -->
<h1>Tous les commentaires</h1>
<table>
    <tr>
        <th>Sexe</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Prestation</th>
        <th>Date</th>
        <th>Commentaire</th>
        <th>Statut</th>
    </tr>

    <!-- Here is where we loop through our $comments array, printing out post info -->

    <?php foreach ($historys as $history): ?>
    <tr>
        <td><?php echo $history['Comment']['sex']; ?></td>
        <td><?php echo $history['Comment']['firstname']; ?></td>
        <td><?php echo $history['Comment']['lastname']; ?></td>
        <td><?php echo $history['Comment']['prestation']; ?></td>
        <td><?php echo $history['Comment']['created']; ?></td>
        <td><?php echo $history['Comment']['comment']; ?></td>
        <td><?php echo $history['Comment']['status']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($comment); ?>
</table>