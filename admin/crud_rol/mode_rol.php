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
	
		public function insert_mach_acces($id,$machine)
		{

			$sql="INSERT INTO role(cod_role,desc_role) VALUES ('$id',UPPER('$machine'))";
		$this->pdo->query($sql);
		print"<script>alert(\"Registro Agregado Exitosamente.\");window.location='view_rol.php';</script>";	
		}
		public function update_mach_acces($id,$id2,$machine)

		{
			$sql = "UPDATE role SET
			cod_role = '$id',
			desc_role='$machine'
			WHERE cod_role='$id2'";

			$this->pdo->query($sql);
			
				// print "<script>alert(\"Registro Actualizado exitosamente.\");window.location='view_rol.php';</script>";	
		}
		
		public function delete_mach_acces($machine)
		{
			$sql = "DELETE FROM role WHERE cod_role='$machine'";

			$this->pdo->query($sql);
		 			
		 		 print "<script>alert(\"Registro Eliminado exitosamente.\");window.location='view_rol.php';</script>";
		}
	}	
?>		
