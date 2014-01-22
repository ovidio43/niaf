function validar(){ 

      //VALIDATE SALUTATION
      if (document.validar_form.salutation.selectedIndex==0){ 
          alert("You must select a salutation please!!") 
          document.validar_form.salutation.focus() 
          return 0; 
      } 
     	//VALIDATE FIRST NAME
     	if (document.validar_form.first_name.value.length==0){ 
        	 alert("Enter your First name please!!") 
        	 document.validar_form.first_name.focus() 
        	 return 0; 
     	}
      //VALIDATE LAST NAME
      if (document.validar_form.last_name.value.length==0){ 
           alert("Enter your last name please!!") 
           document.validar_form.last_name.focus() 
           return 0; 
      }
      //VALIDATE ORGANIZATION IF TITLE IS DISTINCT TO ZERO
      if (document.validar_form.title.value.length!=0 && document.validar_form.organization.value.length==0){ 
           alert("Enter your organization please!!") 
           document.validar_form.organization.focus() 
           return 0; 
      }
      //VALIDATE ORGANIZATION WHEN CHECKBOX==TRUE
      if(document.validar_form.checkOrganization.checked && document.validar_form.organization.value.length==0)
      {
           alert("Enter your organization, or uncheck the box") 
           document.validar_form.organization.focus() 
           document.getElementById('checkboxOrganization').style.color = "red";
           return 0;
      }
	    //VALIDATE STREET
      if (document.validar_form.street.value.length==0){ 
          alert("Enter the street where you live please!!") 
          document.validar_form.street.focus() 
          return 0; 
      }
      //VALIDATE CITY
      if (document.validar_form.city.value.length==0){ 
          alert("Enter your city please!!") 
          document.validar_form.city.focus() 
          return 0; 
      }
      //VALIDATE STATE USA IS 21
      if (document.validar_form.country.value == "USA" && document.validar_form.state.selectedIndex==0){ 
          alert("You must select a state please!!") 
          document.validar_form.state.focus() 
          return 0; 
      } 
      //VALIDATE ZIP
      if (document.validar_form.zip.value.length==0){ 
          alert("Enter your zip please!!") 
          document.validar_form.zip.focus() 
          return 0; 
      }
      if(isNaN(document.validar_form.zip.value))
      {
          alert("This field should only contain numbers please!!") 
          document.validar_form.zip.focus() 
          return 0; 
      }
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
function validarPhone(evt)
{ 
  var nav4 = window.Event ? true : false;  
  // NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57  
  var key = nav4 ? evt.which : evt.keyCode;  
  return (key <= 13 || (key >= 48 && key <= 57) || key==45); 
} 