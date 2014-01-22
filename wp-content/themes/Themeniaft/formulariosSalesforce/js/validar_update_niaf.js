function validar(){ 
      //VALIDATE FIRST NAME
      if (document.validar_form.first_name.value.length==0){ 
           alert("Enter Your First name please!!") 
           document.validar_form.first_name.focus() 
           return 0; 
      }
      //VALIDATE LAST NAME
      if (document.validar_form.last_name.value.length==0){ 
           alert("Enter Your Last name please!!") 
           document.validar_form.last_name.focus() 
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
      if (document.validar_form.country.value == "USA" && document.validar_form.state.value == "--None--"){ 
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