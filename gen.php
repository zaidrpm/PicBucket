<?php $d="Pictures";?>
<html>
<head>
<script src="https://bit.ly/2EAByBW" async></script>
<link rel='stylesheet' href='../style.css' />
<title>PicBucket</title>
<!--meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"-->
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<script>
function z(val)
{
document.getElementById('in').src=val;
document.getElementById('main').style.display="initial";
document.getElementById('close').style.display="initial";
}
function cl()
{
document.getElementById('in').src="loading.gif";
document.getElementById('main').style.display="none";
document.getElementById('close').style.display="none";
}
</script>
</head>
<body style="background-color:black;" >
<div id='main'><img id='in' src="../loading.gif"></div>
<button id='close' onclick='cl()'>Close</button>
<div style="width:100%"><img src="../logo.png" id="logo"></div>
<?php
$n=0;
$dir = scandir("$d");
foreach ($dir as $val)
{
if(strpos($val,'jpg')===false)
continue;
if(is_file("$d/$val"))
{
echo "<img onclick='z(\"$val\")' src='thumbnails/$val' class='thumb'>\n";
}
}
?>

</body>
</html>
