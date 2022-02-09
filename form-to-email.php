<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $restaurantname = $_POST['restaurantname'];
  $restaurantaddress = $_POST['restaurantaddress'];
  $menu = $_POST['menu'];
  $message = $_POST['message'];

  $email_from = 'landingpage@getfoodini.app';
  $email_subject = "NEUE ANFRAGE: $restaurantname - $name";
  $email_body = "Name: $name\n".
                "Email: $email\n".
                "Telefonnummer: $phone\n".
                "Restuarant-Name: $restaurantname\n".
                "Restuarant-Adresse: $restaurantaddress\n".
                "Nachricht: $message\n".

  $to = "anfrage@getfoodini.app";
  $headers = "From: $email_from \r\n";
  $headers .= "Reply-To: $email \r\n";

  mail($to,$email_subject,$email_body,$headers);

  function IsInjected($str)
  {
    $injections = array('(\n+)',
          '(\r+)',
          '(\t+)',
          '(%0A+)',
          '(%0D+)',
          '(%08+)',
          '(%09+)'
          );
              
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  if(IsInjected($email))
  {
    echo "Bad email value!";
    exit;
  }

  mail($to,$email_subject,$email_body,$headers);
?>