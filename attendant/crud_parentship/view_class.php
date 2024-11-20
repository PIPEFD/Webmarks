<?php
require_once "model_class.php";
require_once "../conexion(2).php";

$db = database::conectar();

if (isset($_REQUEST['action']))
{
	switch ($_REQUEST['action']) 
	{
		case 'actualizar':
			
			/*//Espacio que genera el almacenamiento de las imagenes
			$file = $_FILES['foto']['name'];
			$ruta_file = $_FILES['foto']['tmp_name'];
			$photo = "../images".$file;

			//Se copia el archivo a la carpeta file
			copy($ruta_file,$photo);*/

			$update = new parentship();
			$update->actualizar(@$_POST['id_kindship'],$_POST['id'],@$_POST['state']);

			break;
		
		case 'registrar':
			
			/*//Espacio que genera el almacenamiento de las imagenes
			$file = $_FILES['foto']['name'];
			$ruta_file = $_FILES['foto']['tmp_name'];
			$photo = "../images".$file;

			//Se copia el archivo a la carpeta file
			copy($ruta_file,$photo);*/

			$insert = new parentship();
			$insert ->ingresar($_POST['id_parentship'],$_POST['parentship_state']);

			break;

		case 'eliminar':
				
			$eliminar = new parentship();
			$eliminar->eliminar($_GET['id_kindship']);

			break;	

		case 'editar':
			
			$id = $_GET['id_kindship'];

			break;	
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../main.css">
	<title>KINDSHIP</title>
</head>
<body>
	 <?php if (!empty($_GET['m']) and !empty($_GET['action']) ) { ?>
	<div id="box">
			
			<form action="#" method="post" enctype="multipart/form-data">
			<table class="redTable">
				<tr><center><th colspan="2"><h1>NEW KINDSHIP</h1></th></center></tr>
				<tr><th><label>KINDSHIP ID:</label></th>
				<td><input type="text" name="id_parentship" placeholder="KINDSHIP ID" required id="form"></td></tr>
				<tr><th><label>Kindship Description:</label></th>
				
				<!--
				<label>Machine - Accesory Photo:</label>
				<input type="file" name="foto" required>-->

				
				<td><input type="text" id="form" name="parentship_state" placeholder="Description"></td></tr>
				<tfoot>
					<tr>
						<td colspan="2">
							<div class="links">
								<input  type="submit" value="Update" onclick="this.form.action = '?action=actualizar';">

							</div>
						</td>
					</tr>
					</tfoot>
			</table>
			
			</form>
	</div>

	<?php } ?>

	<?php if (!empty($_GET['id_kindship']) && !empty($_GET['action']) ) { ?>

	<div id="box">
		<form action="#" method="post" enctype="multipart/form-data">
		<?php $sql = "SELECT * FROM Kindship WHERE id_kindship = '$id'"; 

		$query = $db->query($sql);

		while ($r = $query->fetch(PDO::FETCH_ASSOC)) 
		{
		?>
		<td><input type="text" name="id" value="<?php echo $r['id_kindship']?>" style="display: none">
		<table class="redTable">
		<tr><center><th colspan="2"><h1>UPDATE KINDSHIP</h1></th></center></tr>
		
		<tr><th>ID PARENTSHIP</th>
		
		<td><input type="text" name="id_kindship" value="<?php echo $r['id_kindship']?>" required id="form"></td></tr>
		<tr><th>parent State:</th>

		<td><input type="text" value="<?php echo $r['desc_kindship']?>"name="state" placeholder="Description" id="form"></td></tr>
		<tfoot>
				<tr>
					<td colspan="2">
						<div class="links">
							<input type="submit" value= "Save" onclick= "this.form.action = '?action=actualizar';"/>
						</div>
					</td>
				</tr>
			</tfoot>
	</table>
		

		</form>	
	</div>
	<?php
		 	}
		} 

	$sql = "SELECT * FROM kindship";
	$query = $db ->query($sql);

	if ($query->rowCount()>0): ?>

		<center><h1 id="h1">Parentship Records</h1></center>
		<table class="redTable">
			<tr>
				<th>Parentship ID</th>
				<th>DESCRIPTION</th>
				<th>EDIT</th>
			</tr>
			<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)): ?>

			<?php echo "<tr>"."<td>".$row['id_kindship'] . "</td>";

				echo "<td>".$row['desc_kindship'] . "</td>";
			?>

			<td><a id="buton2b" href="?action=editar&id_kindship=<?php echo $row['id_kindship'];?>">Update</a>
			<a id="buton2b" href="?action=eliminar&id_kindship=<?php echo $row['id_kindship'];?>" onclick="return confirm('U sure?')">Delete</a></td></tr>


			<?php endwhile; ?>
			<tfoot>
				<tr>
					<td colspan="3">
						<div class="links">
							<a href="../index_admin.php" id="buton1b">Go Back</a>
							<a id="buton1b" href="?action=ver&m=1">NEW KINDSHIP</a> 
						</div>
					</td>
				</tr>
			</tfoot>
		</table>
	<?php else: ?>
		<h4>Mr. User DO NOT find registration</h4>
		<br><a href="../index_admin.php" id="buton1b">Go Back</a>
		<a id="buton1b" href="?action=ver&m=1">NEW KINDSHIP</a>
	<?php endif; ?>	
</body>
</html>

