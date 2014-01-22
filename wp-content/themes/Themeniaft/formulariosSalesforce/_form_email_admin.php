				<?php 
					include_once("_SF_class.conexion.php");
					$conexion = new BaseDatos();
					$conexion->conexion();
					if($_REQUEST['task'] =='Edit')
					{
						$id = $_GET['id'];
						$button = $_REQUEST['task'];
						$query = "SELECT * FROM emailconfigadmin WHERE id='$id'";
						$datos = mysql_query($query);
						$host = mysql_result($datos,0,"host_NF");
						$port = mysql_result($datos,0,"port_NF");
						$from = mysql_result($datos,0,"from_NF");
						$from_name = mysql_result($datos,0,"from_name_NF");
						$to1 = mysql_result($datos,0,"to1_NF");
						$to2 = mysql_result($datos,0,"to2_NF");
						$user = mysql_result($datos,0,"user_NF");
						$pass = mysql_result($datos,0,"pass_NF");
						$subject = mysql_result($datos,0,"subject_NF");
						$enable = mysql_result($datos,0,"enable_NF");
					}
					if($_REQUEST['update2']) {
						$id=$_POST['id'];
						$host = $_POST['host'];$port=$_POST['port'];
						$from = $_POST['from'];$from_name=$_POST['from_name'];
						$to1 = $_POST['to1'];
						$to2 = $_POST['to2'];
						$user = $_POST['user'];
						$pass = $_POST['pass'];
						$subject = $_POST['subject'];

						//VERIFICANDO SI ES EL MISMO PASS
						$query = "SELECT pass_NF FROM emailconfigadmin WHERE id='$id'";
						$datos = mysql_query($query);
						$passcompare = mysql_result($datos,0,"pass_NF");
						if($pass!=$passcompare)
						{
							$pass = base64_encode($pass);
						}


						$queryUPDATE = "UPDATE emailconfigadmin 
										SET host_NF='$host', 
											port_NF='$port',
											from_NF='$from',
											from_name_NF='$from_name',
											to1_NF='$to1',
											to2_NF='$to2',
											user_NF='$user',
											pass_NF='$pass',
											subject_NF='$subject'
										WHERE id='$id'";
						mysql_query($queryUPDATE);

						echo "<a href='_list_config_email_admin.php'>GO BACK</a>";
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
	<tituloniaf>Email config/Administrator</tituloniaf>
	<hr>
<fieldset>
<table>
			<form name="validar_form" method="post" action="_form_email_admin.php">
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
					<th>TO ADMIN1: </th>
					<td><input class="text" type="text" value ="<?php echo $to1; ?>" name="to1"></td>
				</tr>
				<tr>
					<th>TO ADMIN2: </th>
					<td><input class="text" type="text" value ="<?php echo $to2; ?>" name="to2"></td>
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
					<th></th>
				<td>
					<input type="hidden" value="update2" name="update2">
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