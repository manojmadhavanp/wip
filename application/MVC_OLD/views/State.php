<table width="100%"  border="0" cellpadding="0" cellspacing="0" class="appform">
  <tr>
    <th><h1>State</h1></th>
     <th width="32px">
      <div class="iconbtn icon close" onclick="HideForm('Statefrm');"></div>      </th>
    </tr>
  <tr>
  <td  colspan="2"><div id="State-FormError" class="frmhelper"></div></td>
  </tr>
  <tr>
    <td  colspan="2" ><form id="Masters-AddNewState" name="Masters-AddNewState" method="post" action="" onsubmit="return false;">
    <ul class="cleaefix webform"> 
    
    <li><div class="frmitemcaption">Country</div><div class="frmitems">
    <select class="fit" name="SCountry" id="SCountry" ></select><span class="addbtn" onclick="ShowForm('Countryfrm',Masters-false);"><i class="icon add"></i></span>
      </div></li>
      
       <li><div class="frmitemcaption">State</div><div class="frmitem">
         <input type="text" name="StateName" id="StateName" />
       </div>
       </li>
 <li class="row"> <div class="frmitembtns">
     <input type="submit" name="submitstate" id="submitstate" value="Add Location" class="formbutton" />
    <input type="reset" name="Cancel" id="Cancel" value="Cancel" class="formbutton" />
    </div>
    </li>
   </ul>
        
    </form>    </td>
  </tr>
</table>

