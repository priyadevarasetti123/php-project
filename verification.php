<html>
<head>
<title>Login page</title>
<style>
body {

  background: url(bg.jpg) no-repeat center fixed;
  background-attachment: fixed;
  background-size: cover;
  overflow-y: scroll padding-bottom:10px;

}
.layer{
	max-width:70em;
	margin:0 auto;
}

ul.header {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
	top:200px;

}

li {
    float: left;
}

li a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
	}
.content {
    display:table;
    width:100%;
    font-size:16pt;
    background:#fff;
}
.cell {
    display:table-cell;
    vertical-align:middle;
    padding:1em;
}
.cell.nav {
    width:40%;
    text-align:right;
}
.cell.mat {
    width:60%;
}
.nav form {
    display:inline-table;
    list-style-type:square;
    border:8px ridge chocolate;
    box-shadow:10px 10px 5px #888;
    background-repeat:no-repeat;
    background-size:100% 100%;
    text-align:left;
    padding:.75em 1em .75em 2em;
    margin:.5em 0;
	color: black;
}


</style>

</head>
<body background : url(bg.jpg) >
<img src="logo.jpg" class="logo" style="float:right;width:50px;height:50px">
<div class="layer">
<div align='center' style="background-color:#D3D3D3; width:800px;">
<table>
<ul class="header">
  <td><li><a class="active" href="index.html">Login</a></li><td>
</ul>
</table>
</div>
<div  style="background:#D3D3D3; width:800px; height:1080px;">
<h1 align="center"> Course Search Page</h1>
<div class="content">
<?php
$uname = $_POST['email'];
$pass  = $_POST['password'];
if($uname=='' || $pass=='')
{
    header("Location:index.html?id=Some fields are empty");
	echo "feilds are missing";
}
else
{
$host="localhost";
$username="5717g08";
$word="9440";
$db_name="5717f16dbg08";
$connection=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");//connection string
$sql   = "SELECT * FROM login WHERE email like '$uname' AND password like '$pass' ";
echo "$sql";
$qry=mysqli_query($connection, $sql) or die ("ERROR: " .mysqli_error($connection) . " (query was $sql)");
if(!$qry) {
    die("Query Failed: ". mysqli_error());

} else {
   $row = mysqli_fetch_array($qry);
      $count = mysqli_num_rows($qry);
      if($count == 1) {
         header("location: search.php");
      }else {
         $error = "Your Login Name or Password is invalid";
	echo '<br>'.$error;
      }
}
}
?>
</div>
</div>
</body>
</html>
