<html>
<head>
	<link rel='stylesheet' type='text/css' href='CSS3/table.css' />
	<link rel='stylesheet' type='text/css' href='CSS3/boton.css' />
	<style>

	</style>
	<title></title>
</head>
<body>
	<tituloniaf>List of configuration</tituloniaf>
	<hr>
	<fieldset>
	<table>
		<tr>
			<th>HOST</th>
			<th>PORT</th>
			<th>FROM</th>
			<th>FROM NAME</th>
			<th>USER</th>
			<th>SUBJECT</th>
			<th>TITLE</th>
			<th nowrap>MESSAGE</th>
			<th>ENABLE</th>
			<th>ACTION</th>
		</tr>
		<?php 
			include_once("_SF_class.conexion.php");

			$conexion = new BaseDatos();
			$conexion->conexion();

			$query = "SELECT * FROM emailconfig";
			$datos = mysql_query ($query);
			$filas = mysql_num_rows($datos);
			$task = 'Edit';
			for($i=0;$i<$filas;$i++){
				echo "<tr>";
					$id = mysql_result($datos,$i,"id");
					echo "<td>".$host=mysql_result($datos,$i,"host_NF");echo "</td>";
					echo "<td>".$port=mysql_result($datos,$i,"port_NF")."</td>";
					echo "<td>".$from=mysql_result($datos,$i,"from_NF")."</td>";
					echo "<td>".$from_name=mysql_result($datos,$i,"from_name_NF")."</td>";
					echo "<td>".$user=mysql_result($datos,$i,"user_NF")."</td>";
					echo "<td>".$subject=mysql_result($datos,$i,"subject_NF")."</td>";
					echo "<td>".$title=mysql_result($datos,$i,"title_NF")."</td>";
					echo "<td>".$message=mysql_result($datos,$i,"message_NF")."</td>";
					echo "<td>".$enable=mysql_result($datos,$i,"enable_NF")."</td>";
					echo "<td>"."<a href='_form_email.php?id=$id&task=$task'><img width='26px' height='26px' src='CSS3/edit.png'/></a>"."</td>";
				echo "</tr>";
			}
		?>
	</table>
	</fieldset>
</body>
</html>