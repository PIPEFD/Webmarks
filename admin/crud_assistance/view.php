<?php
require_once'model.php';
require_once'../conexion(2).php';
$db=database::conectar();
if(isset($_REQUEST['action'])){
	switch($_REQUEST['action']){
		case'registrar':
		$insert=new crud();
		$insert->insertar($_POST["cod_assistance"],$_POST["student_user_id_user"],$_POST["student_user_document_type_cod_document"],$_POST["matter_has_grade_matter_name_matter"],$_POST["matter_has_grade_grade_desc_grade"],$_POST['register']);
		break;
		case 'actualizar':
		$update=new crud();
		$update->actualizar($_POST["id2"],$_POST["cod_assistance"],$_POST["student_user_id_user"],$_POST["student_user_document_type_cod_document"],$_POST["matter_has_grade_matter_name_matter"],$_POST["matter_has_grade_grade_desc_grade"],$_POST['register']);
		break;
		case 'eliminar':
			$delete=new crud();

			$delete->eliminar($_GET['cod_assistance']);
		break;
		case 'editar':
			
			$id = $_GET['cod_assistance'];
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
	<?php if(!empty($_GET['cod_assistance']) && !empty($_GET['action']) ){ ?>
		<div>
			<form action="#" method="POST" >
				<?php $sql1="SELECT * FROM assistance
									WHERE cod_assistance='$id'";
				$query=$db->query($sql1);
				while ($row=$query->fetch(PDO::FETCH_ASSOC)){?> 
					<input type="text" name="id2" value="<?php echo $row["cod_assistance"];?>" style="display:none">
					
					<table class="redTable">
						<H1>EDITAR ASISTENCIA</H1>
						<tr>
							<td>CODIGO ASISTENCIA</td>
							<td>
								<input type="text" name="cod_assistance" value="<?php echo $row['cod_assistance']?>">
							</td>
							<td>NUMERO DE DOCUMENTO</td>
							<td>
								<select id="form" name="student_user_id_user">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from student')as $row2){ ?>
									<option value="<?php echo $row2['user_id_user_student'];?>" <?php echo ($row2['user_id_user_student'] === $row['student_user_id_user']) ? 'selected' : ''?>><?php echo $row2['user_id_user_student']?></option>
								<?php } ?>
								</select>
							</td>
							
							
						</tr>
						<tr>
							<td>TIPO DE DOCUMENTO </td>
							<td>
								<select id="form" name="student_user_document_type_cod_document">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from student')as $row2){ ?>
									<option value="<?php echo $row2['user_document_type_cod_document_student'];?>" <?php echo ($row2['user_document_type_cod_document_student'] === $row['student_user_document_type_cod_document']) ? 'selected' : ''?>><?php echo $row2['user_document_type_cod_document_student']?></option>
								<?php } ?>
								</select>
							</td>

							<td>MATERIA</td>
							<td>
								<select id="form" name="matter_has_grade_matter_name_matter">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from matter_has_grade')as $row2){ ?>
									<option value="<?php echo $row2['matter_name_matter'];?>" <?php echo ($row2['matter_name_matter'] === $row['matter_has_grade_matter_name_matter']) ? 'selected' : ''?>><?php echo $row2['matter_name_matter']?></option>
								<?php } ?>
								</select>
							</td>
						<tr>
							<td>GRADO</td>
							<td>
								<select id="form" name="matter_has_grade_grade_desc_grade">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from matter_has_grade')as $row2){ ?>
									<option value="<?php echo $row2['grade_desc_grade'];?>" <?php echo ($row2['grade_desc_grade'] === $row['matter_has_grade_grade_desc_grade']) ? 'selected' : ''?>><?php echo $row2['grade_desc_grade']?></option>
								<?php } ?>
								</select>
							</td>
							<td>
								<div>
									<center>
										Asistio<input type="radio" name="register" value="1" <?php echo $row['register'] === '1' ? 'checked' : ''?>>
										No asistio<input type="radio" name="register" value="0" <?php echo $row['register'] === '0' ? 'checked' : ''?>>
									</center>
								</div>
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
						<H1>NUEVA ASISTENCIA</H1>
						<tr>
							<td>CODIGO ASISTENCIA</td>
							<td>
								<input type="text" name="cod_assistance" >
							</td>
							<td>NUMERO DE DOCUMENTO</td>
							<td>
								<select id="form" name="student_user_id_user">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from student')as $row2){ ?>
									<option value="<?php echo $row2['user_id_user_student'];?>"><?php echo $row2['user_id_user_student']?></option>
								<?php } ?>
								</select>
							</td>
							
							
						</tr>
						<tr>
							<td>TIPO DE DOCUMENTO </td>
							<td>
								<select id="form" name="student_user_document_type_cod_document">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from student')as $row2){ ?>
									<option value="<?php echo $row2['user_document_type_cod_document_student'];?>" ><?php echo $row2['user_document_type_cod_document_student']?></option>
								<?php } ?>
								</select>
							</td>

							<td>MATERIA</td>
							<td>
								<select id="form" name="matter_has_grade_matter_name_matter">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from matter_has_grade')as $row2){ ?>
									<option value="<?php echo $row2['matter_name_matter'];?>" ><?php echo $row2['matter_name_matter']?></option>
								<?php } ?>
								</select>
							</td>
						<tr>
							<td>GRADO</td>
							<td>
								<select id="form" name="matter_has_grade_grade_desc_grade">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from matter_has_grade')as $row2){ ?>
									<option value="<?php echo $row2['grade_desc_grade'];?>" ><?php echo $row2['grade_desc_grade']?></option>
								<?php } ?>
								</select>
							</td>
							<td>
								<div>
									<center>
										Asistio<input type="radio" name="register" value="1"   >
										No asistio<input type="radio" name="register" value="0"  >
									</center>
								</div>
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
			<CENTER><h1>EXISTING ASSISTANCE</h1></CENTER>

			
			<div id="uno">
				<table class="redTable">
				<thead><tr>
					<th>Cod assistance</th>	
					<th>Date assistance</th>								
					<th>Student doc id</th>
					<th>Student doc type</th>
					<th>Matter</th>
					<th>Grade</th>
					<th>Register</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr></thead>
				<?php
			$sql1="select * from assistance;";
			$query=$db->query($sql1);
			while($row2=$query->fetch(PDO::FETCH_ASSOC)){
				?>
				<form method="POST">
				<tr>
					<td><?php echo $row2["cod_assistance"];?></td>
					<td><?php echo $row2["date_assistance"];?></td>
					<td><?php echo $row2["student_user_id_user"];?></td>
					<td><?php echo $row2["student_user_document_type_cod_document"];?></td>
					<td><?php echo $row2["matter_has_grade_matter_name_matter"];?></td>
					<td><?php echo $row2["matter_has_grade_grade_desc_grade"];?></td>
					<td><?php
					if ($row2["register"]== 1){
						echo "Asistio";
					 }else{ 
						echo"No asistio";
					} ?>
					</td>
					<td><a href="?action=editar&cod_assistance=<?php echo $row2['cod_assistance']; ?>">Update</a></td>
					<td><a href="?action=eliminar&cod_assistance=<?php echo $row2['cod_assistance'];?>">Delete</a></td>
				</tr>
			
		<?php } ?>
		<tfoot>
				<tr>
					<td colspan="14">
						<div class="links">
							<a href="../index_admin.php" id="buton1b">Go Back</a>
							<a href="?action=ver&m=1" id="buton1b">NEW ASSISTANCE</a>
						</div>
					</td>
				</tr>
			</tfoot>
			</form>
		</table>
			
		</div>
</body>
</html>