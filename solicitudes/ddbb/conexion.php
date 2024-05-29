<?php
$conn = mysqli_connect("localhost", "root", "", "requests");

if (mysqli_connect_error()) {
    die("Error: " . mysqli_connect_error());
} 
