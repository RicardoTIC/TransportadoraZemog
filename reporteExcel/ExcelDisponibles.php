<?php 

include('../includes/db.php');

session_start();


	$conexion = new db();

	//definir el nombre de nuestro archivo charset
	header('Content-Type:text/csv; charset=latin1');
	header('Content-Disposition: attachment; filename="Report.csv');

	//Salida del archivo 
	$salida = fopen('php://output', 'w');
	//Defenir las columnas de los archivos 
	fputcsv($salida, 
		array(
		'Economico',
		'Nombre Sucursal',
		'Fecha Ingreso',
		'Fecha Promesa',
		'Fecha Entrega',
		'Motivo',
		'Costo por Reparacion',
		'Dias en Detencion',
		'nombreEstatus',
		'Comentarios',
		'Nombre Operacion'
		));

	//defirni consulta
	$sql = "SELECT dp.id, uni.economico,sc.nombreSucursal,dp.fechaIngreso,dp.fechaPromesa,dp.fechaEntrega,dp.motivo,dp.costoReparacion,datediff(now(),dp.fechaIngreso) as Dias,es.nombreEstatus,dp.descripcionFalla,op.nombreOperacion FROM disponibilidad dp
			inner join unidades uni on dp.unidades_id = uni.id
			inner join sucursales sc on uni.sucursales_id = sc.id
            inner join estatus es on dp.estatus_id = es.id
            inner join operaciones op on sc.operaciones_id = op.id;";

    	
		$reporteCVS = $conexion->query($sql);
        $reporteCVS->execute();

        

		if($reporteCVS === false){
		die("Failed");
		}
        
		$datos = $reporteCVS->fetchAll();


		foreach ($datos as $filaR){
		fputcsv(
			$salida,array(
				$filaR['economico'],
				$filaR['nombreSucursal'],
				$filaR['fechaIngreso'],
				$filaR['fechaPromesa'],
				$filaR['fechaEntrega'],
				$filaR['motivo'],		
				$filaR['costoReparacion'],		
				$filaR['Dias'],	
				$filaR['nombreEstatus'],
				$filaR['descripcionFalla'],
				$filaR['nombreOperacion']
			));

        }
        
        
