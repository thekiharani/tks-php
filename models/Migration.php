<?php

require_once 'Crud.php';

class Migration Post extends Crud {
	private $table;

	// select all
	public function posts() {
		$this->table = "posts";
		try {
		    $sql ="
				DROP TABLE IF EXISTS $this->table;
				CREATE table $this->table(
					id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
					title VARCHAR(255) NOT NULL, 
					body TEXT NOT NULL,
					created_at TIMESTAMP DEFAULT NULL,
					updated_at TIMESTAMP DEFAULT NULL
				)
			;";
		    $pdo->exec($sql);
		    print("Created $this->table Table.\n");

		} catch(PDOException $e) {
			print_r($e->getMessage());
		}
		  
	}

	// save post
	public function save() {
		$sql = 'INSERT INTO '.$this->table.' (title, body) VALUES(:title, :body)';
		$stmt = $pdo->prepare($sql);
		try {
			$stmt->execute([
				'title' => $_POST['title'],
				'body' => $_POST['body']
			]);
			return 'success';
		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}

	// find post
	public function firstOrFail($id) {
		$sql = 'SELECT * FROM '.$this->table.' WHERE id = :id LIMIT 1';
		$stmt = $pdo->prepare($sql);
		$stmt->execute(['id' => $id]);
		if($stmt->rowCount() > 0) {
			return $stmt->fetch();
		} else {
			header('Location: /');
		}
	}

	// save post
	public function update($id) {
		$sql = 'UPDATE '.$this->table.' SET title = :title, body = :body WHERE id = :id';
		$stmt = $pdo->prepare($sql);
		try {
			$stmt->execute([
				'id' => $id,
				'title' => $_POST['title'],
				'body' => $_POST['body']
			]);
			return 'success';
		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}

}