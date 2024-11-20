<?php 

	class grade
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

		public function ingresar($desc_grade,$state_grade)
		{

			$sql = "INSERT INTO grade (desc_grade, state_grade) VALUES('$desc_grade','$state_grade')";

			$this->pdo->query($sql);

			print "<script>alert('grade Added Successfully.'); window.location='webm_view.php';</script>";
		}

		public function actualizar($desc_grade,$id,$state_grade)
		{

			$sql ="UPDATE grade SET desc_grade = '$desc_grade', state_grade= '$state_grade' WHERE desc_grade = '$id'";

			$this->pdo->query($sql);

			print "<script>alert('Grade Updated Successfully.'); window.location='webm_view.php';</script>";

		}

		public function eliminar($desc_grade)
		{

			$sql = "DELETE FROM grade WHERE desc_grade = '$desc_grade'";

			$this->pdo->query($sql);

			print "<script>alert('Grade Deleted Successfully.'); window.location='webm_view.php';</script>";
		}

	}

 ?>
