<?php

require_once 'config.php';

require_once '../Posts.php';

$posts = new Posts;

echo $posts->renderPosts();

# PDO QUERY
/*$stmt = $pdo->query('SELECT * FROM posts');

while($post = $stmt->fetch()) {
	echo $post->title . '<hr>';
}*/

# PREPARED STSTEMENTS & NAMED PARAMETERS

# GET ALL ROWS
/*# all rows
$sql = 'SELECT * FROM posts'; 
$stmt = $pdo->query($sql);*/

# limit rows
$limit = 1;
$sql = 'SELECT * FROM posts LIMIT :limit'; // limit
$stmt = $pdo->prepare($sql);
$stmt->execute([
	'limit' => $limit
]);

$posts = $stmt->fetchAll();
print_r($posts);

# FILTER ROWS
/*$sql = 'SELECT * FROM posts WHERE title = :title && id= :id'; // or
$sql = 'SELECT * FROM posts WHERE title = :title';
$stmt = $pdo->prepare($sql);
$stmt->execute([
	'id' => 1,
	'title' => 'Post Two'
]);
$posts = $stmt->fetchAll(); // multiple
$posts = $stmt->fetch(); // single
// do what you want with the data
*/

# GET ROW COUNT
/*$sql = 'SELECT * FROM posts'; // can be any query
$stmt = $pdo->query($sql);
$postCount = $stmt->rowCount();
echo $postCount;*/

# INSERT DATA
/*$title = 'Post Four';
$body = 'This is our fourth post. We are happy you kept following. Thank you!';
$sql = 'INSERT INTO posts(title, body) VALUES(:title, :body)';
$stmt = $pdo->prepare($sql);
try {
	$stmt->execute([
		'title' => $title,
		'body' => $body
	]);
	echo 'Post added successfully';
} catch(PDOException $e) {
	echo $e->getMessage();
}*/

# UPDATE DATA
/*$title = 'Post Four Updated';
$body = 'This is our updated fourth post. We are happy you kept following. Thank you!';
$sql = 'UPDATE posts SET body = :body, title = :title WHERE id = :id';
$stmt = $pdo->prepare($sql);
try {
	$stmt->execute([
		'id' => 4,
		'title' => $title,
		'body' => $body
	]);
	echo 'Post updated successfully';
} catch(PDOException $e) {
	echo $e->getMessage();
}*/

# DELETE DATA
/*$id = 2;
$sql = 'DELETE FROM posts WHERE id = :id';
$stmt = $pdo->prepare($sql);
try {
	$stmt->execute([
		'id' => $id
	]);
	echo 'Post deleted successfully';
} catch(PDOException $e) {
	echo $e->getMessage();
}
*/

# SEARCH DATA
/*$key = '%update%';
$sql = 'SELECT * FROM posts WHERE title LIKE :key';
$stmt = $pdo->prepare($sql);
$stmt->execute([
	'key' => $key
]);
$posts = $stmt->fetchAll();
echo json_encode($posts);*/

/*
# Creating tables
#1 MySQL
$sql ="
	DROP TABLE IF EXISTS $this->table;
	CREATE table $this->table(
		id BIGINT UNSIGNED NOT NULL PRIMARY KEY,
		title VARCHAR(255) NOT NULL, 
		body TEXT NOT NULL,
		created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		updated_at TIMESTAMP DEFAULT NULL
	)
	ENGINE = InnoDB
;" ;

#2 PgSQL
$sql ="
	DROP TABLE IF EXISTS $this->table;
	CREATE table $this->table(
		id BIGSERIAL PRIMARY KEY,
		title VARCHAR NOT NULL, 
		body TEXT NOT NULL,
		created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		updated_at TIMESTAMP DEFAULT NULL
	)
;" ;

#3 SQLite
$sql ="
	DROP TABLE IF EXISTS $this->table;
	CREATE table $this->table(
		id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
		title VARCHAR(255) NOT NULL, 
		body TEXT NOT NULL,
		created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		updated_at TIMESTAMP DEFAULT NULL
	)
;";
*/