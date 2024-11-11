<?php
require_once 'app/modelos/base.modelo.php';

class LibroModelo extends ModeloBase{
    public function __construct() {
        parent::__construct();
    }

    // private $bd;
    // public function __construct() {
    //     $this->bd = new PDO('mysql:host=localhost;dbname=tpe-biblioteca;charset=utf8', 'root', '');
    //  }

    public function obtenerLibros($filtrarAutor = 0, $ordenar = false) {
        $sql = 'SELECT * FROM libro';
        
        //CONSULTAR COMO HACER PETICIONES CON AMBOS, NO FUNCIONA

        //CONSULTAR SI HAY QUE PREVENIR ALGUN TIPO DE ERROR
        if($filtrarAutor > 0) {
            //HAY QUE DEJARLO SEPARADO, SINO NO ANDA
            $sql .= ' WHERE id_autor = ';
            $sql .= $filtrarAutor;
        }
        
        //ordenar por titulo de forma ascendente/descendente
        if($ordenar) {
            $sql .= ' ORDER BY titulo ';
            if($ordenar === 'ASC') {
                $sql .= 'ASC';
            } else {
                $sql .= 'DESC';
            }
            //CONSULTAR SI HAY QUE AGREGAR ALGO QUE CONTROLE POSIBLE ERROR
        }

        $consulta = $this->bd->prepare($sql);
        $consulta->execute();
    
        $libros = $consulta->fetchAll(PDO::FETCH_OBJ); 
        return $libros;
    }
    
    public function obtenerLibro($id) {    
        $consulta = $this->bd->prepare('SELECT * FROM libro WHERE id_libro = ?');
        $consulta->execute([$id]);   
    
        $libro = $consulta->fetch(PDO::FETCH_OBJ);
        
        return $libro;
    }

 
    public function obtenerLibrosPorAutor($id) {
        $consulta = $this->bd->prepare('SELECT * FROM libro WHERE id_autor = ?');
        $consulta->execute([$id]);
    
        $libros = $consulta->fetchAll(PDO::FETCH_OBJ); 
       
        return $libros;
    }  

    public function insertarLibro($titulo, $genero, $editorial, $anio_publicacion, $sinopsis, $autor) { 
        $consulta = $this->bd->prepare('INSERT INTO libro (titulo, genero, editorial, anio_publicacion, sinopsis, id_autor) VALUES (?, ?, ?, ?, ?,?)');
        $consulta->execute([$titulo, $genero, $editorial, $anio_publicacion, $sinopsis, $autor]);
        //Obtengo el ide de la última fila que inserte
        $id = $this->bd->lastInsertId();//Funcion propia de php para obtener último id
    
        return $id;
    }
 
    public function borrarLibro($id) {
        $consulta = $this->bd->prepare('DELETE FROM libro WHERE id_libro = ?');
        $consulta->execute([$id]);
    }

    public function actualizarLibro($id, $titulo, $genero, $editorial, $anio_publicacion, $sinopsis, $autor) {      
        $consulta = $this->bd->prepare('UPDATE libro SET titulo = ?, genero = ?, editorial = ?, anio_publicacion = ?, sinopsis = ?, id_autor = ? WHERE id_libro = ?');
        $consulta->execute([$titulo, $genero, $editorial, $anio_publicacion, $sinopsis, $autor, $id]);
    }

    
}