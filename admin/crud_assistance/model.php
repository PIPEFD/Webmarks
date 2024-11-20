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
	public function insertar($cod_assistance,$student_user_id_user,$student_user_document_type_cod_document,$matter_has_grade_matter_name_matter,$matter_has_grade_grade_desc_grade,$register){
		$sql="insert into assistance(cod_assistance,date_assistance,student_user_id_user,student_user_document_type_cod_document,matter_has_grade_matter_name_matter,matter_has_grade_grade_desc_grade,register) values('$cod_assistance',Now(),'$student_user_id_user','$student_user_document_type_cod_document','$matter_has_grade_matter_name_matter','$matter_has_grade_grade_desc_grade','$register')";
		$this->pdo->query($sql);
		print"<script>alert(\"registro agregado exitosamente.\");window.location='view.php';</script>";
	} 
	public function actualizar($id2,$cod_assistance,$student_user_id_user,$student_user_document_type_cod_document,$matter_has_grade_matter_name_matter,$matter_has_grade_grade_desc_grade,$register){
		$sql5="update assistance set cod_assistance='$cod_assistance',date_assistance=Now(), student_user_id_user = '$student_user_id_user', student_user_document_type_cod_document = '$student_user_document_type_cod_document', matter_has_grade_matter_name_matter='$matter_has_grade_matter_name_matter',matter_has_grade_grade_desc_grade='$matter_has_grade_grade_desc_grade',register='$register' where cod_assistance='$id2'";
		$this->pdo->query($sql5);
		print"<script>alert(\"registro actualizado exitosamente.\");window.location='view.php';</script>";
	}
	public function eliminar($cod_assistance){
		$sql6="delete from  student where  cod_assistance='$cod_assistance'";

		$this->pdo->query($sql6);
		print"<script>alert(\"registro eliminado exitosamente.\");window.location='view.php';</script>";

	}
}	
