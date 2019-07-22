<?php

require_once 'models/Post.php';

class Posts {
	private $model;

	// constructor
	public function __construct() {
		$this->model = new Post;
	}

	// select all
	public function renderPosts() {
		$posts = '';
		foreach ($this->model->all() as $key => $post) {
			$posts .= '
			<h3 style="color:green">'.$post->title.'</h3>
			<p style="color:red">'.$post->body.'</p>
			<hr>
			';
		}
		return $posts;
	}
}