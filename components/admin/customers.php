
<?php  
    
    include "../../php/class/User.php";
    $Users = User::getUsers();

?>
<div class="container">
    <div class="table-wrapper">
       <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Usuarios</h2>
                </div>
                <col-sm-6>
                      <button class="btn btn-success" href=""><i class="material-icons"></i><span>Add New Employee</span></button>
                      <button class="btn btn-danger" href=""><i class="material-icons"></i><span>Delete</span></button>
                </col-sm-6>
            </div>
       </div>
       <table class="table table-hover datos">
          <thead>
            <tr>
                  <th><input type="checkbox" name=""></th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Mail</th>
                  <th>Contraseña</th>
                  <th>Estado</th>
                  <th>Administrador</th>
            </tr>
          </thead>
          <tbody>
                
                <?php 
              foreach ($Users as $User) {
                ?><tr>
                    <td><input type="checkbox" name=""></td>
                    <td><?php echo $User->Nombre;?></td>
                    <td><?php echo $User->Apellido;?></td>
                    <td><?php echo $User->Mail;?></td>
                    <td><?php echo $User->Password;?></td>
                    <td><?php switch ($User->Activado) {
                      case 0:
                        echo "Activacion pendiente";
                        break;
                      case 1:
                        echo "Activado";
                        break;
                    }
                ?></td>
                    <td><?php switch ($User->Admin) {
                      case 0:
                        echo "No";
                        break;
                      case 1:
                        echo "Si";
                        break;
                    }
                ?></td>
              <?php 
              }
         ?>
                </tr>
          </tbody>
       </table>
  </div>
</div>

<style>
.table-wrapper{
background: #fff;
    padding: 20px 25px;
    margin: 30px 0;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
  }

  .table-title{
    padding-bottom: 15px;
    background: #435d7d;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
  }
</style>