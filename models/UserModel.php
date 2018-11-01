<?php
class UserModel extends ModeloBase{
    private $table;
     
    public function __construct($adapter){
        $this->table="users";
        parent::__construct($this->table, $adapter);
    }
     
    //Metodos de consulta
    public function getUnUsuario(){
        $query="SELECT * FROM users WHERE id=1";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }
}
?>