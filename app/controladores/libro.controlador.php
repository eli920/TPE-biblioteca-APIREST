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
        $filtrarAutor = 0;
        if(isset($req->query->filtrarAutor)) {
            $filtrarAutor = $req->query->filtrarAutor;
        }
        
        $ordenar = false; //variable para ordenar asc/desc 
        if(isset($req->query->ordenar)) {
            $ordenar = $req->query->ordenar;
        }

        $libros= $this->modelo->obtenerLibros($filtrarAutor, $ordenar);
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
        if (empty($req->body->titulo) || empty($req->body->genero) || empty($req->body->editorial) || empty($req->body->anio_publicacion)
        || empty($req->body->id_autor)) {
            return $this->vista->response('Falta completar datos', 400);
        }

        // obtengo los datos
        $titulo = $req->body->titulo;       
        $genero = $req->body->genero;       
        $editorial = $req->body->editorial;
        $anio_publicacion = $req->body->anio_publicacion;
        $sinopsis = $req->body->sinopsis;
        $autor = $req->body->id_autor;

        // actualizo el libro
        $this->modelo->actualizarLibro($id, $titulo, $genero, $editorial, $anio_publicacion, $sinopsis, $autor);

        // obtengo el libro modificado y lo devuelvo en la respuesta
        $libro = $this->modelo->obtenerLibro($id);
        $this->vista->response($libro, 200);
        
    }

    public function agregarLibro($req, $res) {
        //validacion de datos
        if (empty($req->body->titulo) || empty($req->body->genero) || empty($req->body->editorial) || empty($req->body->anio_publicacion)
        || empty($req->body->id_autor)) {
            return $this->vista->response('Falta completar datos', 400);
        }

        $titulo = $req->body->titulo;
        $genero = $req->body->genero;
        $editorial = $req->body->editorial;
        $anio_publicacion = $req->body->anio_publicacion;
        $sinopsis = $req->body->sinopsis;
        $id_autor = $req->body->id_autor;

        //agregar libro
        $id = $this->modelo->insertarLibro($titulo, $genero, $editorial, $anio_publicacion, $sinopsis, $id_autor);

        if(!$id) {
            return $this->vista->response("Error al agregar libro", 500);
        }

        //obtengo el libro para luego mostrarlo
        $libro = $this->modelo->obtenerLibro($id);
        return $this->vista->response($libro, 201); //codigo 201, creado con éxito
    }

    public function eliminarLibro($req, $res) {
        //obtengo id 
        $id = $req->params->id;

        //traigo libro que tiene ese id
        $libro = $this->modelo->obtenerLibro($id);

        if(!$libro) {
            return $this->vista->response("No existe tarea con id=$id", 404);
        } 

        $this->modelo->borrarLibro($id);
        $this->vista->response("El libro con id=$id, se eliminó");
    }
}
