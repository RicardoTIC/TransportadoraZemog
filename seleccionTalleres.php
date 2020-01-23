<?php 
require_once 'includes/redireccion.php';
require_once 'includes/talleresFunciones.php';
require_once 'includes/layout/header.php';

?>

<div class="card-header">
	<h3>Actualizacion de Talleres</h3>

</div>

<div class="card-body">
	<form action="guardarTalleres.php" method="post" autocomplete="off">
		<div class="row">
			<div class="col-md-3">
				<label>Nombre del Taller :</label>
					<input class="form-control" type="text" name="nombreTaller" placeholder="Ingresa el numero Economico" value="<?php echo isset($nombre) ? $nombre : "";?>">
	
			</div>
			
	<div class="col-md-3">
		<label>Direccion :</label>
			<input class="form-control" type="text" name="direccionTaller" placeholder="Ingresa el numero Economico" value="<?php echo isset($nombre) ? $nombre : "";?>">

	</div>
</div>

	<div class="row">
		<div class="btn btn-group-sm">
			<button class="btn btn-primary" type="submit" name="btnGuardar" value="Guardar">Guardar</button>
		</div>
	</div>


</form>		

<?php require 'includes/layout/footer.php'; ?>