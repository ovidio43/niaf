function validar(){ 

      //VALIDATE EMAIL
      if (document.validar_form.email_address.value.length==0){ 
          alert("Enter your email address please!!") 
          document.validar_form.email_address.focus() 
          return 0; 
      }
      expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if( !expr.test(document.validar_form.email_address.value)) 
      {
          alert("Your email not is valid!!") 
          document.validar_form.email_address.focus() 
          return 0;  
      }
      //VALIDATE CURRENT PASSWORD
      if (document.validar_form.current_password.value.length==0){ 
           alert("Enter your current password please!!");
           document.validar_form.current_password.focus(); 
           return 0; 
      }
      //VALIDATE NEW PASSWORD AND NEW PASSWORD>=8DIGITS
      if (document.validar_form.new_password.value.length==0){ 
           alert("Enter your new password please!!");
           document.validar_form.new_password.focus(); 
           return 0; 
      }
      if (document.validar_form.new_password.value.length<=8){ 
           alert("The password must be more than 8 digits!!");
           document.validar_form.new_password.focus(); 
           return 0; 
      }
      //VALIDATE REPEAT PASSWORD
      if (document.validar_form.repeat_password.value.length==0){ 
           alert("Please repeat your new password!!");
           document.validar_form.repeat_password.focus(); 
           return 0; 
      }
      //VALIDATE 2 FIELDS
      if (document.validar_form.new_password.value != document.validar_form.repeat_password.value){ 
           alert("NEW PASSWORD and REPEAT NEW PASSWORD are different please check");
           document.validar_form.repeat_password.focus(); 
           return 0; 
      }
      if (confirm("Want to send the form to process your data?")) {
        //SEND THE FORM
        document.validar_form.submit();
      }
      else {
           return 0;
      }

   	 
} 