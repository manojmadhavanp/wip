<?
if((!isset($_SESSION)) or (!isset($_SESSION['UID'])))
{
header('Location: Index');
}
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 9]>
<html id="ie9" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<!--<![endif]-->
<html lang="en">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><? echo $data['title']; ?></title>
<meta name="viewport" content="width=device-width" />
<link rel="author" href="https://plus.google.com/109585018812807044079?rel=author" />
<link rel="publisher" href="https://plus.google.com/103193222830910724552?rel=publisher" />
<meta name="keywords" content="<? echo $data['keyword']; ?>" />
<meta name="description" content="<? echo $data['description']; ?>"  />
<meta name="resource-type" content="document" />
<meta name="audience" content="all" />
<meta name="distribution" content="global" />
<meta name="robots" content="index, follow"/>
<meta name="googlebot" content="index, follow"/>
<meta name="revisit-after" content="1 days" />
<link href="/robots.txt" title="robots" rel="help">
<link rel="pingback" href="http://www.manojmadhavan.com/xmlrpc.php" />

<meta property='og:locale' content='en_US'/>
<meta property='og:type' content='article'/>
<meta property='og:title' content='Testing<? echo $data['title']; ?>'/>
<meta property='og:description' content='<? echo $data['description']; ?>'/>
<meta property='og:url' content='http://www.ezyphp.com'/>
<meta property='og:site_name' content='Visitor.co.in'/>
<meta property='og:image' content='<? echo SITEPATHLOCAL; ?>application/includes/images/EZYPhp.png'/>
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@Visitor.co.in"/>
<meta name="twitter:domain" content="Visitor.co.in"/>
<meta name="twitter:creator" content="@manojmadhavanp"/>
<meta name="twitter:image:src" content="<? echo SITEPATHLOCAL; ?>application/includes/images/EZYPhp.png"/>

<link rel="icon" href="<? echo SITEPATHLOCAL; ?>application/includes/images/favicon.ico" type="image/ico" />
<link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
<link media="all" href="<? echo SITEPATHLOCAL; ?>application/includes/styles/jquery-ui.css" rel="stylesheet" type="text/css">
<link media="all" href="<? echo SITEPATHLOCAL; ?>application/includes/styles/default.css" rel="stylesheet" type="text/css">


</head>

<body>
<header id="header" class="header">
<h1><a href="<? echo SITEPATHLOCAL; ?>" class="animateslow php framework" data-content="php framework home"><img src="./application/includes/images/Visitorsmall.png" width="48" height="48" />Visitors</a><div class="company">
@ your office...</div></h1>
<ul class="nav">
<li><a href="<? echo SITEPATHLOCAL; ?>Events" class="animateslow php framework" data-content="php framework home">Events</a></li>
<li><a href="<? echo SITEPATHLOCAL; ?>Settings" class="animateslow php framework" data-content="php framework home">Settings</a></li>
<li><a href="<? echo SITEPATHLOCAL; ?>Index" class="animateslow php framework" data-content="php framework home">Logout</a></li>
</ul>
</div>
</header>
<div id="content" class="pagecontent clearfix">
