<?php

$search_param=$_POST["search"];
$search_area=$_POST["area"];


// Connect to database
$dbpass = "Hackveda_doc@123";
$host ="localhost";
$dbuser ="id20877140_hackveda_doctor";
$dbname = "id20877140_hackveda_doctor";



$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

$sql = "SELECT ID, DoctorName, DoctorInformation, DoctorImage from
doctors where DoctorArea like '%".$search_area."%' and DoctorCategory like '%".$search_param."%'";

 



$result = $conn->query($sql);
 $doctor_data="";
if($result->num_rows > 0){
 
    $data=' <div class="easy-steps-to">Doctors Found in your area!!</div>';
  
 while($row = $result->fetch_assoc()){
$doctorid = $row["ID"];
$doctorname = $row["DoctorName"];
$doctorinfo = $row["DoctorInformation"];
$doctorimage = $row["DoctorImage"];



$doctor_data .= '<div class="result" >';
$doctor_data .= '<img class="image-3-icon" alt="" src="'.$doctorimage.'" />';
$doctor_data .= '<div class="search-doctor single-line">'.$doctorname.'</div>';
$doctor_data .= '<div class="h single-line">'.$doctorinfo.'</div>';
$doctor_data .= '</div>';




 }



}

else
{
   $data=' <div class="easy-steps-to">No doctors found in your area!!!</div>';
    

}

$data=$data.$doctor_data;

echo $data;
?>