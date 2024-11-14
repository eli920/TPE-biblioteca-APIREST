Descripción de endpoints a utilizar para consumir la API:


  endpoint                                               verbo      descripcion
 'libro'                                                'GET'       Trae todos los libros de la tabla.
 'libro/:id'                                            'GET'       Trae un libro por id de la tabla.
 'libro/:id'                                            'DELETE'    Trae un libro por id de la tabla, para luego eliminarlo.
 'libro'                                                'POST'      Agrega un nuevo libro.
 'libro/:id'                                            'PUT'       Trae un libro por id de la tabla, para luego editarlo.

  endpoint con query params
 'libro?ordenar=anio_publicacion&direccion=DESC'        'GET'      *Trae los libros ordenados por año de publicacion de forma descendente.
 'libro?anio_publicacion=2007'                          'GET'      ** Filtra y trae los libros según el año de publicacion que se desee buscar.

 *El endpoint anterior es solo un ejemplo, ya que se puede ordenar por cualquier campo de la tabla 'libro' de forma ascendente o descendente.
 **En este caso el endpoint también es un ejemplo, pero según lo solicitado, solo propusimos filtrar por un único campo, que en dicho caso es el año de publicacion. El 2007 es meramente un ejemplo, se pude filtrar por el año deseado.

Ejemplo de una peticion completa para obtener un libro por id:
http://localhost/TPE-biblioteca-APIREST/api/libro/2

Ejemplo de una peticion completa con query params para filtrar por año de publicación:
http://localhost/TPE-biblioteca-APIREST/api/libro?anio_publicacion=2007