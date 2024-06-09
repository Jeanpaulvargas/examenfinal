<?php
require 'Conexion.php';

class paciente extends Conexion{
    public $pac_pacienteID;
    public $pac_nombre;
    public $pac_apellido;
    public $pac_dpi;
    public $pac_telefono;
    public $pac_situacion;


    public function __construct($args = [])
    {
        $this->pac_pacienteID = $args['pac_pacienteID'] ?? null;
        $this->pac_nombre = $args['pac_nombre'] ?? '';
        $this->pac_apellido = $args['pac_apellido'] ?? '';
        $this->pac_dpi = $args['pac_dpi'] ?? 0;
        $this->pac_telefono = $args['pac_telefono'] ?? 0;
        $this->pac_situacion = $args['pac_situacion'] ?? '';

    }

      // METODO PARA INSERTAR
      public function guardar(){
        $sql = "INSERT into pacientes (pac_nombre,
         pac_apellido, pac_dpi, pac_telefono) values ('$this->pac_nombre',
         '$this->pac_apellido', '$this->pac_dpi', '$this->pac_telefono')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

      // METODO PARA CONSULTAR

      public static function buscarTodos(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM pacientes where pac_situacion = 1 ";
        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar(...$columnas){
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT $cols FROM pacientes where pac_situacion = 1 ";


        if($this->pac_nombre != ''){
            $sql .= " AND pac_nombre like '%$this->pac_nombre%' ";
        }
        if($this->pac_apellido != ''){
            $sql .= " AND pac_apellido like'%$this->pac_apellido%' ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarId($id){
        $sql = " SELECT * FROM pacientes WHERE pac_situacion = 1 AND pac_pacienteID = '$id' ";
        $resultado = array_shift( self::servir($sql)) ;

        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE pacientes SET pac_nombre = '$this->pac_nombre', pac_apellido = '$this->pac_apellido', pac_dpi = '$this->pac_dpi', pac_telefono = '$this->pac_telefono' WHERE pac_pacienteID = $this->pac_pacienteID ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

    public function eliminar(){
        // $sql = "DELETE FROM pacientes WHERE pac_pacienteID = $this->pac_pacienteID ";

        // echo $sql;
        $sql = "UPDATE pacientes SET pac_situacion = 0 WHERE pac_pacienteID = $this->pac_pacienteID ";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }
}