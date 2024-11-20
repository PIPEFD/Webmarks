<?php
require_once 'model.php';
require_once'../conexion(2).php';
$db=database::conectar();
if(isset($_REQUEST['action'])){
	switch($_REQUEST['action']){
		case 'registrar':
		$insert=new crud();
		$insert->insertar($_POST["num_preg"],$_POST["desc_pregunta"]);
		break;
		case 'actualizar':
		$update=new crud();
		$update->actualizar($_POST["num"],$_POST["numu"],$_POST["preg"]);
		break;
		case 'eliminar':
		$delete=new crud();	
		$delete->eliminar($_POST["num"]);
	}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>pregunta</title>
	<link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
	<center>

	<div id="uno">
		<?php if (!empty($_GET['m']) and !empty($_GET['action']) ) { ?>
		<form method="POST">
			<table class="redTable">
				<thead><tr><th colspan="2">REGISTRAR PREGUNTA DE SEGURIDAD</th></tr></thead>
				<tr><td>Numero de pregunta</td>
				<td><input id="form" type="number" name="num_preg" placeholder="Numero de la pregunta" ></td></tr>
				<tr><td>Descripcion de la pregunta</td>
				<td><input id="form" type="text" name="desc_pregunta" placeholder="Descripcion de la pregunta" style="text-transform: lowercase;"></td></tr>
				<tfoot>
					<tr>
						<td colspan="2">
							<div class="links">
								<input id="buton2c" type="submit"  value="Guardar" onclick="this.form.action='?action=registrar';"/>
							</div>
						</td>
					</tr>
					</tfoot>
			</table>

			

			
		</form>
		<?php } ?>
	</div>

	<div id="uno" >
		
			<h1>QUESTION RECORD</h1>
			<table class="redTable">
			<thead><tr>
			<th>Question ID</th>
			<th>Question</th>
			<th>EDIT</th>
			<th>DELETE</th>	
			</tr></thead>
			<?php
			$sql1="select * from security_question;";
			$query=$db->query($sql1);
			$contador=0;
			while($row=$query->fetch(PDO::FETCH_ASSOC)){
				 $contador=$contador+1;
			 ?>
			 	
		<form method="POST">
			<input type="number" name="numu" value="<?php echo $row["num_question"];?>" style="display:none" >
			<tr>
			<td ><input id="form" type="number" style="width: 99%" name="num" value="<?php echo $row["num_question"];?>" ></td>
			<td ><input style="width: 99%" id="form" type="text" name="preg" value="<?php echo $row["question"] ; ?>" placeholder="descripcion pregunta" style="text-transform: lowercase;" ></td>
			<td ><input type="submit" id="buton2d"  value="Actualizar pregunta de seguridad" onclick="this.form.action='?action=actualizar';"/></td>
			<td ><input type="submit" id="buton2d"  value="Eliminar pregunta" onclick="this.form.action='?action=eliminar';"/></td>
			</tr>		
		</form>	
	<?php } ?>
		<tfoot>
			<tr>
				<td colspan="4">
					<div class="links">
						<a href="../index_admin.php" id="buton1b">Go Back</a>
						<a href="?action=ver&m=1" id="buton1b">CREATE A SECURITY QUESTION</a>
					</div>
				</td>
			</tr>
		</tfoot>
		</table>
</div>
</center>

</body>
</html>