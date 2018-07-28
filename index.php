<html>
<head>
    <title>
        Crowling Audio
    </title>
    <style>
form{
    background-color:magenta;
    padding:30px;
    font-size:20px;
    color:blue;
    font-weight: bold;
    text-align:center;
}
form:hover{
    background-color:white;
    color:black;
}
input{
    background-color:black;
    padding:20px;
    border-radius:10px;
    color:white;
    font-size:20px;
    border:none;
}
input:hover{
    background-color:white;
    color:blue;
}
    </style>
    </head>
<body>

<?php
$con=mysqli_connect('localhost','root','SNEHA143guddu','audio');
if($con){

echo"

<form action='' method='post' enctype='multipart/form-data'>
    Upload audio to Crowling:-
    <input type='file' name='fileToUpload' id='fileToUpload'>
    <input type='submit' value='Crowling' name='submit'>
</form>

</body>
</html>";

if(isset($_POST["submit"])){
    $time=date("Y_m_d_h_i_sa");
    $foldername="uploads/".$time;
    mkdir($foldername);
	$target_dir =$foldername."/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    
// Check if file already exists
if (file_exists($target_file)) {
    echo "<h1><center>Sorry, file already exists.</h1>";
    $uploadOk = 0;
}
// Check file size
// Allow certain file formats
if($imageFileType != "mp3") {
    echo "<h2><center>Sorry,Only MP3 files are allowed.</h2>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<h3><center>Sorry, your file was not uploaded.</h3>";
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
$sql="INSERT INTO `audio`(`name`, `ex`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`,`link`) VALUES ('$name','$ex','$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$p9','$p10','$filename')";

$result=mysqli_query($con,$sql);
if($result){
	echo"<script>alert('Crowling successfull');</script>";
    
}else{
	echo"<script>alert('fail to Crowling');</script>";
}






















       } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

}





}
?>