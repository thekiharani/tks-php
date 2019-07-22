<?php

require_once '../models/Post.php';
$model = new Post;
require_once 'layouts/_navbar.php';
?>

	<div class="container my-5">
		<?php foreach ($model->all() as $key => $post): ?>
			<h3><?=$post->title; ?></h3>
			<p>
				<small>Posted: <?=date('d/m/Y | g:i a', strtotime($post->created_at)); ?></small>
				<small>Last Updated: <?=!is_null($post->updated_at) ? date('d/m/Y | g:i a', strtotime($post->updated_at)) : 'Never'; ?></small>
			</p>
			<p><?=$post->body; ?></p>
			<a href="/edit.php?id=<?=$post->id; ?>" class="btn btn-success">Edit</a>
			 <hr>
		<?php endforeach; ?>
	</div>
</body>
</html>