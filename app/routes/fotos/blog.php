<?php

$app->get('/blog', function($request, $response, $args){

	try {
		$query = $this->db->prepare("	SELECT 	PU.ID_PUBLICACION,
												PU.TITULO_PUBLICACION,
												PU.LUGAR_PUBLICACION,
												date_format(PU.FECHA_PUBLICACION,'%d/%m/%Y') as FECHA_PUBLICACION,
												PU.DESCRIPCION_PUBLICACION,
												PU.VISITAS_PUBLICACION,
												(SELECT COUNT(*)
												FROM	COMENTARIO CO
												WHERE	PU.ID_PUBLICACION = CO.ID_PUBLICACION) as NUMERO_COMENTARIOS
										FROM 	PUBLICACION PU 
										ORDER BY ID_PUBLICACION DESC, FECHA_PUBLICACION DESC");
		$query->execute();
		$posts = $query->fetchAll();
		for ($i=0; $i < count($posts); $i++){
			$query = $this->db->prepare("	SELECT 	PU.ID_PUBLICACION,
													ET.ID_ETIQUETA,
													ET.NOMBRE_ETIQUETA
											FROM 	ETIQUETA_PUBLICACION PU, ETIQUETA ET
											WHERE	ET.ID_ETIQUETA = PU.ID_ETIQUETA
											AND 	PU.ID_PUBLICACION = :id_publicacion
											ORDER BY PU.ID_PUBLICACION ASC, ET.ID_ETIQUETA ASC");
			$query->bindParam(':id_publicacion', $posts[$i]['ID_PUBLICACION']);
			$query->execute();
			$tags = $query->fetchAll();
			$posts[$i]['tags']=array();
			foreach ($tags as $tag) {
				array_push($posts[$i]['tags'], $tag);
			}
		}		
		$this->db = null;
		/*echo('<pre>');
		var_dump($posts);
		echo('</pre>');*/
		//$cosas = array('post' => $posts,'hola '=> $hola );

	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

	//retornar vista
	return $this->view->render($response, 'fotos/blog.html', ['posts' => $posts]);

})->setName('blog');

$app->get('/post/{post}', function($request, $response, $args){
	$post = $args['post'];
	try {
		$query = $this->db->prepare("	SELECT 	PU.ID_PUBLICACION,
												PU.TITULO_PUBLICACION,
												PU.LUGAR_PUBLICACION,
												date_format(PU.FECHA_PUBLICACION,'%d/%m/%Y') as FECHA_PUBLICACION,
												PU.DESCRIPCION_PUBLICACION,
												PU.VISITAS_PUBLICACION
										FROM 	PUBLICACION PU 
										WHERE	PU.ID_PUBLICACION = :id_publicacion
										ORDER BY ID_PUBLICACION DESC, FECHA_PUBLICACION DESC");
		$query->bindParam(':id_publicacion', $post);
		$query->execute();
		$post = $query->fetch();
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	
	return $this->view->render($response, 'fotos/post.html', ['post' => $post]);

})->setName('post');
