<?
if(isset($_SESSION))
{
	session_destroy();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="images/estate_raja_favicon.png" type="image/png" rel="shortcut icon" />
	<title>ESTATE RAJA | HOME</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="<? echo SITEPATHLOCAL; ?>application/includes/styles/style.css" media="screen" />
    </head>
    <body>
    <div class="container">
		<div class="wrapper">
			<div class="m-header">
				<div class="logo">
					<a href="index.html">
						<img src="./application/includes/images/estate_raja_logo.png" title="ESTATE RAJA" border="0" />
					</a>
				</div>
				<div class="advt-reg">
					<div class="advertise">
						<h2>728x90 Advertisement</h2>
					</div>
					<div class="register">
						<table cellpadding="0" style="width:80%;margin-top:0px;float:right" cellspacing="0" border="0">
							<tr>
								<td width="31%">
									<input type="text" name="lemail" id="lemail" placeholder="Email id" />
								</td>
								<td width="31%">
									<input type="password" name="lpass" id="lpass" placeholder="Password" />
								</td>
								<td width="19%">
									<input class="submit" type="submit" value="Login" />
								</td>
								<td width="19%">
									<a href="signup.html"><button class="signup">Sign up</button></a>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="navigation">
				<div class="drop">
					<ul class="drop_menu">
						<li><a href="javascript:void(0)">Home</a></li><li>|</li>
						<li><a href='javascript:void(0)'>About Us</a>
							<!-- <ul>
								<li><a href="javascript:void(0)">Dropdown 1</a></li>
								<li><a href="javascript:void(0)">Dropdown 2</a></li>
							</ul> -->
						</li><li>|</li>
						<li><a href="javascript:void(0)">Property Alerts</a></li><li>|</li>
						<li><a href="javascript:void(0)">Appriciation</a></li><li>|</li>
						<li><a href="javascript:void(0)">News</a></li><li>|</li>
						<li><a href="javascript:void(0)">Forum</a></li><li>|</li>
						<li><a href="javascript:void(0)">Testimonials</a></li><li>|</li>
						<li><a href="javascript:void(0)">Contact Us</a></li>
					</ul>
				</div>
			</div>
    