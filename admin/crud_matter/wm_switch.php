<?php

require_once "wm_func.php";
require_once "../conexion(2).php";

$db = database::conectar();

if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action']) 
	{
		case 'actualizar':
			
						$update = new matter();
			$update->actualizar($_POST['name_matter'],$_POST['id'],$_POST['state_matter'],$_POST['id_us'],$_POST['doc_type']);

		

			break;
		
		case 'registrar':
		

			$insert = new matter();
			$insert ->ingresar($_POST['name_matter'],$_POST['state_matter'],$_POST['id_us'],$_POST['doc_type']);

			break;

		case 'eliminar':
				
			$eliminar = new matter();
			$eliminar->eliminar($_GET['name_matter']);

			break;	

		case 'editar':
			
			$id = $_GET['name_matter'];

			break;	
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../main.css">
	<meta charset="utf-8">
	<title>Web Marks Institutional Project</title>
</head>
<body>
	<?php if (!empty($_GET['m']) and !empty($_GET['action']) ) { ?>

<div>
	
	<form action="#" method="post" enctype="multipart/form-data">
		<table class="redTable"><thead><tr><th colspan="2">NEW MATTER</th></tr></thead>
		<tr><th>Matter Name:</th>
		<td><input id="form" type="text" name="name_matter" placeholder="Matter Name" required></td></tr>
		<tr><th>Matter State:</th>	
		<td>Active <input type="radio" name="state_matter" value="1" checked>
		Inactive <input type="radio" name="state_matter" value="0" checked></td></tr>
	
		<tr><th>Document Type:</th>
		<td><select name="doc_type" id="form"> <?php
            foreach ($db->query('SELECT * FROM document_type')  as $row) {
                echo '<option value="'.$row['cod_document'].'">'.$row['desc_document'].'</option>';
            } ?>
        </select></td></tr>
        <tr><th>TEACHER ID:</th>
        <td><select name="id_us" id="form"> <?php
            foreach ($db->query('SELECT * FROM user')  as $row1) {
                echo '<option value="'.$row1['id_user'].'">'.$row1['id_user'].'</option>';
            } ?>
        </select></td></tr>
	    <tfoot>
				<tr>
					<td colspan="2">
						<div class="links">
							<input id="buton2c" type="submit" class="button"value="Save" onclick="this.form.action ='?action=registrar';">
						</div>
					</td>
				</tr>
			</tfoot>
	</table>

	</form>
</div>		
<?php } ?>

<?php if (!empty($_GET['name_matter']) && !empty($_GET['action']) ) { ?>

<div>
	<form action="#" method="post" enctype="multipart/form-data">
	<?php $sql = "SELECT * FROM matter WHERE name_matter = '$id'"; 

	$query = $db->query($sql);

	while ($r = $query->fetch(PDO::FETCH_ASSOC)) 
	{
	?>
	
	<table class="redTable"><thead><tr><th colspan="2">NEW MATTER</th></tr></thead>
	<tr><th>Matter Name:</th>
	<td><input type="text" id="form" name="name_matter" value="<?php echo $r['name_matter']?>" required></td></tr>
	<tr><th>Matter State:</th>

	<td> Active<input type="radio" name="state_matter" value="1" <?php echo $r['name_matter'] === '1' ? 'checked' : '' ?> >
	Inactive<input type="radio" name="state_matter" value="0" <?php echo $r['name_matter'] === '0' ? 'checked' : '' ?> ></td></tr>

	
	<tr><th>Document Type:</th>

	<td><select name="doc_type" id="form"> <?php
            foreach ($db->query('SELECT * FROM document_type')  as $row) {
                echo '<option value="'.$row['cod_document'].'">'.$row['desc_document'].'</option>';
            } ?>
        </select></td></tr>
        <tr><th>TEACHER ID:</th>
        <td><select name="id_us" id="form"> <?php
            foreach ($db->query('SELECT * FROM user')  as $row1) {
                echo '<option value="'.$row1['id_user'].'">'.$row1['id_user'].'</option>';
            } ?>
        </select></td></tr>
        <tfoot>
			<tr>
				<td colspan="2">
					<div class="links">
						<input id="buton2c" type="submit" class="button"value="Update" onclick="this.form.action = '?action=registrar';">
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

$sql = "SELECT * FROM matter inner join teacher on teacher_user_id_user=user_id_user_teacher inner join user on id_user=user_id_user_teacher";
$query = $db ->query($sql);

if ($query->rowCount()>0): ?>
<table class="redTable">
<thead>
<h1>MATTER</h1>
</thead>
<tr>
	<th>Matter Name</th>
	<th>Teacher name</th>
	<th>Teacher last name</th>
	<th>Matter state</th>
	<th>Edit Matter</th>
</tr>
<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)): ?>

<div>
<?php echo "<tr>"."<td>".$row['name_matter'] . "</td>";
	echo "<td>".$row['first_name'] . "</td>"; 
	echo "<td>".$row['first_last_name'] . "</td>"; 

	if ($row['state_matter'] == 1) {
		echo "<td>"."Active" . "</td>";
	}else {
		echo "<td>"."Inactive" . "</td>";

	}
	
?>

<td><a id="buton2d" href="?action=editar&name_matter=<?php echo $row['name_matter'];?>">Update</a>
<a id="buton2d" href="?action=eliminar&name_matter=<?php echo $row['name_matter'];?>" onclick="return confirm('Are you sure to eliminate this Matter?')">Delete</a></td></tr>

</div>
<?php endwhile; ?>
<tfoot>
	<tr>
		<td colspan="5">
			<div class="links">
				<a href="../index_admin.php" id="buton1b">Go Back</a>
				<a href="?action=ver&m=1" id="buton1b">NEW MATTER</a><br>
			</div>
		</td>
	</tr>
</tfoot>
</table>
<?php else: ?>
	<h4>Mr. User DO NOT find registration</h4>
	<br><a href="../index_admin.php" id="buton1b">Go Back</a>
	<a href="?action=ver&m=1" id="buton1b">NEW MATTER</a><br>
<?php endif; ?>	
</body>
</html>

