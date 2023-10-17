<?php
interface daoEquipo {
    public function getTodosEquipos(); //Read
    public function guardarEquipo(Equipo $e); //Create
    public function borrarEquipo($e); //Delete
}
?>