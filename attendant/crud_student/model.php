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
	public function insertar($user_id_user_student,$user_document_type_cod_document_student,$attendant_user_id_user,$attendant_user_document_type_cod_document,$grade_desc_grade_student){
		$sql="insert into student(user_id_user_student,user_document_type_cod_document_student,attendant_user_id_user,attendant_user_document_type_cod_document,grade_desc_grade_student) values('$user_id_user_student','$user_document_type_cod_document_student','$attendant_user_id_user','$attendant_user_document_type_cod_document','$grade_desc_grade_student')";
		$this->pdo->query($sql);
		print"<script>alert(\"registro agregado exitosamente.\");window.location='view.php';</script>";
	} 
	public function actualizar($id2,$user_id_user_student,$user_document_type_cod_document_student,$attendant_user_id_user,$attendant_user_document_type_cod_document,$grade_desc_grade_student){
		$sql5="update student set user_id_user_student='$user_id_user_student', user_document_type_cod_document_student = '$user_document_type_cod_document_student', attendant_user_id_user = '$attendant_user_id_user', attendant_user_document_type_cod_document='$attendant_user_document_type_cod_document',grade_desc_grade_student='$grade_desc_grade_student' where user_id_user_student='$id2'";
		$this->pdo->query($sql5);
		print"<script>alert(\"registro actualizado exitosamente.\");window.location='view.php';</script>";
	}
	public function eliminar($user_id_user_student){
		$sql6="delete from  student where  user_id_user_student='$user_id_user_student'";

		$this->pdo->query($sql6);
		print"<script>alert(\"registro eliminado exitosamente.\");window.location='view.php';</script>";

	}
}	
