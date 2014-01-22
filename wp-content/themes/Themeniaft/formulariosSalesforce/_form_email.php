				<?php 
					include_once("_SF_class.conexion.php");
					$conexion = new BaseDatos();
					$conexion->conexion();
					if($_REQUEST['task'] =='Edit')
					{
						$id = $_GET['id'];
						$button = $_REQUEST['task'];
						$query = "SELECT * FROM emailconfig WHERE id='$id'";
						$datos = mysql_query($query);
						$host = mysql_result($datos,0,"host_NF");
						$port = mysql_result($datos,0,"port_NF");
						$from = mysql_result($datos,0,"from_NF");
						$from_name = mysql_result($datos,0,"from_name_NF");
						$user = mysql_result($datos,0,"user_NF");
						$pass = mysql_result($datos,0,"pass_NF");
						$subject = mysql_result($datos,0,"subject_NF");
						$title = mysql_result($datos,0,"title_NF");
						$message = mysql_result($datos,0,"message_NF");
						$enable = mysql_result($datos,0,"enable_NF");
					}
					if($_REQUEST['update']) {
						$id=$_POST['id'];
						$host = $_POST['host'];
						$port=$_POST['port'];
						$from = $_POST['from'];
						$from_name=$_POST['from_name'];
						$user = $_POST['user'];
						$pass = $_POST['pass'];
						$subject = $_POST['subject'];
						$title = addslashes($_POST['title']);
						$message=addslashes($_POST['message']);


						//VERIFICANDO SI ES EL MISMO PASS
						$query = "SELECT pass_NF FROM emailconfig WHERE id='$id'";
						$datos = mysql_query($query);
						$passcompare = mysql_result($datos,0,"pass_NF");
						if($pass!=$passcompare)
						{
							$pass = base64_encode($pass);
						}


						$queryUPDATE = "UPDATE emailconfig 
										SET host_NF='$host', 
											port_NF='$port',
											from_NF='$from',
											from_name_NF='$from_name',
											user_NF='$user',
											pass_NF='$pass',
											subject_NF='$subject',
											title_NF='$title',
											message_NF='$message'
										WHERE id='$id'";
						mysql_query($queryUPDATE);
						echo "<a href='_list_config_email.php'>GO BACK</a>";
						exit();
					}
				 ?>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='CSS3/form.css' />
	<link rel='stylesheet' type='text/css' href='CSS3/boton.css' />
	<style>

	</style>
	<title></title>
</head>
<body>
	<tituloniaf>Email config</tituloniaf>
	<hr>
<fieldset>
<table>
			<form name="validar_form" method="post" action="_form_email.php">
				<input class="text" type="hidden" value="<?php echo $_GET['id'] ?>" name="id">
				<tr>
					<th>HOST: </th>
					<td><input class="text" type="text" value ="<?php echo $host; ?>" name="host"></td>
				</tr>
				<tr>
					<th>PORT: </th>
					<td><input class="text" type="text" value ="<?php echo $port; ?>" name="port"></td>
				</tr>
				<tr>
					<th>FROM: </th>
					<td><input class="text" type="text" value ="<?php echo $from; ?>" name="from"></td>
				</tr>
				<tr>
					<th>FROM NAME: </th>
					<td><input class="text" type="text" value ="<?php echo $from_name; ?>" name="from_name"></td>
				</tr>
				<tr>
					<th>USER: </th>
					<td><input class="text" type="text" value ="<?php echo $user; ?>" name="user"></td>
				</tr>
				<tr>
					<th>PASS: </th>
					<td><input class="text" type="password" value ="<?php echo $pass; ?>" name="pass"></td>
				</tr>
				<tr>
					<th>SUBJECT: </th>
					<td><input class="text" type="text" value ="<?php echo $subject; ?>" name="subject"></td>
				</tr>
				<tr>
					<th>TITLE: </th>
				</tr>
				<tr>
					<th></th>
					<td><textarea name="title" cols="40" rows="20"><?php echo $title; ?></textarea></td>
				</tr>
				<tr>
					<th>MESSAGE: </th>
				</tr>
				<tr>
					<th></th>
					<td><textarea name="message" cols="40" rows="20"><?php echo $message; ?></textarea></td>
				</tr>
				<tr>
					<th></th>
				<td>
					<input type="hidden" value="update" name="update">
					<input class="button large blue" type="submit" value="<?php echo $button?>">
				</td>
				</tr>	
				<tr>
					<th></th>
				</tr>	
			</form>
	</table>
	</fieldset>
</body>
</html>