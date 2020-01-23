<?php 


require_once 'db.php';

class operacionesFunciones{


	public function save($operacion){

		$conexion = new db();
		$sql ="INSERT INTO operaciones(id,nombreOperacion)VALUES(null,:nomOperacion)";

		$stament = $conexion->prepare($sql);

		$stament->bindValue(':nomOperacion',$operacion);
		$validacion = $stament->execute();

		if($validacion){
			return true;
		}else{
			return false;
		}
	}

	public function delete($id){
		
		$conexion = new db();
		$sql = "DELETE FROM operaciones WHERE id=:ids";

		$stament = $conexion->prepare($sql);
		$stament->bindValue(':ids',$id);
		$validacionDelete  = $stament->execute();

		if($validacionDelete){
			return true;
		}else{
			return false;
		}

	}

}