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
	public function insertar($type_document,$id_user,$first_name,$second_name,$first_last_name,$second_last_name,$pass,$address,$phone,$e_mail,$security_question,$answer,$rol){
		$sql="insert into user(document_type_cod_document_user,id_user,first_name,second_name,first_last_name,second_last_name,password,address,phone,e_mail,security_question_num_question,answer) values('$type_document','$id_user','$first_name','$second_name','$first_last_name','$second_last_name','$pass','$address','$phone','$e_mail','$security_question','$answer')";
		$this->pdo->query($sql);
		$sql1 = "INSERT INTO user_has_role(user_id_user_role,user_document_type_cod_document_user_has_role,role_cod_role) VALUES ('$id_user','$type_document','$rol')"; 
		$this->pdo->query($sql1);
		print"<script>alert(\"registro agregado exitosamente.\");window.location='view.php';</script>";
	} 
	public function actualizar($id2,$id_user,$first_name,$second_name,$first_last_name,$second_last_name,$address,$phone,$e_mail,$document_type_cod_document_user,$security_question_num_question,$answer,$password,$rol){
		$sql5="update user set id_user='$id_user', first_name = '$first_name', second_name = '$second_name', first_last_name='$first_last_name',second_last_name='$second_last_name',address='$address',phone='$phone',e_mail='e_mail',document_type_cod_document_user='$document_type_cod_document_user', security_question_num_question='$security_question_num_question',answer='$answer',password='$password' where id_user='$id2'";
		$this->pdo->query($sql5);
		$sql5="UPDATE user_has_role SET user_id_user_role='$id_user',user_document_type_cod_document_user_has_role='$document_type_cod_document_user',role_cod_role='$rol' where user_id_user_role=$id2";
		$this->pdo->query($sql5);
		print"<script>alert(\"registro actualizado exitosamente.\");window.location='view.php';</script>";
	}
	public function eliminar($id_user){
		$sql6="delete from  user where  id_user='$id_user'";

		$this->pdo->query($sql6);
		$sql6="delete from  user_has_role where  user_id_user_role='$id_user'";

		$this->pdo->query($sql6);
		print"<script>alert(\"registro eliminado exitosamente.\");window.location='view.php';</script>";

	}
}	
