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

			$sql="INSERT INTO document_type(cod_document,desc_document) VALUES ('$id',UPPER('$machine'))";
		$this->pdo->query($sql);
		print"<script>alert(\"Registro Agregado Exitosamente.\");window.location='view_type.php';</script>";	
		}
		public function update_mach_acces($id,$id2,$machine)

		{
			$sql = "UPDATE document_type SET
			cod_document = '$id',
			desc_document='$machine'
			WHERE cod_document='$id2'";

			$this->pdo->query($sql);
			
				print "<script>alert(\"Registro Actualizado exitosamente.\");window.location='view_type.php';</script>";	
		}
		
		public function delete_mach_acces($machine)
		{
			$sql = "DELETE FROM document_type WHERE cod_document='$machine'";

			$this->pdo->query($sql);
		 			
		 		 print "<script>alert(\"Registro Eliminado exitosamente.\");window.location='view_type.php';</script>";
		}
	}	
?>		
