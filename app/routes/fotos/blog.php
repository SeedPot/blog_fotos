<?php

$app->group('/blog', function () use ($app) {

	$this->get('/[{page}]', function($request, $response, $args){

		try {
			$query = $this->db->prepare("	SELECT * 
											FROM publicacion 
											ORDER BY id_publicacion DESC, fecha_publicacion DESC");
			$query->execute();
			$posts = $query->fetchAll();
			$this->db = null;

		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		//retornar vista
		return $this->view->render($response, 'fotos/blog.html', ['posts' => $posts]);

	})->setName('blog');

});