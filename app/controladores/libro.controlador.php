<?php
require_once './app/modelos/libro.modelo.php';
require_once './app/vista/json.vista.php';

class LibroControlador{
    private $modelo;
    private $vista;

    public function __construct(){
        $this->modelo= new LibroModelo();
        $this->vista= new JSONVista();
    }

    public function traerLibros($req, $res){
       $libros= $this->modelo->obtenerLibros();
       return $this->vista->response($libros);
    }
}
