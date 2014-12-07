<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="appform">
  <tr>
    <th><h3>New User Registration </h3></th>
  </tr>
  <tr>
    <td><div id="Registration-FormError" class="frmhelper"></div></td>
  </tr>
  <tr>
    <td >
    <form action="" method="post" id="User-ProcessReg" name="User-ProcessReg" onSubmit="return false;">
    <ul class="clearfix webform">
    <li><div class="frmitemcaption">Name<span class="imp">*</span></div><div class="frmitem"><input name="Name" type="text" id="Name" placeholder="Your Full Name" />
    </div></li>
      <li><div class="frmitemcaption">Company Name<span class="imp">*</span></div><div class="frmitem"><input name="CompanyName" type="text" id="CompanyName" placeholder="Your Company Name" />
      </div></li>
      <li><div class="frmitemcaption">Mobile<span class="imp">*</span></div><div class="frmitem"><input name="MobileNo" type="text" id="MobileNo" placeholder="Your Mobile No." />
      </div></li>
        <li><div class="frmitemcaption">Email<span class="imp">*</span></div>
          <div class="frmitem">
            <input name="EmailID" type="text" id="EmailID" placeholder="Your Email ID." />
          </div>
        </li>
        <li><h4>Choose a password</h4></li>
        <li><div class="frmitemcaption">Password<span class="imp">*</span></div><div class="frmitem"><input type="Password" name="Password" id="Password" placeholder="Choose a password" /></div></li>
         <li><div class="frmitemcaption">Confirm Password<span class="imp">*</span></div><div class="frmitem"><input type="Password" name="RePassword" id="RePassword" placeholder="Re enter the password" /></div></li>
          <li><div class="frmtext"> <input name="terms" type="checkbox" id="terms" class="forminput" />
           <strong><span class="imp">*</span> I Agree to terms &amp; conditions of visitor.co.in </strong> </div></li> 
        
        
    <li><div class="frmitembtns">
    <input type="submit" name="submitreg" id="submitreg" value="Registor" class="formbutton" />
    <input type="button" name="forgotbutton" id="forgotbutton" value="Forgot Password" class="formbutton" onclick="SwapView('Regfrm','Forgotfrm');"/>
	<input type="button" name="forgotbutton" id="forgotbutton" value="Already Registered" class="formbutton" onclick="SwapView('Regfrm','loginfrm');"/>
    </div>
    </li>
    </ul>
    </form>      </td>
  </tr>
  
</table>


