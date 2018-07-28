
<!DOCTYPE html>
<html>
<head>
<title>Search By Audio</title>
<style>
form{
	background-color:blue;
	padding:30px;
	color:white;
	border-radius: 20px;
	text-align:center;
	font-size:20px;
}
input:hover{
	background-color:blue;
	color:white;
}
form:hover{
	background-color:black;
	color:white;
	font-size:20px;
}
div{
	background-color:black;
	color:white;
	font-size:20px;
	padding:10px;
	width:70%;
	border-radius:9px;
}
div:hover{
	background-color:red;
	padding:10px;
	font-size:20px;
}input{
background-color:white;color:blue;padding:10px;font-size:20px;border:none;border-radius:4px;
}
</style>
	</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select Audio to Search:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Search" name="submit">
</form>

</body>
</html>
<?php
if(isset($_POST["submit"])){
$con=mysqli_connect('localhost','root','SNEHA143guddu','audio');


$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
// Check if file already exists
if (file_exists($target_file)) {
    echo "<h1><center>Nothing To Search</h1>";
    $uploadOk = 0;
}
// Check file size
// Allow certain file formats
if($imageFileType != "mp3") {
    echo "<script>alert('Sorry, only MP3 files are allowed');</script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<h2><marquee>Sorry,No file was uploaded.</marquee></h2>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {


$filename=$target_file;
$a=explode(".",$filename);
$ex=end($a);
$p1=base64_encode(file_get_contents($filename, FALSE, NULL,0,600));
$p2=base64_encode(file_get_contents($filename, FALSE, NULL,601,1200));
$p3=base64_encode(file_get_contents($filename, FALSE, NULL,1201,1800));
$p4=base64_encode(file_get_contents($filename, FALSE, NULL,1801,2400));
$p5=base64_encode(file_get_contents($filename, FALSE, NULL,2401,3000));
$p6=base64_encode(file_get_contents($filename, FALSE, NULL,3001,3600));
$p7=base64_encode(file_get_contents($filename, FALSE, NULL,3601,4200));
$p8=base64_encode(file_get_contents($filename, FALSE, NULL,4201,4800));
$p9=base64_encode(file_get_contents($filename, FALSE, NULL,4801,5400));
$p10=base64_encode(file_get_contents($filename, FALSE, NULL,5401,6000));
///////////////////////////////////////////////////////
$name=explode("/",$filename);
$name=end($name);

echo"<h3><center>Your Search is For Audio:- <font color='red'>".ucwords(htmlentities($name))."</font></h3><hr><center>";
$sql="SELECT * FROM audio WHERE  `name`LIKE '%$name%' OR `p1`LIKE '%$p1%' OR `p2`LIKE '%$p2%' OR`p3`LIKE '%$p3%' OR`p4`LIKE '%$p4%'OR`p5`LIKE '%$p5%'OR`p6`LIKE '%$p6%'OR`p7`LIKE '%$p7%'OR`p8`LIKE '%$p8%'OR`p9`LIKE '%$p9%'OR`p10`LIKE '%$p10%' OR `p1`LIKE '%$p2%'OR `p1`LIKE '%$p3%'OR `p1`LIKE '%$p4%'OR `p1`LIKE '%$p5%'OR `p1`LIKE '%$p6%'OR `p1`LIKE '%$p7%'OR `p1`LIKE '%$p8%'OR `p1`LIKE '%$p9%'OR `p1`LIKE '%$p10%'OR `p2`LIKE '%$p1%'OR `p2`LIKE '%$p1%'OR `p2`LIKE '%$p2%'OR `p2`LIKE '%$p3%'OR `p2`LIKE '%$p4%'OR `p2`LIKE '%$p5%'OR `p2`LIKE '%$p6%'OR `p2`LIKE '%$p7%'OR `p2`LIKE '%$p8%'OR `p2`LIKE '%$p9%'OR `p2`LIKE '%$p10%'OR `p3`LIKE '%$p1%'OR `p3`LIKE '%$p2%'OR `p3`LIKE '%$p3%'OR `p3`LIKE '%$p4%'OR `p3`LIKE '%$p5%'OR `p3`LIKE '%$p6%'OR `p3`LIKE '%$p7%'OR `p3`LIKE '%$p8%'OR `p3`LIKE '%$p9%'OR `p3`LIKE '%$p10%'OR `p4`LIKE '%$p1%'OR `p4`LIKE '%$p1%'OR `p4`LIKE '%$p2%'OR `p4`LIKE '%$p3%'OR `p4`LIKE '%$p4%'OR `p4`LIKE '%$p5%'OR `p4`LIKE '%$p6%'OR `p4`LIKE '%$p7%'OR `p4`LIKE '%$p8%'OR `p4`LIKE '%$p9%'OR `p4`LIKE '%$p10%' ORDER BY time DESC limit 100";
//---------------------------------------------------------------------------------Display Mails-------------------------------
$result=$con->query($sql);

if($result->num_rows>0){
  
 while($row=$result->fetch_assoc()){
 	$id=$row["id"];
 	$name=$row["name"];
 	$link=$row["link"];

 	echo"<div><b>Audio Name:-".ucwords(htmlentities($name))."<br><audio controls>
<source src='".$link."'type='audio/".$row['ex']."'></audio></div><br>
 	";

}
}

unlink($filename);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}




}
else{
	echo"<h1><center>Welcome to Search By Audio System.

	Nothing To Search....For any help,suggest,advice,query call or whatsapp +919547551208.<hr>
	Thanks for View<br>This system was Founded,Invent & Developed by Guddu Modok & his company</h1>";
}


?>