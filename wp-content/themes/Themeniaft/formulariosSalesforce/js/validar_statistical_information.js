function validar(){ 
      //VALIDATE EDUCATION RECEIVED
      if( !document.validar_form_stadistical.education_received[0].checked &&        
          !document.validar_form_stadistical.education_received[1].checked && 
          !document.validar_form_stadistical.education_received[2].checked && 
          !document.validar_form_stadistical.education_received[3].checked && 
          !document.validar_form_stadistical.education_received[4].checked 
        ){
        alert("You must select an level education received.");
        return 0;
  		}
      //VALIDATE HOUSEHOLD INCOME
  		if( !document.validar_form_stadistical.household_income[0].checked &&        
              !document.validar_form_stadistical.household_income[1].checked && 
              !document.validar_form_stadistical.household_income[2].checked && 
              !document.validar_form_stadistical.household_income[3].checked          
          ){
          alert("You must select an household income.");
          return 0;
  		}
   	//SEND THE FORM
   	document.validar_form_stadistical.submit(); 
} 