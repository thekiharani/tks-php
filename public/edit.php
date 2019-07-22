<?php
require_once '../models/Post.php';
$model = new Post;
require_once 'layouts/_navbar.php';
$post = $model->firstOrFail($_GET['id']);
?>
	<div class="container my-5">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<h3>Edit Post</h3>
				<form action="actions/posts.php" method="POST">
					<div class="form-group">
						<input type="text" name="title" class="form-control" placeholder="Post Title" value="<?=$post->title; ?>" required>
					</div>
					<div class="form-group">
						<textarea name="body" class="form-control" placeholder="Post Body" rows="6" required><?=$post->body; ?></textarea>
					</div>
					<input type="hidden" name="id" value="<?=$_GET['id']; ?>">
					<div class="form-group">
						<input type="submit" name="update" class="btn btn-primary btn-lg btn-block" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>