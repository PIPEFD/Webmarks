<?php 

	class parentship
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

		public function ingresar($name,$state)
		{

			$sql = "INSERT INTO kindship (id_kindship, desc_kindship) VALUES('$name','$state')";

			$this->pdo->query($sql);

			print "<script>alert('ADDED.'); window.location='view_class.php';</script>";
		}

		public function actualizar($name,$id,$state)
		{

			$sql ="UPDATE kindship SET id_kindship = '$name', desc_kindship = '$state' WHERE id_kindship = '$id'";

			$this->pdo->query($sql);

			print "<script>alert('UPDATED.'); window.location='view_class.php';</script>";

		}

		public function eliminar($name)
		{

			$sql = "DELETE FROM kindship WHERE id_kindship = '$name'";

			$this->pdo->query($sql);

			print "<script>alert('DELETE.'); window.location='view_class.php';</script>";
		}

	}

 ?>
