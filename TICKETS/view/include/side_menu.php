<?php 
$user_id = $_SESSION['user_id'];
?>

<div class="side_menu">
    <div>
        <ul>
            <li><a href="index.php?action=index&id=<?php echo $user_id; ?>"> Home</a> </li>
            <li><a href=""> Otro</a> </li>
            <li><a href=""> Otro2</a> </li>
        </ul>
    </div>
</div>

