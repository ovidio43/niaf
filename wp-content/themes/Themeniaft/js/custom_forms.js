$( document ).ready(function() {
    $("#form-new-york").validate({
        rules: { 
            txtEmail: {required: true, email: true },
            level:{required: true},
            Salutation:{required: true},
            txtFirstName:{required: true},
            txtLastName:{required: true},
            txtAddress1:{required: true},
            txtCity:{required: true},
            txtState:{required: true},
            txtZip:{required: true},
            txtCCFirstName:{required: true},
            txtCCLastName:{required: true},
            txtCCAddress1:{required: true},
            txtCCCity:{required: true},
            txtCCState:{required: true},
            txtCCZip:{required: true}            
        },
        submitHandler: function() {
          var query = $("#form-new-york").serialize(); 
            $.ajax({
              type: "POST",
              url: $("#form-new-york").attr("action")+"/formulariosSalesforce/_SF_validation_user.php",
              data: query,
              beforeSend: function(objeto){
                $("#msg").html('SENDING....');
              },
              success: function(data) {               
                	$('#msg').html(data);                 
              }                            
            });
        }
    });

});