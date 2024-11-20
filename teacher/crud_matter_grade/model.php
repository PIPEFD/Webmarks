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
	public function insertar($matter_name_matter,$grade_desc_grade){
		$sql="insert into matter_has_grade(matter_name_matter,grade_desc_grade) values('$matter_name_matter','$grade_desc_grade')";
		$this->pdo->query($sql);
		print"<script>alert(\"registro agregado exitosamente.\");window.location='view.php';</script>";
	} 
	public function actualizar($id2,$grade2,$matter_name_matter,$grade_desc_grade){
		$sql5="update matter_has_grade set matter_name_matter='$matter_name_matter', grade_desc_grade = '$grade_desc_grade' where matter_name_matter='$id2'";
		$this->pdo->query($sql5);
		print"<script>alert(\"registro actualizado exitosamente.\");window.location='view.php';</script>";
	}
	public function eliminar($matter_name_matter,$grade_desc_grade){
		$sql6="delete from  matter_has_grade where  matter_name_matter='$matter_name_matter' and grade_desc_grade='grade_desc_grade'";

		$this->pdo->query($sql6);
		print"<script>alert(\"registro eliminado exitosamente.\");window.location='view.php';</script>";

	}
}	
