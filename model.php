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
	public function insertar($type_document,$id_user,$first_name,$second_name,$first_last_name,$second_last_name,$pass,$address,$phone,$e_mail,$security_question,$answer){
		$sql="insert into user(document_type_cod_document,id_user,first_name,second_name,first_last_name,second_last_name,password,address,phone,e_mail,security_question_num_question,answer) values('$type_document','$id_user','$first_name','$second_name','$first_last_name','$second_last_name','$pass','$address','$phone','$e_mail','$security_question','$answer');";
		$this->pdo->query($sql);
		print"<script>alert(\"registro agregado exitosamente.\");window.location='view.php';</script>";
	}
	public function actualizar($type_documentdos,$type_documenta,$pindos,$pin,$primer,$segun,$primera,$seguna,$passw,$direc,$tel,$correo,$preg,$respu){
		$sql5="update user set document_type_cod_document='$type_documenta',id_user='$pin',first_name='$primer',second_name='$segun',first_last_name='$primera',second_last_name='$seguna',password='$passw',address='$direc',phone='$tel',e_mail='$correo',security_question_num_question='$preg',answer='$respu' where document_type_cod_document='$type_documentdos' and id_user='$pindos'; ";
		$this->pdo->query($sql5);
		print"<script>alert(\"registro actualizado exitosamente.\");window.location='view.php';</script>";
	}
		public function eliminar($type_documento,$pinid){
		$sql6="delete from  user where document_type_cod_document='$type_documento' and id_user='$pinid';";

		$this->pdo->query($sql6);
		print"<script>alert(\"registro eliminado exitosamente.\");window.location='view.php';</script>";

	}
	public function ingresar($documento,$numdoc,$contra,$rol){
		$cont=0;
		$sql7="select role_cod_role from user inner join user_has_role where document_type_cod_document_user='$documento' and id_user='$numdoc' and password='$contra' and role_cod_role='$rol' and user_id_user_role='$numdoc';";

		 $this->pdo->query($sql7);
			
		while($row=$this->pdo->query($sql7)->fetch(PDO::FETCH_ASSOC)){
			$cont=$cont+1;
			

			if($cont!=0 and $rol==$row['role_cod_role']){
				if ($row['role_cod_role']=='ac'){
					print"<script>alert(\"ingreso exitoso.\");window.location='admin/index_admin.php';</script>";
					break;
				}elseif ($row['role_cod_role']=="es" ){
					print"<script>alert(\"ingreso exitoso.\");window.location='student/index_admin.php';</script>";
					break;
				}elseif ($row['role_cod_role']=="tc"){
					print"<script>alert(\"ingreso exitoso.\");window.location='teacher/index_admin.php';</script>";
					break;
				}elseif ($row['role_cod_role']=="at"){
					print"<script>alert(\"ingreso exitoso.\");window.location='attendant/index_admin.php';</script>";
					break;
				}else{
					print"<script>alert(\"rol incorrecto.\");window.location= 'index.php';</script>";
				}
			}

		}
		print"<script>alert(\"usuario y/o password incorrectas.\");window.location= 'index.php';</script>";						
	}	
}					

