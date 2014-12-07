<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="appform">
  <tr>
    <th><h3>Login Here</h3></th>
  </tr>
  <tr>
    <td ><div id="Login-FormError" class="frmhelper"></div></td>
  </tr>
  <tr>
    <td><form id="User-LoginProcess" name="User-LoginProcess" method="post" action="" onsubmit="return false;">
    <ul class="clearfix webform">
    <li><div class="frmitemcaption">Username<span class="imp">*</span></div><div class="frmitem"><input type="text" name="username" id="username" placeholder="Registered Email Address " /></div></li>
    <li><div class="frmitemcaption">Password<span class="imp">*</span></div><div class="frmitem"><input type="password" name="pwd" id="pwd" placeholder="Password" /></div></li>
    <li><div class="frmitembtns"><input type="submit" name="loginsubmit" id="loginsubmit" value="Login" class="formbutton" />
            <input type="button" name="forgotbutton" id="forgotbutton" value="Forgot Password" class="formbutton" onclick="SwapView('Forgotfrm','loginfrm');"/>
            
            <input type="button" name="registerbutton" id="registerbutton" value="Register" class="formbutton" onclick="SwapView('Regfrm','loginfrm');" /> </div></li>
    </ul>
  </form>
    </td>
  </tr>
</table>
