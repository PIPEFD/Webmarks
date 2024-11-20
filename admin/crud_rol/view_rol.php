<?php

require_once 'mode_rol.php';
require_once '../conexion(2).php';

$db=database::conectar();
if(isset($_REQUEST['action']))
{	switch ($_REQUEST['action'])
	{
		case 'actualizar':

		$update=new mach_acces();
		$update->update_mach_acces($_POST["id"],$_POST["id2"],$_POST["desc_document"]);
		
		break;

		case 'registrar':  


		$insert=new mach_acces();
		$insert->insert_mach_acces($_POST["id"],$_POST["desc_document"]);

		break;	
		
		case'eliminar':
		$delete=new mach_acces();
		$delete->delete_mach_acces($_GET["id"]);
			
		break;

		case'editar':
		$capt = $_GET["id"];
		break;
		 }
	}	 

?> 
 
<!DOCTYPE html>
<html lang="eng">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
	<?php if(!empty($_GET['m']) and !empty($_GET['action']) ){  ?>

<div>
	<form action='#' method="POST" enctype="multipart/form-data">
		<table class="redTable"><thead><tr><th colspan="2">New Rol</th></tr></thead>
			<tr><th>Cod rol</th>
			<td><input type="text" id="form" name="id" placeholder="Código documento" required></td></tr>
			<tr><th>Rol Description</th>
			<td><input type="text" id="form" name="desc_document" placeholder="Tipo documento " required></td></tr>
			<tfoot>
				<tr>
					<td colspan="2">
						<div class="links">
							<input type="submit" value= "Save" onclick= "this.form.action = '?action=registrar';"/>
						</div>
					</td>
				</tr>
			</tfoot>
		</table>
			
	</form> 
</div>
<?php } ?>
</body>

	<?php if(!empty($_GET["id"]) && !empty($_GET['action'])){ ?>
<div>
	

	<form action="#" method="POST" enctype="multipart/form-data">
<?php $sql1="SELECT * FROM role
					WHERE cod_role='$capt'";
$query=$db->query($sql1);


 while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
?> 
	<input type="text" name="id2" value="<?php echo $row["cod_role"];?>" style="display:none">
	<table class="redTable"><thead><tr><th colspan="2">Update Rol</th></tr></thead>
	<tr><th>Cod Rol</th>
	<td><input id="form" type="text" name="id" value="<?php echo $row["cod_role"];?>" required></td></tr>
	<tr><th>Rol Description</th>
	<td><input id="form" type="text" name="desc_document" value="<?php echo $row["desc_role"];?>" placeholder="tipo documento" required></td></tr>
	<tfoot>
		<tr>
			<td colspan="2">
				<div class="links">
					<input type="submit" value= "Send" onclick= "this.form.action = '?action=actualizar';"/>
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



$sql1="SELECT * FROM role";
$query = $db->query($sql1);


if($query->rowCount()>0):?>
<h1>ROL</h1><br>
<table class="redTable">
	<thead><tr>
		<th>Cod Rol</th>
		<th>Rol Description</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr></thead>
<?php while ($row=$query->fetch(PDO::FETCH_ASSOC)):?>

<div class="ex2">
<tr>
<td ><?php echo $row['cod_role'] ."<br>";?></td>
<td ><?php echo $row['desc_role'] ."<br>";?>	</td>

  <td ><a id="buton2d" href="?action=editar&id=<?php echo $row["cod_role"];?>">Update</a></td>
   <td ><a id="buton2d" href="?action=eliminar&id=<?php echo $row["cod_role"];?>" onclick="return confirm('¿Esta seguro de eliminar este Usuario?')">Delete</a></td>
</tr>
</div>
<?php endwhile;?>
<tfoot>
	<tr>
		<td colspan="4">
			<div class="links">
				<a href="../index_admin.php" id="buton1b">Go Back</a>
				<a href="?action=ver&m=1" id="buton1b">CREATE A ROL</a><br>
			</div>
		</td>
	</tr>
</tfoot>
</table>
<?php else: ?>
	<h4>Mr. User DO NOT find registration</h4>
	<br><a href="../index_admin.php" id="buton1b">Go Back</a>
	<a href="?action=ver&m=1" id="buton1b">CREATE A ROL</a><br>
<?php endif; ?>	 
</div>		
</body>
</html>