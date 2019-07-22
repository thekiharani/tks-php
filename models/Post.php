<?php

require_once 'Crud.php';

class Post extends Crud {
	private $table = 'posts';

	// select all
	public function all() {
		$stmt = $this->connect->query('SELECT * FROM ' .$this->table. ' ORDER BY created_at DESC');
		return $stmt->fetchAll();
	}

	// save post
	public function save() {
		$sql = 'INSERT INTO '.$this->table.' (title, body, created_at) VALUES(:title, :body, :date)';
		$stmt = $this->connect->prepare($sql);
		try {
			$stmt->execute([
				'title' => $_POST['title'],
				'body' => $_POST['body'],
				'date' => date('Y-m-d H:i:s')
			]);
			return 'success';
		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}

	// find post
	public function firstOrFail($id) {
		$sql = 'SELECT * FROM '.$this->table.' WHERE id = :id LIMIT 1';
		$stmt = $this->connect->prepare($sql);
		$stmt->execute(['id' => $id]);
		return $stmt->fetch();
		/*if($stmt->rowCount() > 0) {
			return $stmt->fetch();
		} else {
			header('Location: /');
		}*/
	}

	// save post
	public function update($id) {
		$sql = 'UPDATE '.$this->table.' SET title = :title, body = :body, updated_at = :date WHERE id = :id';
		$stmt = $this->connect->prepare($sql);
		try {
			$stmt->execute([
				'id' => $id,
				'title' => $_POST['title'],
				'body' => $_POST['body'],
				'date' => date('Y-m-d H:i:s')
			]);
			return 'success';
		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}

}