<html>
<head>
	<link rel='stylesheet' type='text/css' href='CSS3/table.css' />
	<link rel='stylesheet' type='text/css' href='CSS3/boton.css' />
	<style>

	</style>
	<title></title>
</head>
<body>
	<tituloniaf>List of configuration/administrator</tituloniaf>
	<hr>
	<fieldset>
	<table>
		<tr>
			<th>HOST</th>
			<th>PORT</th>
			<th>FROM</th>
			<th>FROM NAME</th>
			<th>TO ADMIN 1</th>
			<th>TO ADMIN 2</th>
			<th>USER</th>
			<th>SUBJECT</th>
			<th>ACTION</th>
		</tr>
		<?php 
			include_once("_SF_class.conexion.php");

			$conexion = new BaseDatos();
			$conexion->conexion();

			$query = "SELECT * FROM emailconfigadmin";
			$datos = mysql_query ($query);
			$filas = mysql_num_rows($datos);
			$task = 'Edit';
			for($i=0;$i<$filas;$i++){
				echo "<tr>";
				$id = mysql_result($datos,$i,"id");
					echo "<td>".mysql_result($datos,$i,"host_NF")."</td>";
					echo "<td>".mysql_result($datos,$i,"port_NF")."</td>";
					echo "<td>".mysql_result($datos,$i,"from_NF")."</td>";
					echo "<td>".mysql_result($datos,$i,"from_name_NF")."</td>";
					echo "<td>".mysql_result($datos,$i,"to1_NF")."</td>";
					echo "<td>".mysql_result($datos,$i,"to2_NF")."</td>";
					echo "<td>".mysql_result($datos,$i,"user_NF")."</td>";
					echo "<td>".mysql_result($datos,$i,"subject_NF")."</td>";
					echo "<td>"."<a href='_form_email_admin.php?id=$id&task=$task'><img width='26px' height='26px' src='CSS3/edit.png'/></a>"."</td>";
				echo "</tr>";
			}
		?>
	</table>
	</fieldset>
</body>
</html>