<?php 
	require_once "../conexion(2).php";

	
	class parents
	{
		private $pdo;
		public function __CONSTRUCT()
		{
			try {
				$this->pdo = database::conectar();
				$db = database::conectar();

			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function ingresar($name,$doc,$parentship)
		{

		$sql1 = "SELECT * FROM user WHERE id_user= '$name' and document_type_cod_document_user='$doc'";
		$prueba=$this->pdo->query($sql1);
		while ($r = $prueba->fetch(PDO::FETCH_ASSOC)) 
		{$id_user=$r['id_user'];}
		if (!empty($id_user)){
			$sql = "INSERT INTO  attendant (user_id_user_attendant, user_document_type_cod_document, kindship_id_kindship) VALUES('$name','$doc','$parentship')";
			$this->pdo->query($sql);
			print "<script>alert('ADDED.'); window.location='view_class.php';</script>";
		} else {print "<script>alert('Wrong User, please try again.'); window.location='view_class.php';</script>";}
		}

		public function actualizar($name,$id,$doc,$parentship,$docn)
		{
		$sql1 = "SELECT * FROM user WHERE id_user= '$name' and document_type_cod_document_user='$doc'";
		$prueba=$this->pdo->query($sql1);
		while ($r = $prueba->fetch(PDO::FETCH_ASSOC)) 
		{$id_user=$r['id_user'];}
		if (!empty($id_user)){
			$sql ="UPDATE attendant SET user_id_user_attendant = '$name', user_document_type_cod_document = '$doc', kindship_id_kindship= '$parentship' WHERE user_id_user_attendant = '$id' and user_document_type_cod_document='$docn'";

			$this->pdo->query($sql);

			print "<script>alert('UPDATED.'); window.location='view_class.php';</script>";
		} else {print "<script>alert('Wrong User, please try again.'); window.location='view_class.php';</script>";}
		}

		public function eliminar($name,$docn)
		{

			$sql = "DELETE FROM attendant WHERE user_id_user_attendant = '$name' and user_document_type_cod_document='$docn'";

			$this->pdo->query($sql);

			print "<script>alert('DELETED'); window.location='view_class.php';</script>";
		}
		public function sele($var,$val) {
    		if($var==$val){
        		return "selected";
    		}
		}  
	}

 ?>
