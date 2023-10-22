<?php
interface daoUsuario {
    public function getTodosUsuarios($m); //Read
    public function guardarUsuario(Usuario $u); //Create
    public function borrarUsuario($id); //Delete
    public function actualizarUsuario($id, $c); //Update
}
?>