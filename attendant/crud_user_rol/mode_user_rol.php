<?php
	
	class mach_acces
	{
		private $pdo;
		public function __CONSTRUCT ()
		{
			try{
				$this->pdo= database::conectar();
			}
			catch (Exception $ex){
			 die($e->getmessage());
		}	}
	
		public function insert_mach_acces($id,$machine,$rol)
		{

			$sql="INSERT INTO user_has_role(user_id_user_role,user_document_type_cod_document_user_has_role,role_cod_role) VALUES ('$id','$machine','$rol')";
		$this->pdo->query($sql);
		print"<script>alert(\"Registro Agregado Exitosamente.\");window.location='view_user_rol.php';</script>";	
		}
		public function update_mach_acces($id2,$id,$machine,$rol,$rol2)

		{
			$sql = "UPDATE user_has_role SET
			user_id_user_role = '$id',
			user_document_type_cod_document_user_has_role='$machine',
			role_cod_role = '$rol'
			WHERE user_id_user_role = '$id2' and role_cod_role = '$rol2'";

			$this->pdo->query($sql);
			
				print "<script>alert(\"Registro Actualizado exitosamente.\");window.location='view_user_rol.php';</script>";	
		}
		
		public function delete_mach_acces($machine)
		{
			$sql = "DELETE FROM document_type WHERE cod_document='$machine'";

			$this->pdo->query($sql);
		 			
		 		 print "<script>alert(\"Registro Eliminado exitosamente.\");window.location='view_user_rol.php';</script>";
		}
	}	
?>		
