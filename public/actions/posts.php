<?php

require_once '../../models/Post.php';
$post = new Post;

if(isset($_POST['save'])) {
	$response = $post->save();
	if($response == 'success') {
		header('Location: /');
	} else {
		echo $response;
	}
}

if(isset($_POST['update'])) {
	$response = $post->update($_POST['id']);
	if($response == 'success') {
		header('Location: /');
	} else {
		echo $response;
	}
}