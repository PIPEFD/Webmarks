<?php
require_once'model.php';
require_once'../conexion(2).php';
$db=database::conectar();
if(isset($_REQUEST['action'])){
	switch($_REQUEST['action']){
		case'registrar':
		$insert=new crud();
		$insert->insertar($_POST["matter_name_matter"],$_POST["grade_desc_grade"]);
		break;
		case 'actualizar':
		$update=new crud();
		$update->actualizar($_POST["id2"],$_POST["grade2"],$_POST["matter_name_matter"],$_POST["grade_desc_grade"],$_POST["attendant_user_id_user"]);
		break;
		case 'eliminar':
			$delete=new crud();

			$delete->eliminar($_GET['matter_name_matter'],$_GET['grade_desc_grade']);
		break;
		case 'editar':
			
			$id = $_GET['matter_name_matter'];
			$grade = $_GET['grade_desc_grade'];
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
	<?php if( !empty($_GET['matter_name_matter']) && !empty($_GET['action']) ){ ?>
		<div>
			<form action="#" method="POST" >
				<?php $sql1="SELECT * FROM matter_has_grade
									WHERE matter_name_matter='$id' and grade_desc_grade='$grade'";
				$query=$db->query($sql1);
				while ($row=$query->fetch(PDO::FETCH_ASSOC)){?> 
					<input type="text" name="id2" value="<?php echo $row["matter_name_matter"];?>" style="display:none">
					<input type="text" name="grade2" value="<?php echo $row["grade_desc_grade"];?>" style="display:none">
					
					<table class="redTable">
						<H1>EDITAR GRADE</H1>
						<tr>
							<td>MATERIA</td>
							<td>
								<select id="form" name="matter_name_matter">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from matter')as $row2){ ?>
									<option value="<?php echo $row2['name_matter'];?>" <?php echo ($row2['name_matter'] === $row['matter_name_matter']) ? 'selected' : ''?>><?php echo $row2['name_matter']?></option>
								<?php } ?>
								</select>
							</td>
							<td>GRADO</td>
							<td>
								<select id="form" name="grade_desc_grade">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from grade')as $row2){ ?>
									<option value="<?php echo $row2['desc_grade'];?>" <?php echo ($row2['desc_grade'] === $row['grade_desc_grade']) ? 'selected' : ''?>><?php echo $row2['desc_grade']?></option>
								<?php } ?>
								</select>
							</td>
							
							
						</tr>
						
						
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
		 <?php } ?>

		
	<?php } ?>
	<?php if (!empty($_GET['m']) and !empty($_GET['action']) ) { ?>
		<div id="uno">
			<form method="POST" enctype="multipart/form-data">
				<table class="redTable">
						<H1>NUEVA MATERIA</H1>
						<tr>
							<td>MATERIA</td>
							<td>
								<select id="form" name="matter_name_matter">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from matter')as $row2){ ?>
									<option value="<?php echo $row2['name_matter'];?>" ><?php echo $row2['name_matter']?></option>
								<?php } ?>
								</select>
							</td>
							<td>GRADO</td>
							<td>
								<select id="form" name="grade_desc_grade">
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
			<CENTER><h1>MATTER GRADE</h1></CENTER>

			
			<div id="uno">
				<table class="redTable">
				<thead><tr>
					<th>Matter Name</th>	
					<th>Desc Grade</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr></thead>
				<?php
			$sql1="select * from matter_has_grade;";
			$query=$db->query($sql1);
			while($row2=$query->fetch(PDO::FETCH_ASSOC)){
				?>
				<form method="POST">
				<tr>
					<td><?php echo $row2["matter_name_matter"];?></td>
					<td><?php echo $row2["grade_desc_grade"];?></td>
					<td><a href="?action=editar&matter_name_matter=<?php echo $row2['matter_name_matter']; ?>&grade_desc_grade=<?php echo $row2['grade_desc_grade'] ?>">Update</a></td>
					<td><a href="?action=eliminar&user_id_user_student=<?php echo $row2['user_id_user_student'];?>&grade_desc_grade=<?php echo $row2['grade_desc_grade'] ?>">Delete</a></td>
				</tr>
			
		<?php } ?>
		<tfoot>
				<tr>
					<td colspan="4">
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
