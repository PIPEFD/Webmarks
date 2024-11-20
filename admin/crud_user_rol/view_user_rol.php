<?php

require_once 'mode_user_rol.php';
require_once '../conexion(2).php';

$db=database::conectar();
if(isset($_REQUEST['action']))
{	switch ($_REQUEST['action'])
	{
		case 'actualizar':

		$update=new mach_acces();
		$update->update_mach_acces($_POST["id2"],$_POST["user_id_user_role"],$_POST["user_document_type_cod_document_user_has_role"],$_POST["role_cod_role"],$_POST["rol2"]);
		
		break;

		case 'registrar':  


		$insert=new mach_acces();
		$insert->insert_mach_acces($_POST["user_id_user_role"],$_POST["user_document_type_cod_document_user_has_role"],$_POST["role_cod_role"]);

		break;	
		
		case'eliminar':
		$delete=new mach_acces();
		$delete->delete_mach_acces($_GET["user_id_user_rol"]);
			
		break;

		case'editar':
		$capt = $_GET["user_id_user_role"];
		$op = $_GET["role_cod_role"];
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
		<table class="redTable"><thead><tr><th colspan="3">New Rol</th></tr></thead>
			<tr>
			<td><select id="form" name="user_id_user_role">
			<?php
				$db=database::conectar();
				foreach($db->query('select * from user;')as $row2){ ?>
					<option value="<?php echo $row2['id_user'];?>" ><?php echo $row2['id_user']?></option>
				<?php } ?>
			</select></td>
			<td><select id="form" name="user_document_type_cod_document_user_has_role">
			<?php
				$db=database::conectar();
				foreach($db->query('select * from document_type')as $row2){ ?>
					<option value="<?php echo $row2['cod_document'];?>" ><?php echo $row2['desc_document']?></option>
				<?php } ?>
			</select></td>
			<td><select id="form" name="role_cod_role">
			<?php
				$db=database::conectar();
				foreach($db->query('select * from role')as $row2){ ?>
					<option value="<?php echo $row2['cod_role'];?>" ><?php echo $row2['desc_role']?></option>
				<?php } ?>
			</select></td>
			</tr>
			<tfoot>
				<tr>
					<td colspan="3">
						<div class="links">
							<input type="submit" value= "Send" onclick= "this.form.action = '?action=registrar';"/>
						</div>
					</td>
				</tr>
			</tfoot>
		</table>
			
	</form> 
</div>
<?php } ?>
	<?php if(!empty($_GET["user_id_user_role"]) && !empty($_GET['action'])){ ?>
<div>
	

	<form action="#" method="POST" enctype="multipart/form-data">
<?php $sql1="SELECT * FROM user_has_role
					WHERE user_id_user_role='$capt' and  role_cod_role = '$op'";
$query=$db->query($sql1);


 while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
?> 
		<input type="text" name="id2" value="<?php echo $row["user_id_user_role"];?>" style="display:none">
		<input type="text" name="rol2" value="<?php echo $row["role_cod_role"];?>" style="display:none">
		<table class="redTable"><thead><tr><th colspan="3">Edit Rol</th></tr></thead>
				<tr>
				<td><select id="form" name="user_id_user_role">
				<?php
					$db=database::conectar();
					foreach($db->query('select * from user;')as $row2){ ?>
						<option value="<?php echo $row2['id_user'];?>" ><?php echo $row2['id_user']?></option>
					<?php } ?>
				</select></td>
				<td><select id="form" name="user_document_type_cod_document_user_has_role">
				<?php
					$db=database::conectar();
					foreach($db->query('select * from document_type')as $row2){ ?>
						<option value="<?php echo $row2['cod_document'];?>" ><?php echo $row2['desc_document']?></option>
					<?php } ?>
				</select></td>
				<td><select id="form" name="role_cod_role">
				<?php
					$db=database::conectar();
					foreach($db->query('select * from role')as $row2){ ?>
						<option value="<?php echo $row2['cod_role'];?>" ><?php echo $row2['desc_role']?></option>
					<?php } ?>
				</select></td>
				</tr>
				<tfoot>
					<tr>
						<td colspan="5">
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


$sql1="SELECT * FROM user_has_role";
$query = $db->query($sql1);



if($query->rowCount()>0): ?>
<h1>ROL</h1><br>
<table class="redTable">
	<thead><tr>
		<th>Doc Id</th>
		<th>Document Type</th>
		<th>Rol</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr></thead>



<?php while ($row=$query->fetch(PDO::FETCH_ASSOC)):?>

<div class="ex2">
<tr>
<td ><?php echo $row['user_id_user_role'];?></td>
<td ><?php echo $row['user_document_type_cod_document_user_has_role'] ;?>	</td>
<td ><?php echo $row['role_cod_role'] ;?>	</td>

  <td ><a id="buton2d" href="?action=editar&user_id_user_role=<?php echo $row["user_id_user_role"];?>&role_cod_role=<?php echo $row["role_cod_role"] ?>">Update</a></td>
   <td ><a id="buton2d" href="?action=eliminar&user_id_user_role=<?php echo $row["user_id_user_role"];?>" onclick="return confirm('¿Esta seguro de eliminar este Usuario?')">Delete</a></td>
</tr>
</div>
<?php endwhile;?>
<tfoot>
	<tr>
		<td colspan="5">
			<div class="links">
				<a href="../index_admin.php" id="buton1b">Go Back</a>
				<a href="?action=ver&m=1" id="buton1b">CREATE A DOCUMENT TYPE</a><br>
			</div>
		</td>
	</tr>
</tfoot>
</table>
<?php else: ?>
	<h4>Mr. User DO NOT find registration</h4>
	<br><a href="../index_admin.php" id="buton1b">Go Back</a>
	<a href="?action=ver&m=1" id="buton1b">CREATE A DOCUMENT TYPE</a><br>
<?php endif; ?>	 
</div>		
</body>
</html>