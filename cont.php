<?php
require_once'model.php';
require_once'conexion(2).php';
$db=database::conectar();
$id = $_POST['id_user'];
if(isset($_REQUEST['action'])){
	switch($_REQUEST['action']){
		case'ingreso':
			if $_POST['rol']=="ac"{
				print"<script>alert(\"ingreso exitoso.\");window.location='admin/index_admin.php';</script>";
			}elseif $_POST['rol']=="es"{
				print"<script>alert(\"ingreso exitoso.\");window.location='student/index_admin.php';</script>";
			}elseif $_POST['rol']=="tc"{
				print"<script>alert(\"ingreso exitoso.\");window.location='teacher/index_admin.php';</script>";
			}elseif $_POST['rol']=="at"{
				print"<script>alert(\"ingreso exitoso.\");window.location='attendant/index_admin.php';</script>";
			}
		break;
		}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>ROL</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div class="principal">
		<h2>ROL DESEADO</h2>
		<form method="POST" action="ingresarlogindos.php">
			<div class = "inputbox">
				<select name="rol">
					<?php
					require_once'conexion(2).php';
					$dabe=database::conectar(); 
					foreach($dabe->query('select * from user_has_role join role where user_id_user_role="$id";')as $roww){
						echo'<option value="',$roww['role_cod_role'],'">',$roww['desc_role'],'</option>';
					} 
					?>					
				</select>
			</div>
			<input type="submit" name="ingresar" value="ingresar" onclick="this.form.action='?action=ingreso';">
		</form>
	</div>
</body>
</html>