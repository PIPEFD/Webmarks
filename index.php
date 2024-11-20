<?php
require_once'model.php';
require_once'conexion(2).php';
$db=database::conectar();
if(isset($_REQUEST['action'])){
	switch($_REQUEST['action']){
		case'ingreso':
		$ingres=new crud();
		$ingres->ingresar($_POST["documento"],$_POST["numdoc"],$_POST["contra"],$_POST["rol"]);
		break;
		}
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>formualario ingreso</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div class="principal">
		<h2>Login</h2>
		<form method="POST" action="ingresarlogindos.php">
			<div class = "inputbox">
				<select name="documento">
					<?php
					require_once'conexion(2).php';
					$dabe=database::conectar(); 
					foreach($dabe->query('select * from document_type;')as $roww){
						echo'<option value="',$roww['cod_document'],'">',$roww['desc_document'],'</option>';
					} 
					?>					
				</select>
			</div>
			<div class = "inputbox">
				<input type="number" name="numdoc" required>
				<label>Numero Documento</label>
			</div>
			<div class = "inputbox">
				<input type="password" name="contra" required>
				<label>Contraseña</label>
			</div>
			<div class = "inputbox">
				<select name="rol">
					<?php
					require_once'conexion(2).php';
					$dabe=database::conectar(); 
					foreach($dabe->query('select * from role;')as $roww){
						echo'<option value="',$roww['cod_role'],'">',$roww['desc_role'],'</option>';
					} 
					?>					
				</select>
			</div>
			<input type="submit" name="ingresar" value="ingresar" onclick="this.form.action='?action=ingreso';">
		</form>
	</div>
</body>
</html>