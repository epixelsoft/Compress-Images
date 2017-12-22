    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Compress Image for web</title>
        <link href="css/style.css" rel="stylesheet">
        <script src="js/main_script.js"></script>
    </head>
    <body>
    <h3> Upload multiple file  with drag and drop features</h3>
    <form action="upload.php" class="dropzone">
    </form>
   <center><a id="create_zip" onclick="create_zip('<?php echo date('d'); ?>')">Create Zip<span id="billstate"></span></a></center>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

 

function create_zip(str11)
{



var file_url='data/'+str11+'/'+getCookie('user_token')+'/compress';

alert(file_url);

xmlHttp=GetXmlHttpObject()

var url="http://skect.in/test/test1/zip.php" ;


url=url+"?qry="+file_url;

xmlHttp.onreadystatechange=stateChanged
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}function stateChanged()
{

if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 {


document.getElementById("billstate").innerHTML='';
window.open(xmlHttp.responseText, '_self'); 

//document.getElementById("billstate").innerHTML="";

 }

else
{
document.getElementById("billstate").innerHTML="<img src=https://tdcpl.com/demo-account/images/loader.gif height=15 />";
}
}function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}

</script>
    </body>
    </html>
<style>
#create_zip {
    display: block;
    min-width: 170px;
    height: 33px;
    margin: 10px auto 30px auto;
    font-size: 13px;
    font-weight: bold;
    text-transform: uppercase;

background-color: #7A7A7A;
border-color: #7A7A7A;
color: #FFFFFF;

-moz-box-sizing: border-box;
-webkit-box-sizing: border-box;
box-sizing: border-box;

cursor: pointer;
display: inline-block;
padding: 6px 12px;
margin-bottom: 0;
font-size: 14px;
font-weight: normal;
line-height: 1.428571429;
text-align: center;
white-space: nowrap;
vertical-align: middle;
cursor: pointer;
border: 1px solid #ccc;
    border-top-color: rgb(204, 204, 204);
    border-right-color: rgb(204, 204, 204);
    border-bottom-color: rgb(204, 204, 204);
    border-left-color: rgb(204, 204, 204);
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
-o-user-select: none;
user-select: none;

}
</style>

