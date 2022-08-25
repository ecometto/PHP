<?php 

include_once 'config/conexion.php';

class Tickets {
    
    public function get_tickets($user){
        $data = [];
        $con = Conexion::conectar();
        $query = "select * from tickets where solicitante_id = $user";

        $ejec = mysqli_query($con, $query);
        $data = mysqli_fetch_all($ejec);

        return $data;
    }

    public function new_tickets($area, $titulo, $detalles, $user){
        $con = Conexion::conectar();
        $query = "insert into tickets values (null, CURRENT_DATE(), $area,'$titulo', '$detalles', $user)";

        $ejec = mysqli_query($con, $query);

        if($ejec){
            
            return mysqli_insert_id($con);
        }
    
    }
        }
