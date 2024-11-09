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

    public function traerLibro($req, $res){
        //Obtengo el id pasado por parámetro
        $id= $req->params->id;

        // verifico que exista
        $libro = $this->modelo->obtenerLibro($id);
        if (!$libro) {
            return $this->vista->response("El libro con el id=$id no existe", 404);
        }
       
        return $this->vista->response($libro);
    }

    public function editarLibro($req, $res){
        //Obtengo el id pasado por parámetro
        $id= $req->params->id;
        
        // verifico que exista
        $libro = $this->modelo->obtenerLibro($id);
        if (!$libro) {
            return $this->vista->response("El libro con el id=$id no existe", 404);
        }

        // valido los datos
        if (empty($req->body->titulo) || empty($req->body->genero) || empty($req->body->editorial) || empty($req->body->anio_publicacion)) {
            return $this->vista->response('Falta completar datos', 400);
        }

        // obtengo los datos
        $titulo = $req->body->titulo;       
        $genero = $req->body->genero;       
        $editorial = $req->body->editorial;
        $anio_publicacion = $req->body->anio_publicacion;
        $sinopsis = $req->body->sinopsis;;
        $autor = $req->body->id_autor;

        // actualizo el libro
        $this->modelo->actualizarLibro($id, $titulo, $genero, $editorial, $anio_publicacion, $sinopsis, $autor);

        // obtengo el libro modificado y lo devuelvo en la respuesta
        $libro = $this->modelo->obtenerLibro($id);
        $this->vista->response($libro, 200);
        
    }
}
