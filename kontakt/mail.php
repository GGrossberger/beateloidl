<?php
	$to = "b.loidl@kabsi.at";
	//$to = "g.grossberger@gmail.com";
	$subject = "Website Anfrage";
	$header = "From: g-balance@beate-loidl.at";
 
 if($_POST["contact_name"] && $_POST["contact_email"] && $_POST["contact_phone"] && endswith($_SERVER["HTTP_REFERER"], "kontakt/index.html"))  {
	$body = "Anfrage von www.beate-loidl.at \r\n\r\n";
	if($_POST["contact_salutation"]) {
		$body = $body."Anrede:\t".$_POST["contact_salutation"]."\r\n";
	}
	$body = $body."Name:\t".$_POST["contact_name"]."\r\n"
			."Email:\t".$_POST["contact_email"]."\r\n"
			."Telefon:\t".$_POST["contact_phone"]."\r\n";
	if($_POST["contact_text"]) {
		$body = $body."Anfrage:\r\n".$_POST["contact_text"]."\r\n";
	}
 if (mail($to, $subject, $body)) {
	//echo $body; 
	header("Location: danke.html");
	exit(); 
  } else {
	 header('Location: error.html');
	exit(); 
	/*
	  	 echo "mail error"."<br>";
		 echo $_POST["contact_name"]."<br>";
		 echo $_POST["contact_email"]."<br>";
		 echo $_POST["contact_phone"]."<br>";
		 echo $_SERVER["HTTP_REFERER"]."<br>";
		 */

  }
 } else {
	 header('Location: error.html');
	exit(); 
  }
  
  
function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}
?>