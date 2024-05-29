<?php
include './includes/header.php';
include './ddbb/conexion.php';

// consultando los request generados
$sql = "SELECT r.id, r.request_date, r.request_title, r.request_description, u.user_name, s.scatus_description FROM requests as r  join users as u on r.request_current_solver = u.id join status as s on r.request_status = s.id order by r.id;";
$query = mysqli_query($conn, $sql);

// consultando los usuarios para 'select box'
$sql_users = "select * from users";
$query_users = mysqli_query($conn, $sql_users);

?>


<hr>
<div class="container">
    <div class="form-section">
        <div class="form-container">
            <H3>Create a new Request</H3>
            <form action="./ddbb/functions.php" method="POST">
                Title: <input class="form-control" type="text" name="title"> <br>
                Description: <input class="form-control" type="text" name="description"> <br>
                Assigned user
                <select class="form-control" name="assigned" id="">
                    <option selected disabled value="">Choose an option</option>
                    <?php
                    while ($data = mysqli_fetch_array($query_users)) {
                        echo "<option value='$data[id]'>$data[user_name]</option>";
                    };
                    ?>
                </select> <br>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success" name="new">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="table-section">
        <h3 class="table-title">List of Maintenance Requests</h3>

        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Title</th>
                    <th>Description</th>
                    <th class="text-center">Current Solver</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($line = mysqli_fetch_array($query)) { ?>

                    <tr>
                        <td class="text-center"><?php echo $line[0]; ?></td>
                        <td class="text-center"><?php echo $line[1]; ?></td>
                        <td class="text-center"><?php echo $line[2]; ?></td>
                        <td><?php echo $line[3]; ?></td>
                        <td class="text-center"><?php echo $line[4]; ?></td>
                        <td class="text-center"><?php echo $line[5]; ?></td>
                        <td>
                            <a class="btn btn-warning" href=<?php echo './actions.php?id=' .$line[0] ?>>
                                Edit
                            </a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>

    </div>


</div>

<?php
include './includes/footer.php'
?>