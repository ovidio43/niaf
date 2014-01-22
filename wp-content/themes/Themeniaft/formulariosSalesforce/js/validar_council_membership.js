function validar(){ 

      if( !document.validar_form_council.council[0].checked &&        
          !document.validar_form_council.council[1].checked && 
          !document.validar_form_council.council[2].checked && 
          !document.validar_form_council.council[3].checked && 
          !document.validar_form_council.council[4].checked && 
          !document.validar_form_council.council[5].checked && 
          !document.validar_form_council.council[6].checked && 
          !document.validar_form_council.council[7].checked
        ){
        alert("You must select an option.");
        return 0;
      }







   	//SEND THE FORM
   	document.validar_form_council.submit(); 
} 