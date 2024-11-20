<?php
require_once'model.php';
require_once'../conexion(2).php';
$db=database::conectar();
if(isset($_REQUEST['action'])){
	switch($_REQUEST['action']){
		case'registrar':
		$insert=new crud();
		$insert->insertar($_POST["type_document"],$_POST["id_user"],$_POST["first_name"],$_POST["second_name"],$_POST["first_last_name"],$_POST["second_last_name"],$_POST["pass"],$_POST["address"],$_POST["phone"],$_POST["e_mail"],$_POST["security_question"],$_POST["answer"]);
		break;
		case 'actualizar':
		$update=new crud();
		$update->actualizar($_POST["id2"],$_POST["id_user"],$_POST["first_name"],$_POST["second_name"],$_POST["first_last_name"],$_POST["second_last_name"],$_POST["address"],$_POST["phone"],$_POST["e_mail"],$_POST["document_type_cod_document_user"],$_POST["security_question_num_question"],$_POST["answer"],$_POST["password"]);
		break;
		case 'eliminar':
			$delete=new crud();

			$delete->eliminar($_GET['id_user']);
		break;
		case 'editar':
			
			$id = $_GET['id_user'];
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
	<?php if( !empty($_GET['id_user']) && !empty($_GET['action']) ){ ?>
		<div>
			<form action="#" method="POST" >
				<?php $sql1="SELECT * FROM user
									WHERE id_user='$id'";
				$query=$db->query($sql1);
				while ($row=$query->fetch(PDO::FETCH_ASSOC)){?> 
					<input type="text" name="id2" value="<?php echo $row["id_user"];?>" style="display:none">
					
					<table class="redTable">
						<H1>EDITAR USUARIO</H1>
						<tr>
							<td>TIPO DE DOCUMENTO</td>
							<td>
								<select id="form" name="document_type_cod_document_user">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from document_type')as $row2){ ?>
									<option value="<?php echo $row2['cod_document'];?>" <?php echo ($row2['cod_document'] === $row['document_type_cod_document_user']) ? 'selected' : ''?>><?php echo $row2['desc_document']?></option>
								<?php } ?>
								</select>
							</td>
							<td>NUMERO DE DOCUMENTO</td>
							<td><input type="text" name="id_user" value="<?php echo $row['id_user']?>" ></td>
						</tr>
						<tr>
							<td>PRIMER NOMBRE</td>
							<td><input  type="text" name="first_name"  value="<?php echo $row['first_name']?>" style="text-transform: lowercase;"></td>
							<td>SEGUNDO NOMBRE</td>
							<td><input id="form" type="text" name="second_name"  value="<?php echo $row['second_name']?>" style="text-transform: lowercase;"></td></tr>
						<tr>
							<td>PRIMER APELLIDO</td>
							<td><input id="form" type="text" name="first_last_name"  value="<?php echo $row['first_last_name']?>" style="text-transform: lowercase;"></td>
							<td>SEGUNDO APELLIDO</td>
							<td><input id="form" type="text" name="second_last_name"  value="<?php echo $row['second_last_name']?>" style="text-transform: lowercase;"></td>
						</tr>
						<tr>
							<td>CONTRASEÑA</td>
							<td><input id="form"  type="text" name="password" value="<?php echo $row['password']?>" ></td>
							<td>DIRECCION DE RESIDENCIA</td>
							<td><input type="text" id="form" name="address"  value="<?php echo $row['address']?>" style="text-transform: lowercase;"></td>
						</tr>
						<tr>
							<td>NUMERO DE TELEFONO</td>
							<td><input type="number" id="form" name="phone"  value="<?php echo $row['phone']?>" style="text-transform: lowercase;"></td>
							<td>E-MAIL</td>
							<td><input type="text" id="form" name="e_mail"  value="<?php echo $row['e_mail']?>" style="text-transform: lowercase;"></td>
						</tr>
						<tr>
							<td>PREGUNTA DE SEGURIDAD</td>
							<td><select name="security_question_num_question">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from security_question')as $row1){
									echo '<option value="',$row1['num_question'],'">',$row1['question'],'</option>';
								}
								?>
							</select></td>
							<td>RESPUESTA</td>
							<td><input id="form" type="text" name="answer"  value="<?php echo $row['security_question_num_question']?>" style="text-transform: lowercase;"></td>
						</tr>
						<tr>
							<td colspan="2">ROL</td>
							<td colspan="2"><select name="rol">
								<?php
								$db=database::conectar();
								foreach($db->query('select * from role')as $row1){
									echo '<option value="',$row1['cod_role'],'">',$row1['desc_role'],'</option>';
								}
								?>
							</select></td>
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
				<H1>REGISTRAR USUARIO NUEVO</H1>
				<tr>
					<td>TIPO DE DOCUMENTO</td>
					<td>
						<select id="form" name="type_document">
						<?php
						$db=database::conectar();
						foreach($db->query('select * from document_type')as $row){
							echo '<option value="',$row['cod_document'],'">',$row['desc_document'],'</option>';
						}
						?>
						</select>
					</td>
					<td>NUMERO DE DOCUMENTO</td>
					<td><input id="form" type="text" name="id_user" placeholder="numero de documento" style="text-transform: lowercase"></td>
				</tr>
				<tr>
					<td>PRIMER NOMBRE</td>
					<td><input id="form" type="text" name="first_name" placeholder="primer nombre" style="text-transform: lowercase;"></td>
					<td>SEGUNDO NOMBRE</td>
					<td><input id="form" type="text" name="second_name" placeholder="segundo nombre" style="text-transform: lowercase;"></td></tr>
				<tr>
					<td>PRIMER APELLIDO</td>
					<td><input id="form" type="text" name="first_last_name" placeholder="primer apellido" style="text-transform: lowercase;"></td>
					<td>SEGUNDO APELLIDO</td>
					<td><input id="form" type="text" name="second_last_name" placeholder="segundo apellido" style="text-transform: lowercase;"></td>
				</tr>
				<tr>
					<td>CONTRASEÑA</td>
					<td><input id="form"  type="text" name="pass" placeholder="contraseña" ></td>
					<td>DIRECCION DE RESIDENCIA</td>
					<td><input type="text" id="form" name="address" placeholder="direccion" style="text-transform: lowercase;"></td>
				</tr>
				<tr>
					<td>NUMERO DE TELEFONO</td>
					<td><input type="number" id="form" name="phone" placeholder="telefono" style="text-transform: lowercase;"></td>
					<td>E-MAIL</td>
					<td><input type="text" id="form" name="e_mail" placeholder="e_mail" style="text-transform: lowercase;"></td>
				</tr>
				<tr>
					<td>PREGUNTA DE SEGURIDAD</td>
					<td><select name="security_question">
						<?php
						$db=database::conectar();
						foreach($db->query('select * from security_question')as $row1){
							echo '<option value="',$row1['num_question'],'">',$row1['question'],'</option>';
						}
						?>
					</select></td>
					<td>RESPUESTA</td>
					<td><input id="form" type="text" name="answer" placeholder="respuesta pregunta de seguridad" style="text-transform: lowercase;"></td>
				</tr>
				<tfoot>
					<tr>
						<td colspan="4">
							<div class="links">
								<input id="buton2c" type="submit" value="Send" onclick="this.form.action='?action=registrar';"/>	
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
					<th>Doc type</th>
					<th>Doc Id</th>				
					<th>First Name</th>
					<th>Second Name</th>
					<th>First Last Name</th>
					<th>Second Last Name</th>
					<th>password</th>
					<th>Adress</th>
					<th>Telephone</th>
					<th>e-mail</th>
					<th>Security Question</th>
					<th>Answer</th>	
					
				</tr></thead>
				<?php
			$sql1="select * from user;";
			$query=$db->query($sql1);
			while($row2=$query->fetch(PDO::FETCH_ASSOC)){
				?>
				<form method="POST">
				<tr>
					<td><?php echo $row2["document_type_cod_document_user"];?></td>
					<td><?php echo $row2["id_user"];?></td>
					<td><?php echo $row2["first_name"];?></td>
					<td><?php echo $row2["second_name"];?></td>
					<td><?php echo $row2["first_last_name"];?></td>
					<td><?php echo $row2["second_last_name"];?></td>
					<td><?php echo $row2["password"];?></td>
					<td><?php echo $row2["address"];?></td>
					<td><?php echo $row2["phone"];?></td>
					<td><?php echo $row2["e_mail"];?></td>
					<td><?php echo $row2["security_question_num_question"];?></td>
					<td><?php echo $row2["answer"];?></td>
					
				</tr>
			
		<?php } ?>
		<tfoot>
				<tr>
					<td colspan="14">
						<div class="links">
							<a href="../index_admin.php" id="buton1b">Go Back</a>
						</div>
					</td>
				</tr>
			</tfoot>
			</form>
		</table>
			
		</div>
</body>
</html>