<?php

 require_once'mode_tea.php';
 require_once'../conexion(2).php';


$db=database::conectar();
if(isset($_REQUEST["action"]))
{	switch ($_REQUEST["action"])
	{
 		
		case 'actualizar':
		$update=new mach_acces();
		$update->update_mach_acces($_POST["tipo"] ,$_POST["id_teaa"],$_POST ["desc_document"] );
			
 
		break;
		
		case 'registrar':

		$insert=new mach_acces ();
		$insert->insert_mach_acces ($_POST["id_tea"] ,$_POST["tipo_tea"] );

		
		 break;

		case 'eliminar';
		$delete=new mach_acces();
		$delete->delete_mach_acces($_GET["id3"],$_GET["id4"]  );

		break;


		case 'editar':
		$capt=$_GET["id"];
		 break; 
		 }
 	}   
	
?>
<!DOCTYPE html>
<html lang=eng>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<title>Teacher</title>
	<link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
	<?php if(!empty($_GET['m']) and !empty($_GET['action']) ){ ?>
<div>
	<form action='#' method="POST" enctype="multipart/form-data">		

	<table class="redTable"><thead><tr><th colspan="2">NEW TEACHER</th></tr></thead>
	<tr><th>Teacher Doc Id</th>
	<td><select name="id_tea" id="form">
		<?php
		foreach ($db->query("SELECT * FROM  user  ") as $raw){
		 echo '<option value="'.$raw["id_user"].'">'.$raw['id_user'].'</option>';
		}
		?>
	</select></td></tr>		
		
	<tr><th>Teacher Doc Type</th>
	
	<td><select name="tipo_tea" id="form">
		<?php
		foreach ($db->query("SELECT * FROM document_type") as $row){
		 echo '<option value="'.$row["cod_document"].'">'.$row['desc_document'].'</option>';
		}
		?>
	</select></td></tr>
	<tfoot>
			<tr>
				<td colspan="2">
					<div class="links">
						<input id="buton2c" type="submit" value="save" onclick="this.form.action='?action=registrar';"/>	
					</div>
				</td>
			</tr>
		</tfoot>
	</table>
	</form> 
</div>
<?php } ?>

<?php if(!empty($_GET["id"]) && !empty($_GET['action'])){ ?>
<div>
	

	<form action="#" method="POST" enctype="multipart/form-data">
<?php /*$sql1="SELECT desc_document,user_document_type_cod_document_teacher,id_user FROM document_type INNER JOIN user ON cod_document=document_type_cod_document_user INNER JOIN teacher ON document_type_cod_document_user=user_document_type_cod_document_teacher
					WHERE user_document_type_cod_document_teacher ='$capt'";
$query=$db->query($sql1);


 while ($row=$query->fetch(PDO::FETCH_ASSOC))
{*/
?> 
	<input type="text" name="tipo" value="<?php	echo $row['cod_document'];?>" style="display:none">
	
	<table class="redTable"><thead><tr><th colspan="2">EDIT TEACHER</th></tr></thead>
	<tr><th>Teacher Doc Id</th>
	<td><select id="form" name="user_id_user_teacher">
		<?php
		foreach ($db->query("SELECT *  FROM  user;") as $raw){
		 echo '<option value="'.$raw["id_user"].'">'.$raw['id_user'].'</option>';
		}
		?>
	</select></td></tr>	
		
	<tr><th>Teacher Doc Type</th>
	
	<td><select id="form" name="user_document_type_cod_document_teacher">
		<?php
		foreach ($db->query("SELECT * FROM document_type") as $row){
		 echo '<option value="'.$row["cod_document"].'">'.$row['desc_document'].'</option>';
		}
		?>
	</select></td></tr>
	<tfoot>
			<tr>
				<td colspan="2">
					<div class="links">
						<input id="buton2c" type="submit" value="update" onclick="this.form.action='?action=actualizar';"/>
					</div>
				</td>
			</tr>
		</tfoot>
	</table>	

	
		
</form>
</div>	
 <?php
	/*}*/
 }	


$sql1="SELECT desc_document,user_document_type_cod_document_teacher,id_user,user_id_user_teacher FROM document_type INNER JOIN user ON cod_document=document_type_cod_document_user INNER JOIN teacher ON document_type_cod_document_user=user_document_type_cod_document_teacher
					";
$query = $db->query($sql1);


if($query->rowCount()>0):?>
<h1>TEACHERS</h1><br>
<table class="redTable">
	<thead><tr>
		<th>Doc type</th>
		<th>Teacher Doc Id</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr></thead>
	<?php while ($row=$query->fetch(PDO::FETCH_ASSOC)):?>
	<div class="ex2">
	<tr>
	<td style="width: 20%"><?php echo $row['desc_document']."<br>"; ?></td>	
	<td style="width: 40%"><?php echo $row['id_user'] ."<br>";?></td>
	 <td><a id="buton2d" href="?action=editar&id=<?php echo $row["user_document_type_cod_document_teacher"];?>">Update</a></td>

	 <td ><a id="buton2d" href="?action=eliminar&id3=<?php echo $row["user_id_user_teacher"];?>&id4=<?php echo $row["user_document_type_cod_document_teacher"];?>" onclick="return confirm('¿Esta seguro de eliminar este Usuario?')">Delete</a></td>
	</tr>
	</div>
	<?php endwhile;?>
	<tfoot>
			<tr>
				<td colspan="4">
					<div class="links">
						<a href="../index_admin.php" id="buton1b">Go Back</a>
						<a href="?action=ver&m=1" id="buton1b">NEW TEACHER ASSIGNATION</a><br>
					</div>
				</td>
			</tr>
		</tfoot>
</table>
<?php else: ?>
	<h4>Mr. User DO NOT find registration</h4>
	<br><a href="../index_admin.php" id="buton1b">Go Back</a>
	<a href="?action=ver&m=1" id="buton1b">NEW TEACHER ASSIGNATION</a><br>
<?php endif; ?>		
</body>
</html>