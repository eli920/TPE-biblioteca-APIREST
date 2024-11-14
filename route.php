<?php
require_once './bibliotecas/router.php';
require_once './app/controladores/libro.controlador.php';

$router = new Router();

 #                 endpoint                   verbo      controller              metodo
 $router->addRoute('libro'      ,            'GET',     'LibroControlador',   'traerLibros');
 $router->addRoute('libro/:id'  ,            'GET',     'LibroControlador',   'traerLibro');
 $router->addRoute('libro/:id'  ,            'DELETE',  'LibroControlador',   'eliminarLibro');
 $router->addRoute('libro'  ,                'POST',    'LibroControlador',   'agregarLibro');
 $router->addRoute('libro/:id'  ,            'PUT',     'LibroControlador',   'editarLibro');

 $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);

//  http://localhost/TPE-biblioteca-APIREST/api/libro