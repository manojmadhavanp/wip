var isdebug = true;

$(document).ready(function (){
			if(isdebug)
				alert("EZYPhp JQuery Loaded");	
		
	/*$("body .formdlg").each(
	function () 
	{
		$(this).css({margin:'-'+($(this).height() / 2)+'px 0 0 -'+($(this).width() / 2)+'px'});	
	});*/
		
	$("form").submit(function () {
			if(isdebug)
				alert("Processing Form on Submit ("+ this.id+")");
			
			jsonobj = null;
			formid = this.id;
			submitbtnid = $('input[type=submit]', this).attr('id');
			curbtnval = $('input[type=submit]', this).attr('value');
			$('#'+submitbtnid).toggleClass("Btnprocess");
			$('input[type=submit]', this).attr('disabled', 'disabled');
			$('input[type=submit]', this).attr('value', 'Please Wait...');
			$.post("./index.php?request="+formid,$("#"+formid).serialize(), function (data){
				if(isdebug)
					alert('AJAX Returned data :'+data);
				
				try{
				jsonobj = JSON.parse($.trim(data));
				}
				catch(exception)
				{
					alert(exception);
					$('body').replaceWith(data+' Exception:'+exception);
				}
				try{
				UpdateControls(jsonobj.UpdateCtrls);
				}
				catch(exception)
				{
					alert(exception);
					$('body').replaceWith('ERROR : UpdateControls'+exception);
				}
				
			});
		
			$('#'+submitbtnid).removeAttr("disabled");
			$('#'+submitbtnid).attr('value', curbtnval);
			$('#'+submitbtnid).toggleClass("Btnprocess");
		});
		
			
});
function urllocation(urlstr)
{
	if(isdebug)
		alert(urlstr);
	$.post("./index.php?request="+urlstr, function (data){
		if(isdebug)
			alert('AJAX Returned data :'+ data);		
				try{
				jsonobj = JSON.parse($.trim(data));
				}
				catch(exception)
				{
					$('body').replaceWith(data);
				}
				UpdateControls(jsonobj.UpdateCtrls);	
												  
		});
}
function SwapView(ShowItem, HideItem)
{
	$("#"+HideItem).slideToggle("fast");
	$("#"+ShowItem).slideToggle("fast");
}
function urlredirect(urlstr)
{
	if(isdebug)
		alert(urlstr);
	window.location = urlstr;
}
function UpdateControls(jsonupd)
{
	if(jsonupd.length==undefined)
		UpdateControl(jsonupd);
	else
	{
		for(var i=0; i<jsonupd.length;i++)
			UpdateControl(jsonupd[i]);
			
	}
}
function UpdateControl(UpdateMsg)
{
	switch (UpdateMsg.Ctrl_Type)
	{
		case 1:
			{
			document.getElementById(UpdateMsg.Ctrl_Name).innerHTML +=  UpdateMsg.Ctrl_Value;
			break;
			}
		case 2:
			{
			document.getElementById(UpdateMsg.Ctrl_Name).innerHTML = UpdateMsg.Ctrl_Value + document.getElementById(UpdateMsg.Ctrl_Name).innerHTML;
			break;
			}
		case 3:
			document.getElementById(UpdateMsg.Ctrl_Name).innerHTML=UpdateMsg.Ctrl_Value;
			break;
		case 4:
			{
			document.getElementById(UpdateMsg.Ctrl_Name).value=UpdateMsg.Ctrl_Value;
			break;
			}
		case 5:
			{
			window.location = UpdateMsg.Ctrl_Value;
			break;
			}
		case 6:
			{
				$('#'+UpdateMsg.Ctrl_Name).each (function(){
					this.reset();
				});
				break;
			}
		case 7:
			{	//alert('case 8'+UpdateMsg.Ctrl_Name);
				$(UpdateMsg.Ctrl_Value).insertAfter("#"+UpdateMsg.Ctrl_Name +" tbody > tr:first");
				break;
			}
		case 8:
			{
			//Hide and Show control
			}
		case 9:
			{
				$.post("index.php?cache="+UpdateMsg.Ctrl_Value,function (data){});
				break;
			}
		case 10:
			{
				document.getElementById(UpdateMsg.Ctrl_Name).innerHTML=UpdateMsg.Ctrl_Value;
				$("#"+UpdateMsg.Ctrl_Name).slideToggle("slow").delay(5000).slideToggle("slow");
				break;
			}
		case 11:
			{
				document.getElementById(UpdateMsg.Ctrl_Name).innerHTML=UpdateMsg.Ctrl_Value;
				$("#"+UpdateMsg.Ctrl_Name).slideToggle("slow").delay(5000).slideToggle("slow");
				break;
			}
		case 12:
			{
				//alert(UpdateMsg.Ctrl_Name+" Adding : "+UpdateMsg.Ctrl_Value);
				$("#"+UpdateMsg.Ctrl_Name).attr(UpdateMsg.Ctrl_Value, UpdateMsg.Ctrl_Value);
				break;
			}
		case 13:
			{
				//alert(UpdateMsg.Ctrl_Name+" Removing : "+UpdateMsg.Ctrl_Value);
				$("#"+UpdateMsg.Ctrl_Name).removeAttr(UpdateMsg.Ctrl_Value);
				break;
			}
		case 14:
		{
			$("#"+UpdateMsg.Ctrl_Name).focus();	
			
			break;
		}
	}
	
}

function ShowForm(id, delayload)
{
	
	$("#"+id).fadeToggle(500);
		$("#"+id).css({top:'50%',left:'50%',margin:'-'+($("#"+id).height() / 2)+'px 0 0 -'+($("#"+id).width() / 2)+'px'});
		
		if(delayload)
		{
		alert("./index.php?request="+delayload);
		$.post("./index.php?request="+delayload, function (data){
			if(data)
			{
				//if(isdebug)
				//alert(data);
				jsonobj = JSON.parse($.trim(data));
				UpdateControls(jsonobj.UpdateCtrls);
				
			}	
			
		});	

		}
}

function HideForm(id)
{
	$("#"+id).fadeOut("fast");
}

/*function CloseFormLocation(id,value)
{
	locindex = document.getElementById('location').selectedIndex;
	loc = document.getElementById('location').options[locindex].text;
	document.getElementById('locationindex').value = locindex;
	
	landmark = document.getElementById('landmark').value;
	document.getElementById('landmarkval').value = landmark;
	
	Pinno = document.getElementById('Pinno').value;
	document.getElementById('Pinno').value = Pinno;
	
	
	cityval = document.getElementById('city').value;
	cityindex = document.getElementById('city').selectedIndex;
	city = document.getElementById('city').options[cityindex].text;
	document.getElementById('cityindex').value = cityval;
	
	stateval = document.getElementById('state').value;
	stateindex = document.getElementById('state').selectedIndex;
	state = document.getElementById('state').options[stateindex].text;
	document.getElementById('stateindex').value = stateval;
	
	countryval = document.getElementById('country').value;
	countryindex = document.getElementById('country').selectedIndex;
	country = document.getElementById('country').options[countryindex].text;
	document.getElementById('countryindex').value = countryval;
	
	$("#"+id).fadeOut("fast");
}*/

function LoadData(dataurl)
{
	alert("./index.php?request="+dataurl);
		$.post("./index.php?request="+dataurl, function (data){
			if(data)
			{
				if(isdebug)
				alert(data);
				jsonobj = JSON.parse($.trim(data));
				UpdateControls(jsonobj.UpdateCtrls);
				
			}	
			
		});	
}
function LoadComboData(ctrl, url)
{
	
	val = ctrl.value;
	
	alert("./index.php?request="+url+"-"+val);
		$.post("./index.php?request="+url+"-"+val, function (data){
			if(data)
			{
				if(isdebug)
				alert(data);
				jsonobj = JSON.parse($.trim(data));
				UpdateControls(jsonobj.UpdateCtrls);
				
			}	
			
		});	
}
/*function LoadData(dataurl)
{
	alert("./index.php?request="+dataurl);
	$.ajax(
		   {
			   url:"./index.php?request="+dataurl
	}).done(function (data){
		if(data)
		{//	alert(data);
			jsonobj = JSON.parse($.trim(data));
			UpdateControls(jsonobj.UpdateCtrls);
			
		}		
	}).fail(function(jqXHR, textStatus) {
		alert("LoadData failed"+dataurl+" Returned: "+textStatus);
	});	
}*/
function SetComboValue(ctrl,valuestr)
{
	for(var i=0; i < ctrl.options.length; i++)
    {
      if(ctrl.options[i].text == valuestr)
    	  {
    	  	ctrl.selectedIndex = i;
    	  	break;
    	  }
    }
}


function GridCmd(ProcessURL)
{//alert(ProcessURL);
	$.post("index.php?request="+ProcessURL, function (data){
		//alert(data);
		processreturnmsg(data);
		if(Execute == "Location")
	window.location = Msg;			
	});
}

function ConfirmDialogBox(UpdateDiv,ProcessURL,id,Msg)
{
	var retconfirm = window.confirm(Msg);
	if(retconfirm == true)
		{
	$.post("index.php?request="+ProcessURL, function (data){
		$("#pgbar").fadeIn(100);//alert(data);
		$('#RowNo'+id).slideUp('slow');
		
			$("#pgbar").fadeOut(100);
			if(data)
			{	//alert(data);
				jsonobj = JSON.parse(data);
				UpdateControls(jsonobj.UpdateCtrls);
				
			}	});
		}
}

function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode;
   if (charCode != 46 && charCode > 31 
     && (charCode < 48 || charCode > 57))
      return false;

   return true;
}

/*function getaddress()
{
	
	addr1 = document.getElementById('address1').value;
	addr2 = document.getElementById('address2').value;
	
	locindex = document.getElementById('location').selectedIndex;
	loc = document.getElementById('location').options[locindex].text;
	document.getElementById('locationindex').value = locindex;
	
	landmark = document.getElementById('landmark').value;
	document.getElementById('landmarkval').value = landmark;
	
	Pinno = document.getElementById('Pinno').value;
	document.getElementById('Pinno').value = Pinno;
	
	
	cityval = document.getElementById('city').value;
	cityindex = document.getElementById('city').selectedIndex;
	city = document.getElementById('city').options[cityindex].text;
	document.getElementById('cityindex').value = cityval;
	
	stateval = document.getElementById('state').value;
	stateindex = document.getElementById('state').selectedIndex;
	state = document.getElementById('state').options[stateindex].text;
	document.getElementById('stateindex').value = stateval;
	
	countryval = document.getElementById('country').value;
	countryindex = document.getElementById('country').selectedIndex;
	country = document.getElementById('country').options[countryindex].text;
	document.getElementById('countryindex').value = countryval;
	
	if(addr1)
		addr = '';
	addr+=addr1+", ";
	if(addr2)
		addr+=addr2+", ";
	if(landmark)
		addr+=landmark+", ";
	if(Pinno)
	    addr+=Pinno+",";
	if(city != '<Select>')
		addr+=city+", ";
	if(state != '<Select>')
		addr+=state+", ";
	if(country != '<Select>')
		addr+=country+" ";
	
	document.getElementById('address').value = addr;
	if(document.getElementById('city').lostfocus)
		CloseForm(div);
	document.getElementById('Remark').focus();
}*/


