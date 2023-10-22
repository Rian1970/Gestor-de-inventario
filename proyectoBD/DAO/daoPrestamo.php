<?php
interface daoPrestamo {
    public function getTodosPrestamos($id); //Read
    public function guardarPrestamo($usuario, $equipo, $fecha); //Create
    public function borrarPrestamo($id); //Delete
    //public function actualizarPrestamo(); //Update
}
?>