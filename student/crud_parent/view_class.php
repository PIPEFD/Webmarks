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
			$photo = "/images/".$file;

			//Se copia el archivo a la carpeta file
			copy($ruta_file,$photo);
			*/
			$update = new parents();
			$update->actualizar($_POST['id_us'],$_POST['id'],$_POST['doc_type'],$_POST['parentship'],$_POST['id1']);

			break;
		
		case 'registrar':
			
			/*//Espacio que genera el almacenamiento de las imagenes
			$file = $_FILES['foto']['name'];
			$ruta_file = $_FILES['foto']['tmp_name'];
			$photo = "/images/".$file;

			//Se copia el archivo a la carpeta file
			copy($ruta_file,$photo);*/

			$insert = new parents();
			$insert ->ingresar($_POST['id_us'],$_POST['doc_type'], $_POST['parentship']);

			break;

		case 'eliminar':
				
			$eliminar = new parents();
			$eliminar->eliminar($_GET['user_id_user_attendant'],$_GET['user_document_type_cod_document']);

			break;	

		case 'editar':
			
			$id = $_GET['user_id_user_attendant'];
			$id1 = $_GET['user_document_type_cod_document'];

		break;	
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../main.css">
	<meta charset="utf-8">
	<title>Attendant</title>
</head>
<body>

<?php if (!empty($_GET['m']) and !empty($_GET['action']) ) { ?>
<div id="box">
	
	<form action="#" method="post" enctype="multipart/form-data">
		<table class="redTable">
		<tr><center><th colspan="2"><h1>NEW PARENT</h1></th></center></tr>
		<tr><th>DOC TYPE:</th>
				<!---<br><input type="text" name="mach_name" placeholder="Name of the Machine for the exercise" required>-->
		<td><select name="doc_type" id="form"> <?php
			foreach ($db->query('SELECT * FROM document_type')  as $row) {
				echo '<option value="'.$row['cod_document'].'">'.$row['desc_document'].'</option>';
			} ?>
		</select></td></tr>
		<tr><th>PARENT ID:</th>
		<td><select name="id_us" id="form"> <?php
			foreach ($db->query('SELECT * FROM user')  as $row1) {
				echo '<option value="'.$row1['id_user'].'">',$row1['id_user']," ",$row1['document_type_cod_document_user'].'</option>';
			} ?>
		</select></td></tr>
		
		<tr><th>PARENTSHIP:</th>
		<td><select name="parentship" id="form"> <?php
			foreach ($db->query('SELECT * FROM kindship')  as $row2) {
				echo '<option value="'.$row2['id_kindship'].'">'.$row2['desc_kindship'].'</option>';
			} ?>
		</select></td></tr>
		<tfoot>
			<tr>
				<td colspan="2">
					<div class="links">
						<input  id="buton2c" type="submit" value="Save" onclick="this.form.action ='?action=registrar';">
					</div>
				</td>
			</tr>
		</tfoot>
		</table>

	</form>
</div>		
<?php } ?>

<?php if (!empty($_GET['user_id_user_attendant']) && !empty($_GET['user_document_type_cod_document']) && !empty($_GET['action']) ) { ?>

<div id="box">
	<form action="#" method="post" enctype="multipart/form-data">
	<?php $sql = "SELECT * FROM attendant WHERE user_id_user_attendant = '$id' and user_document_type_cod_document='$id1'"; 

	$query = $db->query($sql);
	if (!empty($query)){
	while ($r = $query->fetch(PDO::FETCH_ASSOC)) 
	{
	?>
	<input type="text" name="id" value="<?php echo $r['user_id_user_attendant']?>" style="display: none">
	<input type="text" name="id1" value="<?php echo $r['user_document_type_cod_document']?>" style="display: none">
	
	<table class="redTable">
	<thead>
	<tr><center><th colspan="2"><h1>NEW KINDSHIP</h1></th></center></tr>
	</thead>
	<tr><th>DOC TYPE:</th>
	<!---<br><input type="text" name="mach_name" placeholder="Name of the achine for the exercise" required>-->
	<td><select name="doc_type" id="form"> <?php
		foreach ($db->query('SELECT * FROM document_type')  as $row) {
			echo '<option value="'.$row['cod_document'].'">'.$row['desc_document'].'</option>';
		} ?>
	</select></td></tr>
	<tr><th>PARENT ID:</th>
	<td><select id="form" name="id_us"> <?php
		foreach ($db->query('SELECT * FROM user')  as $row1) {
			echo '<option value="'.$row1['id_user'].'">',$row1['id_user']," ",$row1['document_type_cod_document_user'].'</option>';
		} ?>
	</select></td></tr>
	
	<tr><th>PARENTSHIP:</th>
	<td><select id="form" name="parentship"> <?php
		foreach ($db->query('SELECT * FROM kindship')  as $row2) {
			echo '<option value="'.$row2['id_kindship'].'">'.$row2['desc_kindship'].'</option>';
		} ?>
	</select></td></tr>
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
<?php
	 	}
	 	}
	} 

$sql = "SELECT * FROM kindship inner join attendant on id_kindship=kindship_id_kindship inner join user on id_user=user_id_user_attendant inner join document_type on cod_document=user_document_type_cod_document";
$query = $db ->query($sql);

if ($query->rowCount()>0): ?>
<center><h1 id="h1">Parents Record</h1></center>
<table class="redTable">

<thead>


<tr>
	<th>Doc Type</th>
	<th>ID</th>
	<th>Name</th>
	<th>Last Name</th>
	<th>Parentship</th>
	<th>EDIT</th>
</tr>
</thead>
<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)): ?>

<div>
<?php echo "<tr>"."<td>".$row['cod_document'] . "</td>";
	echo "<td>".$row['user_id_user_attendant'] . "</td>";
	echo "<td>".$row['first_name'] . "</td>";
	echo "<td>".$row['first_last_name'] . "</td>"; 
	echo "<td>".$row['desc_kindship'] . "</td>";
	/*if ($row['exercise_status'] == 1) {
		echo "<td>"."Active" . "</td>";
	}else {
		echo "<td>"."Inactive" . "</td>";
	}*/
?>

<td><a id="buton2b" href="?action=editar&user_id_user_attendant=<?php echo $row['user_id_user_attendant'];?>&user_document_type_cod_document=<?php echo $row['user_document_type_cod_document']?>">Update</a>
<a  id="buton2b" href="?action=eliminar&user_id_user_attendant=<?php echo $row['user_id_user_attendant'];?>&user_document_type_cod_document=<?php echo $row['user_document_type_cod_document']?>" onclick="return confirm('U sure?')">Delete</a></td></tr>

</div>
<?php endwhile; ?>
<tfoot>
	<tr>
		<td colspan="6">
			<div class="links">
				<a href="../index_admin.php" id="buton1b">Go Back</a>
				<a href="?action=ver&m=1" id="buton1b">NEW PARENT ASSIGNATION</a><br>

			</div>
		</td>
	</tr>
</tfoot>
</table>
<?php else: ?>
<h4>Mr. User DO NOT find registration</h4>
	<br><a href="../index_admin.php" id="buton1b">Go Back</a>
	<a href="?action=ver&m=1" id="buton1b">NEW PARENT ASSIGNATION</a><br>
<?php endif; ?>	

</body>
</html>

