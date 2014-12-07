<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
Hello
<?
$trans_id=5;
$qrystr = "SELECT * FROM `addproduct_request` WHERE id=$trans_id";
$query = mysql_query("SELECT * FROM `addproduct_request` WHERE 'id'='$trans_id'");
echo $qrystr;
?>
</body>
</html>