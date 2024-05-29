<?php

include './conexion.php';



if($_POST){
    // echo "A new request will be added";
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $user = $_POST['assigned'];

    create($title, $desc, $user);
    // Header("Location: ../index.php");
}

function create ($title, $description, $user){
    global $conn;
    $sql = "insert into requests (request_title, request_description, request_current_solver, request_status)
    values('$title','$description', $user, 1)";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>
                alert('Record inserted successfully');
                window.location.href = '../index.php';    
            </script>";
    } else {
        echo "Error al insertar datos: " . mysqli_error($conn);
    }
}




// function read (){

// }

// function update (){

// }

// function delete (){


?>