<table width="100%" border="0" cellpadding="0" cellspacing="0" class="appform">
  <tr>
    <th><h1>Location</h1></th>
      <th width="32px">
      <div class="iconbtn icon close" onclick="HideForm('Locationfrm');"></div>
      </th>
  </tr>
  <tr>
  <td colspan="2"><div id="Locationfrm-FormError" class="frmhelper"></div></td>
  </tr>
  <tr>
  <td colspan="2"><form name="Masters-AddNewLocation" id="Masters-AddNewLocation" method="post" action="" onSubmit="return false;">
    
    <ul class="clearfix webform">
    
        
    <li><div class="frmitemcaption">Country</div><div class="frmitems"  >
    <select class="fit" name="LCountry" id="LCountry" onchange="LoadComboData(this,'Masters-NewLoadStates'); " ></select>
    <span class="addbtn" onclick="ShowForm('Countryfrm',false);"><i class="icon add"></i></span>
      </div></li>
      
   <li><div class="frmitemcaption">State</div><div class="frmitems">
            <select class="fit" name="LState" id="LState" onchange="LoadComboData(this,'Masters-NewLoadCities');"  ></select> 
            <span class="addbtn" onclick="ShowForm('Statefrm','Masters-LoadLocState');"><i class="icon add"></i></span>
            </div></li>
       
    <li><div class="frmitemcaption">City</div><div class="frmitems ">
            <select class="fit" name="LCity" id="LCity" onblur="GetAddress('Addressfrm');"></select>
            <span class="addbtn" onclick="ShowForm('Cityfrm','Masters-LoadCityState');"><i class="icon add"></i></span>
             </div></li>
           <li><div class="frmitemcaption">Location</div><div class="frmitem">
    <input type="text" name="LocationName" id="LocationName" placeholder="Location "/></div></li>
      
        <li class="row"> <div class="frmitembtns">
     <input type="submit" name="submitlocation" id="submitlocation" value="Add Location" class="formbutton" />
    <input type="reset" name="Cancel" id="Cancel" value="Cancel" class="formbutton" />
    </div>
    </li>
       </ul>
    </form>
    </td>
  </tr>
</table>
