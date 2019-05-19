<script>window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="js/vendor/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
		<script src="js/vendor/holder.min.js"></script>
		<!-- -->
		<script src="js/grayscale.min.js"></script>
	    <script src="js/classie.js"></script>
	    <script src="js/dialogFx.js"></script>
	    
<?php 

	if(@$_POST['mensaje']!=""){
		echo "
		<script>
			$(document).ready(function(){
				$('#log').click();
			});
		</script>";
	}

 ?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark navBackground">
	<a class="navbar-brand" href="index.php">
		<img src="img/index/logo.jpg" style="width:30px; height: 30px;border-radius: 100px"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="productos.php">Productos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="contacto.php">Contacto</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="manual.php">Ayuda</a>
			</li>
			<!--
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Disabled</a>
			</li>
			-->
		</ul>
		<!--
		<form class="form-inline mt-2 mt-md-0">
			<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
		-->
		<?php
			if ($status) {
		?>
				<!-- Example single danger button -->
				<div class="btn-group ">
					<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $_SESSION["name_user"] ?>
					</button>
					<div class="dropdown-menu" style="left: 0px">
						<a class="dropdown-item" href="perfil.php">Perfil</a>
						<a class="dropdown-item" href="cotizaciones.php">Cotizaciones</a>
						<a class="dropdown-item" href="#">Deseados</a>
						<a class="dropdown-item" href="#">Configuracion</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="php/logout.php">Cerrar sesion</a>
					</div>
				</div>
		<?php
			}else{
		?>
			<button id='log' class="btn btn-primary my-2 my-sm-0" data-dialog="login" type="">Iniciar sesión</button>
		<?php
			}
		?>
			
		<!--
		</form>
		-->
	</div>
</nav>
<div id="login" class="dialog" style="z-index:10000">
    <div class="dialog__overlay"></div>
    <div class="dialog__content">
        <p class="black-text" id='ins'>Iniciar sesión</p>
        <div class="login-form" style="margin-bottom: 5%;">
            <form action="php/login.php" method="post">
                <div class="form-group" style="margin-bottom:2%">
                    <input id="log1" type="email" name="email" class="form-control login-field" value="" placeholder="Correo electronico" id="login-name" required />
                    <label class="login-field-icon fui-new" for="login-name"></label>
                </div>
                <div class="form-group" style="margin-bottom:2%">
                    <input type="password" name="pass" class="form-control login-field" value="" placeholder="Contraseña" id="login-name" required=""/>
                    <?php 
                    	if(@$_POST['mensaje']!=""){
                    		echo "
                    			<label class='login-field-icon fui-new' for='login-name' style='color: red';>".@$_POST['mensaje']."</label>
                    		";
                    	}
                     ?>

                </div>
                <button class="btn btn-success" style="border-radius:5px;cursor:pointer;">Aceptar</button>
                <a class="btn btn-success" href="registrarse.php" style="border-radius:5px;cursor:pointer;">Registrarse</a>
                
            </form>
        </div>
        <div>
            <label class="btn-close action" data-dialog-close>×</label>
		</div>
	</div>
</div>
	