<table width="100%"  border="0" cellpadding="0" cellspacing="0" class="appform">
  <tr>
    <th><h1>City</h1></th>
    <th width="32px">
      <div class="iconbtn icon close" onclick="HideForm('Cityfrm');"></div>
      </th>
     </tr>
    <tr>
    <td  colspan="2"><div id="City-FormError" class="frmhelper"></div></td>
    
  </tr>
  <tr>
    <td  colspan="2" ><form name="Masters-AddNewCity" id="Masters-AddNewCity" method="post" action="" onsubmit="return false;">
 
   <ul class="clearfix webform">
   
 <li><div class="frmitemcaption">Country</div><div class="frmitems">
    <select class="fit" name="CCountry" id="CCountry" onchange="LoadComboData(this,'Masters-NewLoadCityStates'); " ></select><span class="addbtn" onclick="ShowForm('Countryfrm',false);"><i class="icon add"></i></span>
      </div></li>
      
 <li><div class="frmitemcaption">State</div><div class="frmitems">
            <select class="fit" name="CState" id="CState" ></select> <span class="addbtn" onclick="ShowForm('Statefrm',false);"><i class="icon add"></i></span>
            </div></li>
       
         <li><div class="frmitemcaption">city</div><div class="frmitem">
       <input type ="text" name="CityName" id="CityName" />
         </div></li>
         
           <li class="row"> <div class="frmitembtns">
     <input type="submit" name="submitcity" id="submitcity" value="Add Location" class="formbutton" />
    <input type="reset" name="Cancel" id="Cancel" value="Cancel" class="formbutton" />
    </div>
    </li>
       
       </ul>
      </form>
    </td>
  </tr>
</table>
