
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
                <div class="form-group">
                    <!-- Select  -->
                    <select class="form-control" id="selectLimit">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                    </select>
                </div>
                <col-sm-6>
                      <button class="btn btn-success" data-toggle="modal" data-target="#modal_add" id="AddNew"><i class="material-icons"></i><span>Add New Employee</span></button>
                      <button class="btn btn-danger" id="deleteOpc" href=""><i class="material-icons"></i><span>Delete</span></button>
                </col-sm-6>
            </div>
       </div>
       <table class="table table-hover datos">
          <?php
                if(count($Users) == 0){
                  ?>
                    <h1>No hay usuarios en la base de datos</h1>
                  <?php
                }else{
          ?>
          <thead>
            <tr>
                  <th><input type="checkbox" name=""></th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Mail</th>
                  <th>Contraseña</th>
                  <th>Estado</th>
                  <th>Administrador</th>
                  <th>Accion</th>
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
                  <td>
                      <button data-toggle="modal" data-target="#modal_edit"  class="btn btn-primary editUser"><i class="far fa-edit"></i></button>
                  </td>
              <?php 
              }
         ?>

                </tr>
          </tbody>
       <?php } ?>
       </table>
  </div>
</div>


<!-- Modal Alta de usuario -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal_add" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal">Alta usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form id="frm_AltaUsuario_Admin" action="">
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input id="UserName" class="form-control" type="text" placeholder="Usuario" required >
                  </div>
                  <div class="form-group">
                      <label for="">Apellido</label>
                      <input id="Surname" class="form-control" type="text" placeholder="Apellido" required>
                  </div>
                  <div class="form-group">
                        <label for="">Mail</label>
                        <input id="Mail" class="form-control" type="text" placeholder="Mail" required>
                  </div>
                  <div class="form-group">
                        <label for="">Contraseña</label>
                        <input id="Password" class="form-control" type="text" placeholder="Contraseña" required>
                  </div>
                  <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="chk_admin">
                      <label class="form-check-label" for="chk_admin" value="admin">Administrador</label>
                  </div>
                  <small>NOTA: Al crear un usuario desde esta instancia, automaticamente su cuenta estara activada.</small>
              </form>
      </div>
      <div class="modal-footer">
        <button id="AddUser" type="submit" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal Edicion de usuario -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_edit-body">
              <form id="frm_EditUser_Admin" action="">
                  <div class="form-group">
                    <label for="">Nombre</label>
                    <input id="UserName" class="form-control" type="text" placeholder="Usuario" required >
                  </div>
                  <div class="form-group">
                      <label for="">Apellido</label>
                      <input id="Surname" class="form-control" type="text" placeholder="Apellido" required>
                  </div>
                  <div class="form-group">
                        <label for="">Mail</label>
                        <input id="Mail" class="form-control" type="text" placeholder="Mail" required>
                  </div>
                  <div class="form-group">
                        <label for="">Contraseña</label>
                        <input id="Password" class="form-control" type="text" placeholder="Contraseña" required>
                  </div>
                  <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="chk_admin">
                      <label class="form-check-label" for="chk_admin" value="admin">Administrador</label>
                  </div>
              </form>
      </div>
      <div class="modal-footer">
        <button id="EditUser" type="submit" class="btn btn-primary">Aceptar</button>
        <button id="CancelEditUser" class="btn btn-default">Cancelar</button>
      </div>
    </div>
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