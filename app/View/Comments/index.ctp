<!-- File: /app/View/Comments/index.ctp -->

<h1>Tous les comment</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $comments array, printing out post info -->

    <?php foreach ($comments as $comment): ?>
    <tr>
        <td><?php echo $comment['Comment']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($comment['Comment']['title'],
array('controller' => 'comments', 'action' => 'view', $comment['Comment']['id'])); ?>
        </td>
        <td><?php echo $comment['Comment']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($comment); ?>
</table>