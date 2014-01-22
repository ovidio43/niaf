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

   	//SEND THE FORM
   	document.validar_form.submit(); 
} 