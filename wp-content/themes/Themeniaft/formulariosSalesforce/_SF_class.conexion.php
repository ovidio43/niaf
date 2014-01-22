<?php 
			class BaseDatos
			{
				public $server = 'localhost';
				public $user   = 'niafnet_Luminia';
				public $pass   = 'Luminia1989';
				public $bd 	   = 'niafnet_Niafmemb';

				public function conexion()
				{
					$myserver = $this->server;
					$myuser   = $this->user;
					$mypass   = $this->pass;
					$mybd 	  = $this->bd;
					$myconexion = mysql_connect($myserver, $myuser,$mypass);
					mysql_select_db($mybd,$myconexion);
				}
			}
 ?>