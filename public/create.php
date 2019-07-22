	<?php require_once 'layouts/_navbar.php'; ?>
	<div class="container my-5">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<h3>New Post</h3>
				<form action="actions/posts.php" method="POST">
					<div class="form-group">
						<input type="text" name="title" class="form-control" placeholder="Post Title" required>
					</div>
					<div class="form-group">
						<textarea name="body" class="form-control" placeholder="Post Body" rows="6"  required></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="save" class="btn btn-primary btn-lg btn-block" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>