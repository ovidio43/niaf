<?php 
	class controlSF
	{
		public function verifyEmail($myemail)
		{
			require_once '_SF_config.php';
			try {
				require_once ('soapclient/SforcePartnerClient.php');

				$mySforceConnection = new SforcePartnerClient();
				$mySforceConnection->createConnection("soapclient/partner.wsdl.xml");
				$mySforceConnection->login(USERNAME, PASSWORD.SECURITY_TOKEN);
				$queryEmail = "SELECT Id FROM contact WHERE email='$myemail'";

				$response = $mySforceConnection->query($queryEmail);
				$idemail = array();$i = 0;

				foreach ($response->records as $record) {
					$idemail[$i] = ($record->Id[$i]);	$i = $i + 1;
				}
				$idemailObtenido = $idemail[0];
				if($idemailObtenido <>'')
				{
					$typeAlert=6;
					echo "
					 <script type='text/javascript'>
					 	window.location.href='_form_contacts_niaf.php?alertType=".$typeAlert."';
					 </script>
					";
				}					    
			}catch (Exception $e) {
				$typeAlert=5;
				echo "
					 <script type='text/javascript'>
					 	window.location.href='_form_contacts_niaf.php?alertType=".$typeAlert."';
					 </script>
					";
			}
		}
	}
 ?>