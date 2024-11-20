<?php
		
	class mach_acces
	{
		private $pdo;
		public function __CONSTRUCT()
		{
			try{
			  $this->pdo=database::conectar();
			}
			catch (Exception $ex){
		 	 die($e->getmessage());
		}	}


		public function insert_mach_acces ($machine,$id_n)
		{
			$sql="INSERT INTO teacher (user_id_user_teacher,user_document_type_cod_document_teacher) VALUES ('$machine','$id_n')";
		$this->pdo->query($sql);
		print"<script>alert(\"Registro Agregado Exitosamente\");window.location='view_tea.php';</script>";
		}

		public function update_mach_acces($machine,$id_teaa,$machine2)
		{
			$sql="UPDATE teacher SET
			user_id_user_teacher='$machine2',
			user_document_type_cod_document_teacher='$id_teaa'
			WHERE user_id_user_teacher='$machine'";

			$this->pdo->query($sql);

				print"<script>alert(\"Registro Actualizado Correctamente\");window.location='view_tea.php';</script>";	
		}	



		public  function delete_mach_acces($machine,$machine2)
		{

			$sql="DELETE FROM teacher WHERE user_id_user_teacher='$machine' and user_document_type_cod_document_teacher='$machine2'
			 ";
				$this->pdo->query($sql);

				print"<script>alert(\"Registro Eliminado Correctamente\");window.location='view_tea.php';</script>";
	}	}	

?>
