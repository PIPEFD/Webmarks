<?php

require_once "webm_func.php";
require_once "../conexion(2).php";

$db = database::conectar();

if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action']) 
	{
		case 'actualizar':
			
						$update = new grade();
			$update->actualizar($_POST['desc_grade'],$_POST['id'],$_POST['state']);

			break;
		
		case 'registrar':
		

			$insert = new grade();
			$insert ->ingresar($_POST['desc_grade'],$_POST['state_grade']);

			break;

		case 'eliminar':
				
			$eliminar = new grade();
			$eliminar->eliminar($_GET['desc_grade']);

			break;	

		case 'editar':
			
			$id = $_GET['desc_grade'];

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
		<table class="redTable"><thead><tr><th colspan="2">New Grade</th></tr></thead>
		<tr><th>Grade name:</th>
		<td><input id="form" type="text" name="desc_grade" placeholder="grade name" required></td></tr>
		<tr><th>Grade State:</th>
		<td>Active <input type="radio" name="state_grade" value="1" checked>
		Inactive <input type="radio" name="state_grade" value="0" checked></td></tr>
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

<?php if (!empty($_GET['desc_grade']) && !empty($_GET['action']) ) { ?>

<div>
	<form action="#" method="post" enctype="multipart/form-data">
	<?php $sql = "SELECT * FROM grade WHERE desc_grade = '$id'"; 

	$query = $db->query($sql);

	while ($r = $query->fetch(PDO::FETCH_ASSOC)) 
	{
	?>
	<br><input type="text" name="id" value="<?php echo $r['desc_grade']?>" style="display: none">
	<table class="redTable">
		<thead><tr><th colspan="2">New Grade</th></tr></thead>
	<tr><th>Grade name:</th>
	
	<td><input id="form" type="text" name="desc_grade" value="<?php echo $r['desc_grade']?>" required></td></tr>
	<tr><th>Grade State:</th>

		<td> Active<input type="radio" name="state" value="1" <?php echo $r['state_grade'] === '1' ? 'checked' : '' ?> >
		Inactive<input type="radio" name="state" value="0" <?php echo $r['state_grade'] === '0' ? 'checked' : '' ?> ></td></tr>
		<tfoot>
			<tr>
				<td colspan="2">
					<div class="links">
						<input type="submit" class="button"value="Update" id="buton2c" onclick="this.form.action = '?action=actualizar';">

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

$sql = "SELECT * FROM grade";
$query = $db ->query($sql);

if ($query->rowCount()>0): ?>
<table class="redTable">
<thead>
<h1>GRADE</h1>
</thead>
<tr>
	<th>Grade Description </th>
	<th>State Description</th>
	<th>Grade State</th>
	<th>Options</th>

	
</tr>
<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)): ?>

<div>
<?php echo "<tr>"."<td>".$row['desc_grade'] . "</td>";
	echo "<td>".$row['state_grade'] . "</td>"; 

	if ($row['state_grade'] == 1) {
		echo "<td>"."Active" . "</td>";
	}else {
		echo "<td>"."Inactive" . "</td>";
	}
?>

<td><a id="buton2d" href="?action=editar&desc_grade=<?php echo $row['desc_grade'];?>">Update</a>
<a id="buton2d" href="?action=eliminar&desc_grade=<?php echo $row['desc_grade'];?>" onclick="return confirm('Are you sure to eliminate this grade?')">Delete</a></td></tr>

</div>
<?php endwhile; ?>
<tfoot>
	<tr>
		<td colspan="4">
			<div class="links">
				<a href="../index_admin.php" id="buton1b">Go Back</a>
				<a href="?action=ver&m=1" id="buton1b">NEW GRADE</a><br>
			</div>
		</td>
	</tr>
</tfoot>
</table>
<?php else: ?>
	<h4>Mr. User DO NOT find registration</h4>
	<br><a href="../index_admin.php" id="buton1b">Go Back</a>
	<a href="?action=ver&m=1" id="buton1b">NEW GRADE</a><br>
<?php endif; ?>	
</body>
</html>

