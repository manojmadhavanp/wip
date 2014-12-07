<table width="40%" height="200" border="0" cellpadding="1" cellspacing="2" class="appform">
  <tr>
    <th width="91%"><h1>New Designation</h1></th>
    <th><div class="iconbtn icon close" onclick="HideForm('NewDesignation');"></div></th>
  </tr>
  <tr><td><div id="Designation-FormError" class="frmhelper"></div></td></tr>
  <tr><td colspan="2"><form id="NewDesignation-AddDesig" name="NewDesignation-AddDesig" method="post" action="" onsubmit="return false;">
  
  <ul class="clearfix webform">
  <li><div class="frmitemcaption">Type</div><div class="frmitem">
     <select name="typedesignation" id="typedesignation" class="FormCtrl">
			  <option value="-1">&lt;Select&gt;</option>
			  <option value="1">Owners</option>
			  <option value="2">Top Management</option>
			  <option value="3">Management</option>
			  <option value="4">Technical</option>
			  </select> </div></li>
      <li><div class="frmitemcaption">Designation</div><div class="frmitem">
      <input type="text" name="DesignationName" id="DesignationName" />
     </div></li>
    
  <li class="row"> <div class="frmitembtn">
      <input type="submit" name="button" id="button" value="Submit" class="formbutton"/> </div></li></ul>
      </form>
     </td>
  </tr>
</table>
