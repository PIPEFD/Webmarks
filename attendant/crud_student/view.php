<?php
require_once'model.php';
require_once'../conexion(2).php';
$db=database::conectar();
if(isset($_REQUEST['action'])){
	switch($_REQUEST['action']){
		case'registrar':
		$insert=new crud();
		$insert->insertar($_POST["user_id_user_student"],$_POST["user_document_type_cod_document_student"],$_POST["attendant_user_id_user"],$_POST["attendant_user_document_type_cod_document"],$_POST["grade_desc_grade_student"]);
		break;
		case 'actualizar':
		$update=new crud();
		$update->actualizar($_POST["id2"],$_POST["user_id_user_student"],$_POST["user_document_type_cod_document_student"],$_POST["attendant_user_id_user"],$_POST["attendant_user_document_type_cod_document"],$_POST["grade_desc_grade_student"]);
		break;
		case 'eliminar':
			$delete=new crud();

			$delete->eliminar($_GET['user_id_user_student']);
		break;
		case 'editar':
			
			$id = $_GET['user_id_user_student'];
			break;	
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>user</title>
	<link rel="stylesheet" type="text/css" href="../main.css">	
	<table id="customers1">
</head>
<body>
	<?php if( !empty($_GET['user_id_user_student']) && !empty($_GET['action']) ){ ?>
		<div>
			<form action="#" method="POST" >
				<?php $sql1="SELECT * FROM student
									WHERE user_id_user_student='$id'";
				$query=$db->query($sql1);
				while ($row=$query->fetch(PDO::FETCH_ASSOC)){?> 
					<input type="text" name="id2" value="<?php echo $row["user_id_user_student"];?>" style="display:none">
					
					<table class="redTable">
						<H1>EDITAR ESTUDIANTE</H1>
						<tr>
							<td>NUMERO DE DOCUMENTO</td>
							<td>
								<select id="form" name="user_id_user_student">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from user')as $row2){ ?>
									<option value="<?php echo $row2['id_user'];?>" <?php echo ($row2['id_user'] === $row['user_id_user_student']) ? 'selected' : ''?>><?php echo $row2['id_user']?></option>
								<?php } ?>
								</select>
							</td>
							<td>TIPO DE DOCUMENTO</td>
							<td>
								<select id="form" name="user_document_type_cod_document_student">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from document_type')as $row2){ ?>
									<option value="<?php echo $row2['cod_document'];?>" <?php echo ($row2['cod_document'] === $row['user_document_type_cod_document_student']) ? 'selected' : ''?>><?php echo $row2['desc_document']?></option>
								<?php } ?>
								</select>
							</td>
							
							
						</tr>
						<tr>
							<td>NUMERO DE DOCUMENTO ACUDIENTE</td>
							<td>
								<select id="form" name="attendant_user_id_user">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from attendant')as $row2){ ?>
									<option value="<?php echo $row2['user_id_user_attendant'];?>" <?php echo ($row2['user_id_user_attendant'] === $row['attendant_user_id_user']) ? 'selected' : ''?>><?php echo $row2['user_id_user_attendant']?></option>
								<?php } ?>
								</select>
							</td>

							<td>TIPO DE DOCUMENTO ACUDIENTE</td>
							<td>
								<select id="form" name="attendant_user_document_type_cod_document">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from attendant')as $row2){ ?>
									<option value="<?php echo $row2['user_document_type_cod_document'];?>" <?php echo ($row2['user_document_type_cod_document'] === $row['attendant_user_document_type_cod_document']) ? 'selected' : ''?>><?php echo $row2['user_document_type_cod_document']?></option>
								<?php } ?>
								</select>
							</td>
						<tr>
							<td>TIPO DE DOCUMENTO ACUDIENTE</td>
							<td colspan="2">
								<select id="form" name="grade_desc_grade_student">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from grade')as $row2){ ?>
									<option value="<?php echo $row2['desc_grade'];?>" <?php echo ($row2['desc_grade'] === $row['grade_desc_grade_student']) ? 'selected' : ''?>><?php echo $row2['desc_grade']?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						
						<tfoot>
							<tr>
								<td colspan="4">
									<div class="links">
										<input type="submit" value= "Send" onclick= "this.form.action = '?action=actualizar';"/>
									</div>
								</td>
							</tr>
						</tfoot>
						</table>
				</form>
		</div>	
		 <?php } ?>

		
	<?php } ?>
	<?php if (!empty($_GET['m']) and !empty($_GET['action']) ) { ?>
		<div id="uno">
			<form method="POST" enctype="multipart/form-data">
				<table class="redTable">
						<H1>NUEVO ESTUDIANTE</H1>
						<tr>
							<td>NUMERO DE DOCUMENTO</td>
							<td>
								<select id="form" name="user_id_user_student">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from user')as $row2){ ?>
									<option value="<?php echo $row2['id_user'];?>" ><?php echo $row2['id_user']?></option>
								<?php } ?>
								</select>
							</td>
							<td>TIPO DE DOCUMENTO</td>
							<td>
								<select id="form" name="user_document_type_cod_document_student">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from document_type')as $row2){ ?>
									<option value="<?php echo $row2['cod_document'];?>" ><?php echo $row2['desc_document']?></option>
								<?php } ?>
								</select>
							</td>
							
							
						</tr>
						<tr>
							<td>NUMERO DE DOCUMENTO ACUDIENTE</td>
							<td>
								<select id="form" name="attendant_user_id_user">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from attendant')as $row2){ ?>
									<option value="<?php echo $row2['user_id_user_attendant'];?>"><?php echo $row2['user_id_user_attendant']?></option>
								<?php } ?>
								</select>
							</td>

							<td>TIPO DE DOCUMENTO ACUDIENTE</td>
							<td>
								<select id="form" name="attendant_user_document_type_cod_document">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from attendant')as $row2){ ?>
									<option value="<?php echo $row2['user_document_type_cod_document'];?>" ><?php echo $row2['user_document_type_cod_document']?></option>
								<?php } ?>
								</select>
							</td>
						<tr>
							<td>TIPO DE DOCUMENTO ACUDIENTE</td>
							<td colspan="2">
								<select id="form" name="grade_desc_grade_student">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from grade')as $row2){ ?>
									<option value="<?php echo $row2['desc_grade'];?>" ><?php echo $row2['desc_grade']?></option>
								<?php } ?>
								</select>
							</td>
						</tr>
						
						<tfoot>
							<tr>
								<td colspan="4">
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
		<div >
			<CENTER><h1>EXISTING USERS</h1></CENTER>

			
			<div id="uno">
				<table class="redTable">
				<thead><tr>
					<th>Doc Id</th>	
					<th>Doc type</th>								
					<th>Attendant doc id</th>
					<th>Attendant doc type</th>
					<th>Grade</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr></thead>
				<?php
			$sql1="select * from student;";
			$query=$db->query($sql1);
			while($row2=$query->fetch(PDO::FETCH_ASSOC)){
				?>
				<form method="POST">
				<tr>
					<td><?php echo $row2["user_id_user_student"];?></td>
					<td><?php echo $row2["user_document_type_cod_document_student"];?></td>
					<td><?php echo $row2["attendant_user_id_user"];?></td>
					<td><?php echo $row2["attendant_user_document_type_cod_document"];?></td>
					<td><?php echo $row2["grade_desc_grade_student"];?></td>
					<td><a href="?action=editar&user_id_user_student=<?php echo $row2['user_id_user_student']; ?>">Update</a></td>
					<td><a href="?action=eliminar&user_id_user_student=<?php echo $row2['user_id_user_student'];?>">Delete</a></td>
				</tr>
			
		<?php } ?>
		<tfoot>
				<tr>
					<td colspan="14">
						<div class="links">
							<a href="../index_admin.php" id="buton1b">Go Back</a>
							<a href="?action=ver&m=1" id="buton1b">NEW USER ASSIGNATION</a>
						</div>
					</td>
				</tr>
			</tfoot>
			</form>
		</table>
			
		</div>
</body>
</html>