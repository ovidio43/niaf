   <?php
   $message = wordwrap('thi is test message', 70);
    // send mail
    mail("info@niaf.org, altra@omnilogic.us",'test mail',$message,"From: edd\n");
    echo "Thank you for sending us feedback";