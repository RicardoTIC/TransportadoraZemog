<?php 

require_once 'db.php';


class talleresFunciones{

	public function save($nombreTaller,$direccion){

		$conexion = new db();
		
		$sql = "INSERT INTO talleres(id,nombre,direccion)VALUES(null,:nom,:direcc)";
		$stmt = $conexion->prepare($sql);
		$stmt->bindValue(':nom',$nombreTaller);
		$stmt->bindValue(':direcc',$direccion);	


		$validacion_taller = $stmt->execute();

		

		if ($validacion_taller) {
			echo "Registro Insertado";

		}else{
			echo "Error en la sentencia";
		}

	}
	

	public function delete($id){
		$conexion = new db();
		$sql = "DELETE FROM talleres WHERE id=:id";
		$stament = $conexion->prepare($sql);
		$stament->bindValue(':id',$id);

		if($stament->execute()){
			return true;
		}else{
			return false;
		}

	}


	public function seleccionarPorTaller($nombre){
		$conexion = new db();
		$sql = "SELECT * FROM talleres WHERE nombre=:name";
		$stmt = $conexion->prepare($sql);
		$stmt->bindValue(':name',$nombre);

		$validacion_taller = $stmt->execute();


		if ($validacion_taller) {
			return $taller = $stmt->fetch(PDO::FETCH_LAZY);
		}else{
			return false;
		}


	}

}