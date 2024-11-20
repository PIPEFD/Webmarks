<?php 

	class matter
	{
		private $pdo;
		public function __CONSTRUCT()
		{
			try {
				$this->pdo = database::conectar();

			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function ingresar($name_matter,$state_matter,$id_us,$doc_type)
		{

			$sql = "INSERT INTO matter (name_matter, state_matter,teacher_user_id_user,teacher_user_document_type_cod_document) VALUES('$name_matter','$state_matter','$id_us','$doc_type')";

			$this->pdo->query($sql);

			print "<script>alert('Matter Added Successfully.'); window.location='wm_switch.php';</script>";
		}

		public function actualizar($name_matter,$id,$state_matter,$id_us,$doc_type)
		{

			$sql ="UPDATE matter SET name_matter = '$name_matter', state_matter = '$state_matter', teacher_user_id_user='$id_us', teacher_user_document_type_cod_document='$doc_type' WHERE name_matter = '$id'";

			$this->pdo->query($sql);

			print "<script>alert('
Matter Updated Successfully.'); window.location='wm_switch.php';</script>";

		}

		public function eliminar($name_matter)
		{

			$sql = "DELETE FROM matter WHERE name_matter = '$name_matter'";

			$this->pdo->query($sql);

			print "<script>alert('Matter Deleted Successfully.'); window.location='wm_switch.php';</script>";
		}

	}

 ?>
