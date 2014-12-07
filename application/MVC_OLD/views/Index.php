<div class="column column_three">
<div class="row" >
<h1>Project Management / Collaboration Software</h1>
<p>Handy tool for internal usage only developed specifically for Craft World Wide Mumbai</p>  
</div>
<div class="row" >
<h1>Product Highlights</h1>
<p><strong>Client Management:<strong> Manage and access your client details.</p>  
<p><strong>Employee Management:<strong> Manage and access your Employees details.</p> 
<p><strong>Project Management:<strong> Manage and access your Project information.</p> 

</div>
</div>
<div class="column column_two" >
<div id="loginfrm" class="row Dlgform animateview ">
<?php 
$User = new User();
$User->LoginForm();
?>
</div>
<div id="Regfrm" class="row Dlgform animateview hidden ">
<?php 
$User->RegistrationForm();
?>
</div>
<div id="Forgotfrm" class="row Dlgform animateview hidden">
<?php 
$User->ForgotForm();
?>
</div>
<div id="Resetfrm" class="row Dlgform animateview hidden">
<?php 
//$User->ResetForm();
?>
</div>
<div id="Desig" class="row Dlgform hidden">
<?php 
/*$Desig = new Designation();
$Desig->GetDesignation();*/
?>
</div>
</div>
