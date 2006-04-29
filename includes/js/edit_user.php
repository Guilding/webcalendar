<?php /* $Id$  */ ?>
var validform = true;


function valid_form ( form ) {
  var name = form.user.value;
  var pass1 = form.upassword1.value;
  var pass2 = form.upassword2.value;
  if ( ! name ) {
    alert ( "<?php etranslate("Error", true) ?>:\n\n" + "<?php 
      etranslate("Username can not be blank", true)?>" );
    return false;  
  }  
  if ( ! pass1 || ! pass2 ) {
    alert ( "<?php etranslate("Error", true) ?>:\n\n" + "<?php 
      etranslate("You have not entered a password", true)?>" );
    return false;  
  }
  if (  pass1 != pass2 ) {
    alert ( "<?php etranslate("Error", true) ?>:\n\n" + "<?php 
      etranslate("The passwords were not identical", true)?>" );
    return false;  
  }
  check_name();
  
  return validform;

}


function check_name() {
  var url = 'ajax.php';
  var params = 'page=edit_user&name=' + $F('username');
  var ajax = new Ajax.Request(url,
    {method: 'post', 
    parameters: params, 
    onComplete: showResponse});
}

function showResponse(originalRequest) {
  if (originalRequest.responseText) {
    text = originalRequest.responseText;
    //this causes javascript errors in Firefox, but these can be ignored
    alert (text);
    document.edituser.user.focus();
    validform =  false;
  } else {
    validform =  true;
  }
}