<?php 
require 'includes/redireccion.php';
//require 'includes/layout/header.php';
require_once 'includes/tipoUsuario.php';
require_once 'includes/funcionesDisponibilidad.php';


$funciones = new funcionesDisponibilidad();
$usuarios = (int) $_SESSION['user']['sucursal'];



$listaUnidades = mostrarComboUnidad('unidades',$usuarios);
$listaSucursales = mostrarBaseCombo('sucursales',$usuarios);

$listaDisponibles = $funciones->mostrarDisponibles($usuarios);

$listaTalleres = mostrarDatos("talleres");
$listaEstatus = mostrarDatos('estatus');
 ?>


<?php 


?>


<div class="card-header">
	<h3>Registro de Disponibilidad</h3>

</div>


<!--alerta para registros repetido-->

<?php if(isset($_SESSION['registroRepetido'])): ?>
<div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
      <?php echo isset($_SESSION['registroRepetido']) ? $_SESSION['registroRepetido'] : ""; ?>
</div>
​<?php endif; ?>    

<!--alerta para registros Ingresado-->

<?php if(isset($_SESSION['completo'])): ?>
	<div class="alert alert-success alert-dismissible">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	      <h5><i class="icon fas fa-check"></i> Alert!</h5>
	        <?php echo isset($_SESSION['completo']) ? $_SESSION['completo'] : ""; ?> 
	</div>
<?php endif; ?>

<!--alerta para eliminacion de Registros -->

<?php if(isset($_SESSION['completado'])): ?>
	<div class="alert alert-success alert-dismissible">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	      <h5><i class="icon fas fa-check"></i> Alert!</h5>
	        <?php echo isset($_SESSION['completo']) ? $_SESSION['completo'] : ""; ?> 
	</div>
<?php endif; ?>

<div class="card-body">
	<form action="guardarDisponibilidad.php" method="POST" autocomplete="off">
		<div class="row">
			<div class="col-md-3">
				<label>Unidad :</label>
				<select name="economico" class="form-control" id="miunidad">
					<option value="vacio">Seleccione un economico</option>
					<?php foreach($listaUnidades as $row): ?>
					<option value="<?php echo $row['id']; ?>"><?= $row['economico'] ?></option>
					<?php endforeach; ?>
				</select>
				<!--alerta para registros vacios-->
				<?php if(isset($_SESSION['errores']['economico'])): ?>
					<div class="alert alert-warning">
				<?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['economico'] : "" ?>
					</div>
				<?php endif; ?>								
			</div>
			<!--Sucursales-->
			<!--<div class="col-md-3">

				<label>Sucursal :</label>
					<select name="sucursal" class="form-control" id="sucursales" onclick="seleccion()" >
						<option value="vacio">Seleccione un sucursal</option>
					<?php foreach($listaSucursales as $row): ?>
						<option value="<?php echo $row['id']?>"><?=$row['nombreSucursal']?></option>
					<?php endforeach; ?>
					</select>
				alerta para registros vacios
				<?php if(isset($_SESSION['errores']['sucursal'])): ?>
					<div class="alert alert-warning">
				<?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['sucursal'] : "" ?>
					</div>
				<?php endif; ?>			
			</div>-->
			<div class="col-md-3">
				<label>Fecha de Ingreso :</label>
				<input type="date" name="fechaIngreso" class="form-control">
				<!--alerta para registros vacios-->
				<?php if(isset($_SESSION['errores']['fechaIngreso'])): ?>
					<div class="alert alert-warning">
				<?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['fechaIngreso'] : "" ?>
					</div>
				<?php endif; ?>						
			</div>
			<div class="col-md-3">
				<label>Fecha Promesa :</label>
				<input type="date" name="fechaPromesa" class="form-control">
				<!--alerta para registros vacios-->
				<?php if(isset($_SESSION['errores']['fechaPromesa'])): ?>
					<div class="alert alert-warning">
				<?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['fechaPromesa'] : "" ?>
					</div>
				<?php endif; ?>						
			</div>
			<div class="col-md-3">
				<label>Fecha Entrega :</label>
				<input type="date" name="fechaEntrega" class="form-control" disabled>
				<!--alerta para registros vacios-->
				<?php if(isset($_SESSION['errores']['fechaEntrega'])): ?>
					<div class="alert alert-warning">
				<?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['fechaEntrega'] : "" ?>
					</div>
				<?php endif; ?>					
			</div>
			<div class="col-md-3">
				<label>Motivo :</label>
				<select name="motivo" id="motivo" class="form-control">
					<option value="vacio">Selecciona un motivo</option>
					<option value="Garantia">Garantia</option>
					<option value="Mantenimiento Correctivo">Mantenimiento Correctivo</option>
					<option value="Mantenimiento Preventivo">Matenimiento Preventivo</option>
					<option value="Rescate">Rescate</option>
					<option value="Siniestro">Siniestro</option>
				</select>
				<!--alerta para registros vacios-->
				<?php if(isset($_SESSION['errores']['motivo'])): ?>
					<div class="alert alert-warning">
				<?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['motivo'] : "" ?>
					</div>
				<?php endif; ?>						
			</div>
			<div class="col-md-3">
				<label>Taller</label>
				<select name="talleres" class="form-control" id="talleres">
					<option value="vacio">Selecciona un taller</option>
					<?php foreach($listaTalleres as $row): ?>	
					<option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>	
					<?php endforeach; ?>
				</select>
				<!--alerta para registros vacios-->
				<?php if(isset($_SESSION['errores']['taller'])): ?>
					<div class="alert alert-warning">
				<?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['taller'] : "" ?>
					</div>
				<?php endif; ?>						
			
			</div>

			<div class="col-md-3">
				<label>Folio de Reporte</label>
				<input type="text" name="folio" placeholder="Ingresa el folio de reporte" class="form-control">
				<!--alerta para registros vacios-->
				<?php if(isset($_SESSION['errores']['folio'])): ?>
					<div class="alert alert-warning">
				<?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['folio'] : "" ?>
					</div>
				<?php endif; ?>						
			</div>
			<div class="col-md-3">
				<label>Costo </label>
				<input class="form-control" type="text" name="costo" placeholder="Costo">
				<!--alerta para registros vacios-->
				<?php if(isset($_SESSION['errores']['costo'])): ?>
					<div class="alert alert-warning">
				<?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['costo'] : "" ?>
					</div>
				<?php endif; ?>						
			</div>
			<div class="col-md-3">
				<label>Estatus : </label>
				<select class="form-control" name="estatus" id="estatus">
					<option value="vacio">Seleccion un estatus :</option>
					<?php foreach($listaEstatus as $row): ?>
						<option value="<?= $row['id']?>"><?=$row['nombreEstatus']?></option>
					<?php endforeach; ?>
				</select>
				<!--alerta para registros vacios-->
				<?php if(isset($_SESSION['errores']['estatus'])): ?>
					<div class="alert alert-warning">
				<?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['estatus'] : "" ?>
					</div>
				<?php endif; ?>						
			</div>
			<div  class="col-md-12">
				<label>Descripcion de la Falla :</label>
				<textarea name="comentario" class="form-control" rows="3" placeholder="Ingresa tu comentario ..."></textarea>
				<!--alerta para registros vacios-->
				<?php if(isset($_SESSION['errores']['descripcion'])): ?>
					<div class="alert alert-warning">
				<?php echo isset($_SESSION['errores']) ? $_SESSION['errores']['descripcion'] : "" ?>
					</div>
				<?php endif; ?>								
			</div>
	<div class="row">

	
		<div class="btn btn-group-sm">
			<button class="btn btn-primary" type="submit" name="btnGuardar" value="Guardar">Guardar
			</button>
			<a href="reporteExcel/ExcelDisponibles.php" onclick="alert('Por implementarse')"; type="button" class="btn btn-success" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate Excel
             </a>
		</div>
	</div>

</form>	
</div>

<h3>Tabla de Disponibilidad</h3>

<div class="completo">
<?php echo isset($_SESSION['completo']) ? $_SESSION['completo'] : ""; ?>
</div>

<div class="completo">
<?php echo isset($_SESSION['completado']) ? $_SESSION['completado'] : ""; ?>
</div>

<div class="box-body">
  <div class="row">
    <div class="col-md-3">
        <select class="form-control" name="filtro">
            <option>Seleccione la operacion</option>
            <option>Modelo</option>
            <option>Arca</option>
            <option>Mexico Pepsi</option>
        </select>
    </div>
    <div class="col-md-8">
        <button class="btn btn-default" type="submit" style="background: #95a5a6; color: white;">Buscar</button>
    </div>

  </div>
  <br>
  <br>
  <br>
<div class="card-footer">	

	<table id="table_id" class="table table-bordered table-hover">
		<thead>
		<tr>
			<th>Eco</th>
			<th>Suc</th>	
			<th>Op</th>	
			<th>Ingreso</th>
			<th>Promesa</th>
			<th>Entrega</th>
			<th>Motivo</th>
			<th>Status</th>
			<th>Costo</th>
			<th>Dias</th>
			<th></th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($listaDisponibles as $rows): ?>
		<tr>

			<td><?php echo $rows['economico']; ?></td>
			<td><?php echo $rows['nombreSucursal']; ?></td>
			<td><?php echo $rows['nombreOperacion']; ?></td>
			<td><?php echo $rows['fechaIngreso']; ?></td>
			<td><?php echo $rows['fechaPromesa']; ?></td>
			<td><?php echo $rows['fechaEntrega']; ?></td>
			<td><?php echo $rows['motivo']; ?></td>
			<td><?php echo $rows['nombreEstatus']; ?></td>
			<td><?php echo " $ " . $rows['costoReparacion']; ?></td>
			<td><?php echo $rows['Dias']; ?></td>
			<td>
				<a href="#" onclick="preguntar(<?php echo $rows['id'] ?>);"  class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
			<td>
	            <a href="actualizarDisponibilidad.php?id=<?php echo $rows['id']; ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
			</td>
		</tr>
	<?php endforeach; ?>
		</tbody>
	</table >	
</div>
</div>

	<script type="text/javascript">
			
			function seleccion(){
				var sucursal = document.getElementById('sucursales').value;

				alert("Riacrdo");
			}


			function preguntar(id){

			var mensaje =Swal.fire({
				  title: 'Deseas Eliminar el registro?',
				  text: "Estas segurdo de eliminar el datos Seleccionadp",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Eliminar Registro'
				}).then((result) => {
				  if (result.value) {
				  	window.location.href = "eliminarDisponibilidad.php?id="+id;
				    Swal.fire(
				      'Deleted!',
				      'Your file has been deleted.',
				      'success'
				    )
				  }
				})				

			}

</script>
	


<?php require 'includes/layout/footer.php'; ?>