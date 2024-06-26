<?php 

$data = file_get_contents('./4-data.json');
print_r($data);

if($_POST){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if(isset($_POST['ENVIAR']) && isset($_POST['name']) && isset($_POST['gender']) ){
        // $name = $_POST['name'];
        // $gender = $_POST['gender'];
        // $hobbies = $_POST['hobbies'];


    }
    else{
        echo "<br>All filed have to be completed";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border: solid 2px black;
        }
        tr, td, th{
            border: solid 1px black;
        }
    </style>
</head>
<body>
    
<form action="" method="POST">
    Insert your name: <input type="text" name="name" required> <br> <br>

    Select yor gender: <br>
    <input type="radio" name="gender" value="M" checked> M <br>
    <input type="radio" name="gender" value="F"> F <br> <br>

    choose your hobbies: <br>
    <input type="checkbox" name="hobbies[]" value="sports" > Sports <br>
    <input type="checkbox" name="hobbies[]" value="music" > Music <br>
    <input type="checkbox" name="hobbies[]" value="dance" > Dance <br>
    <input type="checkbox" name="hobbies[]" value="tech"> Tech <br>
    
    <br>
    
    <select name="nationality" required>
        <option value="" selected disabled>Select your nationality</option>
        <option value="Argentina">Argentina</option>
        <option value="Brasil">Brasil</option>
        <option value="Uruguay">Uruguay</option>
    </select> 
    
    <br><br>

    <input type="submit" name="ENVIAR" value="SEND">

</form>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Hobbies</th>
            <th>Nationality</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>asdfasdf</td>
            <td>sadfsdarrrfsad</td>
            <td>tt</td>
            <td>f</td>
            <td>
                <a href="/4-Formularios.php?name=name">Edit</a>
                <a href="delete">Delete</a>
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>