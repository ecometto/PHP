



<?php

$user_id = $_SESSION['user_tipo'];
$template_user = [];
$template_admin = [];


if ($_SESSION['user_tipo'] === "admin") {
                        echo "
                            <div class='side_menu'>
                            <div>
                                <ul>
                                    <li><a href='index.php?action=index&id=$user_id'> Home</a> </li>
                                    <li><a href=''> Otro</a> </li>
                                    <li><a href=''> Otro2</a> </li>
                                </ul>
                                </div>
                            </div>
                            ";
}
