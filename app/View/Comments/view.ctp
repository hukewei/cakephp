<!-- File: /app/View/Comments/view.ctp -->

<h1><?php echo h($comment['Comment']['title']); ?></h1>

<p><small>Created: <?php echo $comment['Comment']['created']; ?></small></p>

<p><?php echo h($comment['Comment']['comment']); ?></p>