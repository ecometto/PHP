<div class="container">
    <h3 class="text-center m-3">USERS ADMINISTRATION</h3>

    <button id="btn" class="btn btn-success col-1" >Add User</button>
    <div class="row">
        <div class="card col-md-4 offset-md-4">
            <form id="form">
                <div class="mb-3 p-2">
                    <label for="exampleInputEmail1" class="form-label">Full name</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Identefication</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleRole" class="form-label">Role</label>
                    <input type="text" class="form-control" id="exampleRole">
                </div>
                <div class="d-grid m-2">
                    <button type="submit" class="btn btn-primary btn-block">Add User</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="row m-3">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>id</th>
                        <th>Full Name</th>
                        <th>Identification</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Complete Name 1</td>
                        <td>completename1@gmail.com</td>
                        <td>Admin</td>
                    </tr>
                </tbody>
            </table>
    </div>
</div>

<script>
    btn = document.getElementById('btn')
    form = document.getElementById('form')

    btn.addEventListener('click', showAndHide)

   function showAndHide(){
        alert( "probando para ocultar y mostrar Form")
    }
</script>