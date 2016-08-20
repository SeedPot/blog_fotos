<?php

require '../vendor/autoload.php';

$config['displayErrorDetails'] = true;

$config['db']['host']   = "localhost";
$config['db']['user']   = "root";
$config['db']['pass']   = "";
$config['db']['dbname'] = "dentista";



//Instancia de Slim
$app = new Slim\App(["settings" => $config]);
$container = $app->getContainer();

//Configuración de la BD con PDO dentro del container
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    try{
	    $pdo = new PDO("mysql:host=" . $db['host'] . ";
				    	dbname=" . $db['dbname'], 
				    	$db['user'], 
				    	$db['pass'],
				    	array('charset'=>'utf8'));

		$pdo->query("SET CHARACTER SET utf8");
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);    	
    }
    catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
    return $pdo;
};

$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig('../app/views', [
        //'cache' => '../app/cache'
        'cache' => false
    ]);

    
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};

require 'routes.php';

$app->run();