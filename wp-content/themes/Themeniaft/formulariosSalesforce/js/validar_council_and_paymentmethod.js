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
      
          if(!document.validar_form.council[0].checked &&
              !document.validar_form.council[1].checked &&
              !document.validar_form.council[2].checked &&
              !document.validar_form.council[3].checked &&
              !document.validar_form.council[4].checked &&
              !document.validar_form.council[5].checked &&
              !document.validar_form.council[6].checked &&
              !document.validar_form.council[7].checked &&
              !document.validar_form.council[8].checked)
          {
            alert("You must select an option.");
        return 0;
          }
      //VALIDATE MEMBERSHIP TERM
      if (validar_form.membership_term.selectedIndex==0)
      { 
          alert("You must select a membership term please!!") 
          document.validar_form.membership_term.focus() 
          return 0; 
      }
      //VALIDATE CARD NUMBER
      if (validar_form.card_number.value.length==0)
      { 
         alert("Enter your card number please!!") 
         document.validar_form.card_number.focus() 
         return 0; 
      }
      if(isNaN(validar_form.card_number.value))
      {
          alert("This field should only contain numbers please!!") 
          document.validar_form.card_number.focus() 
          return 0; 
      }
      //VALIDATE DATE
      if (validar_form.expiration_month.selectedIndex==0)
      { 
          alert("You must select a expiration month term please!!") 
          document.validar_form.expiration_month.focus() 
          return 0; 
      }
      if (validar_form.expiration_year.selectedIndex==0)
      { 
          alert("You must select a expiration year term please!!") 
          document.validar_form.expiration_year.focus() 
          return 0; 
      }
      //VALIDATE FIRST NAME
      if (document.validar_form.p_first_name.value.length==0){ 
           alert("Enter Your First name please!!") 
           document.validar_form.p_first_name.focus() 
           return 0; 
      }
      //VALIDATE LAST NAME
      if (document.validar_form.p_last_name.value.length==0){ 
           alert("Enter Your Last name please!!") 
           document.validar_form.p_last_name.focus() 
           return 0; 
      }
      //VALIDATE STREET
      if (document.validar_form.p_street.value.length==0){ 
          alert("Enter the street where you live please!!") 
          document.validar_form.p_street.focus() 
          return 0; 
      }
      //VALIDATE CITY
      if (document.validar_form.p_city.value.length==0){ 
          alert("Enter your city please!!") 
          document.validar_form.p_city.focus() 
          return 0; 
      }
      //VALIDATE STATE USA IS 22
      if (document.validar_form.p_country.value == "USA" && document.validar_form.p_state.selectedIndex==0){ 
          alert("You must select a state please!!") 
          document.validar_form.p_state.focus() 
          return 0; 
      } 
      //VALIDATE COUNTRY
      if (document.validar_form.p_country.selectedIndex==0){ 
          alert("You must select a country please!!") 
          document.validar_form.p_country.focus() 
          return 0; 
      } 
      //VALIDATE ZIP
      if (document.validar_form.p_zip.value.length==0){ 
          alert("Enter your zip please!!") 
          document.validar_form.p_zip.focus() 
          return 0; 
      }
      if(isNaN(document.validar_form.p_zip.value))
      {
          alert("This field should only contain numbers please!!") 
          document.validar_form.p_zip.focus() 
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