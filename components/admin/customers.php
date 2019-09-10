
<?php  
    
    include "../../php/class/User.php";
    $Users = User::getUsers();

?>
<div class="card" style="margin-top: 2%;margin-right: 1%;">
    <div class="card-body">
    <table class="table datos">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Mail</th>
          <th scope="col">Contraseña</th>
          <th scope="col">Estado</th>
          <th scope="col">Administrador</th>
          <th scope="col">Accion</th>
        </tr>
      </thead>
      <tbody>
        <?php 
              foreach ($Users as $User) {
                ?><tr>
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
                  <button class="btn btn-primary"><i class="far fa-edit"></i></button>
                  <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </td>
                </tr><?php 
              }
         ?>
      </tbody>
    </table>
      </div>
</div>