<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
<!--
body{font-family:Arial, Helvetica, sans-serif; color: #626262}
h3{color:#414141;}

-->
</style>
</head>
<body>


<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td style="background-image:url(http://192.168.0.221/visitor.co.in/application/includes/images/devshed-bg.jpg); background-repeat:repeat;">
     <a href="http://www.visitor.co.in" style="text-decoration:none;  color:#FFFFFF;"><span style="font-size:24px; color:#FFFFFF; margin-top:-30px;"></a>
     <table width="100%" border="0" cellspacing="2" cellpadding="5">
       <tr>
         <td ><a href="http://www.visitor.co.in" style="text-decoration:none;  color:#FFFFFF;"><img src="http://192.168.0.221/visitor.co.in/application/includes/images/Visitorsmall.png" alt="" width="48" height="48" style="padding:5px 10px;" /></a></td>
         <td width="100%"><h1><a href="http://www.visitor.co.in" style="text-decoration:none;  color:#FFFFFF;">Visitors.co.in</a> </h1>
           <form id="form1" name="form1" method="post" action="">
    </form>
         </td>
       </tr>
     </table></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#F5F5F5">
    <div style="padding:20px;">
      <h3>Dear <? echo $data['PersonName'] ?>,</h3>
      <p>Thank you for registring with us. You are just one step away for completing this registration. We would request you to go ahead and click on the link below.</p>
      <h5><span style="color: #626262;">Your Email Validation Link</span><br />
        <a href="http://192.168.0.221/visitor.co.in/VerifyRegistration" >Verify</a></h5>
    </div></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#F5F5F5">
 
    <div style="color: #949494 ;style="padding:20px; font-weight:bold;"><span  style="color: #949494 ;">Regards,<br /></span>
<span style="font-size: 12px;"><span style="color: #616161">Support Team</span><br />
Evolvetech Consultancy<br />
+91 22 27780324<br />
<a href="http://www.evolvetech.in">evolvetech.in</a></span></div></td>
  </tr>
  <tr>
    <td align="left" valign="top" style="background-image:url(http://192.168.0.221/visitor.co.in/application/includes/images/devshed-bg.jpg); background-repeat:repeat;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    
    <td align="center"><h5><a href="http://www.visitor.co.in" style="text-decoration:none;color: #FFFFFF;">Visitor.co.in</a></h5></td>
    <td></div>
<h5 align="center" ><span  style="color: #FFFFFF;">© Visitor 2010 - <? echo date('Y');  ?> All Rights Reserved By: EvolveTech Consultancy</span></h5>
</div></td>
<td><h5><span  style="color: #FFFFFF;">Contact No</span></h5></td>
  </tr>


  </tr>
  <tr>  
   </tr>

<?
/*if(isset($data['emails']))
 {
if(!$data['emails'])
	echo '<tr><td>"Email Verification is not Done "</td></tr>';
else
  {
	foreach($data['emails'] as $email)
	 {
		$result='<tr>';
		$result.='<td>'.$email['visitor_FName'].','.$email['visitor_Email'].','.$email['visitor_Mobile'].'</td> ';
		$result.='<tr>';
		echo $result;
	  }
   }
 }*/
?>
</table>
</body>
</html>
