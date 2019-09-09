<nav class="navbar navbar-expand-lg navbar-light bg-primary border-bottom">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item">
    		<a class="nav-link" href="#">Panel Administrador</a>
    	</li>
	</ul>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
	    <li class="nav-item dropdown">
	      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	        <?php echo $_SESSION['usuario']->getName()." ".$_SESSION['usuario']->getSurname();?>
	      </a>
	      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	        <a class="dropdown-item" href="#">Cerrar</a>
	        <a class="dropdown-item" href="#">Another action</a>
	        <div class="dropdown-divider"></div>
	        <a class="dropdown-item" href="#">Something else here</a>
	      </div>
	    </li>
	  </ul>
	</div>
</nav>