<?php

$search_param=$_POST["search"];
$search_area=$_POST["area"];


// Connect to database

$host = "localhost";
$dbuser = "hackveda_doctor;
$dbpass = "abcde12345";
$dbname = "hackveda_doctor";

 

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

$sql = "SELECT ID, DoctorName, DoctorInformation, DoctorImage from
doctors where DoctorArea like '%".$search_area."%' and DoctorCategory
like '%".$search_param."%'";

 



$result = $conn->query($sql);

if($result->num_rows > 0){

 while($row = $result->fetch_assoc()){
$doctorid = $row["ID"];
$doctorname = $row["DoctorName"];
$doctorinfo = Srow["DoctorInformation"];
$doctorimage = $row["DoctorImage"];

 

$doctor_data["DocName"} = $doctorname;
$doctor_data["DocInfo"] = $docinfo;
$doctor_data["DocImage"] = $doctorimage;



$data[$doctorid] = $doctor_data;
 }

$data["Result"]="True";
$data["Message"]="Dcotors fetched succesfully";

}

else
{
    $data["Result"]="False";
    $data["Message"]="No Doctors Found";
    

}
?>