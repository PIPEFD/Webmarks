<?php 
class crud{
	private $pdo;
	public function __CONSTRUCT(){
		try {
			$this->pdo=database::conectar();
		}
		catch(exception $e){
			die($e->getMessage());
		}
	}
	public function insertar($num_preg,$desc_pregunta){
		$sql="insert into security_question (num_question,question)values('$num_preg','$desc_pregunta');";
		$this->pdo->query($sql);
		print"<script>alert(\"registro agregado exitosamente.\");window.location='view.php';</script>";
	}
	public function actualizar($num,$numu,$preg){
		$sql1="update security_question set num_question='$num',question='$preg' where num_question='$numu';";
		$this->pdo->query($sql1);
		// print"<script>alert(\"registro actualizado exitosamente.\");window.location='view.php';</script>";
	}
	public function eliminar($num){
		$sql5="delete from security_question where num_question='$num';";

		$this->pdo->query($sql5);
		print"<script>alert(\"registro eliminado exitosamente.\");window.location='view.php';</script>";

	}
}


 ?>