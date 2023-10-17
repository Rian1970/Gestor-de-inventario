<?php
interface daoSalon {
    public function getTodosSalones(); //Read
    public function guardarSalon(Salon $s); //Create
    public function borrarSalon($borra); //Delete
    public function getSalones();
    public function getGestion($g);
    public function actualizaSalon($nuevoSalon, $id);
}
?>