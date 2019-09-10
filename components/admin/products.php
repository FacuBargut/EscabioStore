
<?php  
    
    include "../../php/class/Product.php";
    $Products = Product::getProducts();

    if (count($Products) == 0) {
        ?>
          <div class="row">
              <div class="col-12">
                  <h1>Sin productos en la base de datos...</h1>
              </div>
          </div>
          
        <?php 
    }else{

?>
<div class="card" style="margin-top: 2%;margin-right: 1%;">
    <div class="card-body">
    <table class="table datos">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Detalle</th>
          <th scope="col">Precio</th>
          <th scope="col">Imagen</th>
          <th scope="col">Stock</th>
          <th scope="col">Categoria</th>
          <th scope="col">Marca</th>
        </tr>
      </thead>
      <tbody>
        <?php 
              foreach ($Products as $Product) {
                ?><tr>
                    <td><?php echo $Product->Nombre;?></td>
                    <td><?php echo $Product->Detail;?></td>
                    <td><?php echo $Product->Price;?></td>
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
<?php } ?>