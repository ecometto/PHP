<?php 


include_once 'config/conexion.php';

class Tickets {
    
    public function get_tickets($condition){
        $data = [];
        $con = Conexion::conectar();
        $query = "select t.id, t.fecha, t.area, t.titulo, t.descripcion, t.solicitante_id, s.descripcion  from tickets as t 
        LEFT JOIN status as s on t.status = s.id 
        $condition
        order by t.fecha";

        $ejec = mysqli_query($con, $query);
        $data = mysqli_fetch_all($ejec);

        return $data;
    }


    

    public static function new_tickets($area, $titulo, $detalles, $user){
        $con = Conexion::conectar();
        $query = "insert into tickets values (null, CURRENT_DATE(), $area,'$titulo', '$detalles', $user, 1)";

        $ejec = mysqli_query($con, $query);

        if($ejec){
            $last = mysqli_insert_id($con);
            return $last;
        }
    }

    public static function close_ticket($id){
        $con = Conexion::conectar();
        $query = "update tickets set status = 4 where id=$id";
        $ejec = mysqli_query($con, $query);

        if ($ejec){
            return "$id";
        }
        
    }
}


