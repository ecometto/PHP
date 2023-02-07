<?php 
include './conexion.php';
$con = conectar();

// var_dump($_POST);
$name = $_POST['name'];
$mail = $_POST['mail'];

$sql = "insert into contacts values (null, '$name','$mail')";
$query=mysqli_query($con, $sql);
echo "<script>
    alert('registro ingresado correctamente')
    window.location='./index.php'</script>";
// header('Location: index.php');
