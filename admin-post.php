<?php


$to = $_POST['emailAddress'];

$subject = $_POST['title']. " " . $_POST['givenName']. " " . $_POST['surname']. " " . "Thanks for submitting the enrolment form";

$txt = "Hello " . $_POST['givenName'].","."\r\n" ."\r\n" ."\r\n" .
"Thanks for submitting an enrolment form. We have now received your information!" ."\r\n" . "\r\n" ."\r\n" .
"Your Name: " . $_POST['givenName']. " " . $_POST['surname']."\r\n" ."\r\n" .
"Your email: " . $_POST['emailAddress'] ."\r\n" ."\r\n" .
"Your Course: " . $_POST['section'] ."\r\n" ."\r\n" .
"Intake Date: " . $_POST['division'] ."\r\n" ."\r\n" ."\r\n" .
"We will get back to you shortly once we confirm all the details. Until then, you can give us a call anytime at  or email info@.edu.au." ."\r\n"."\r\n".
"Best regards," ."\r\n".
"";


$headers = "From: info@.edu.au" . "\r\n" .
"CC: hostmaster@.edu.au" . "\r\n" . "CC: info@.edu.au" . "\r\n" . "CC: finance@.edu.au";

mail($to,$subject,$txt,$headers);


$service_url = 'https://admin.axcelerate.com.au/api/contact/';


	  // Token data hidden on your server
$_WSTOKEN = '';
$_APITOKEN = '';


$headers = array(
    'wstoken: '.$_WSTOKEN, 
    'apitoken: '.$_APITOKEN,
);


$curl_post_data = array(
    'title' => ($_POST['title']),
    'givenName' => ($_POST['givenName']),
    'middleName' => ($_POST['middleName']),
    'surname' => ($_POST['surname']),
    'dob' => ($_POST['dob']),
    'sex' => ($_POST['sex']),
    'CountryofBirthID' => ($_POST['CountryofBirthID']),
    'CountryofCitizenID' => ($_POST['CountryofCitizenID']),
    'customField_onshoreoroffshore' => ($_POST['customField_onshoreoroffshore']),
    'passportNumber' => ($_POST['passportNumber']),
    'customField_usinumber' => ($_POST['customField_usinumber']),
    'emailAddress' => ($_POST['emailAddress']),
    'mobilephone' => ($_POST['mobilephone']),
    'unitNo' => ($_POST['unitNo']),
    'streetNo' => ($_POST['streetNo']),
    'streetName' => ($_POST['streetName']),
    'city' => ($_POST['city']),
    'state' => ($_POST['state']),
    'postcode' => ($_POST['postcode']),
    'HighestSchoolLevelID' => ($_POST['HighestSchoolLevelID']),
    'HighestSchoolLevelYear' => ($_POST['HighestSchoolLevelYear']),
    'PriorEducationStatus' => ($_POST['PriorEducationStatus']),
    'PriorEducationIDs' => ($_POST['PriorEducationIDs']),
    'AtSchoolName' => ($_POST['AtSchoolName']),
    'customField_english' => ($_POST['customField_english']),
    'customField_englishtesttypeandscore' => ($_POST['customField_englishtesttypeandscore']),
    'EnglishProficiencyID' => ($_POST['EnglishProficiencyID']),
    'EmergencyContact' => ($_POST['EmergencyContact']),
    'EmergencyContactRelation' => ($_POST['EmergencyContactRelation']),
    'EmergencyContactPhone' => ($_POST['EmergencyContactPhone']),
    'LabourForceID' => ($_POST['LabourForceID']),
    'DisabilityFlag' => ($_POST['DisabilityFlag']),
    'DisabilityTypeIDs' => ($_POST['DisabilityTypeIDs']),
    'IndigenousStatusID' => ($_POST['IndigenousStatusID']),
    'StudyReason' => ($_POST['StudyReason']),
    'customField_hearus' => ($_POST['customField_hearus']),
    'categoryIDs' => ($_POST['categoryIDs']),
    'section' => ($_POST['section']),
    'division' => ($_POST['division'])
);


$curl = curl_init($service_url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);

$curl_response = curl_exec($curl);


if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);


$decoded = json_decode($curl_response, true);





$service_url2 = 'https://admin.axcelerate.com.au/api/contact/portfolio';
        


     
        if ($_FILES['addFile1']['size'][0] != 0){
        $curl_post_data2 = array(
            'contactID' => $decoded['CONTACTID'],
            'portfolioChecklistID' => '724',
            'portfolioType' => 'Passport',
            'portfolioTypeID' => '15705',
            'portfolioID' => '0',
            );}
			
			
        if ($_FILES['addFile2']['size'][0] != 0){    
         $curl_post_data9 = array(
            'contactID' => $decoded['CONTACTID'],
            'portfolioChecklistID' => '724',
            'portfolioType' => 'English Proficiency Document',
            'portfolioTypeID' => '15702',
            'portfolioID' => '0'
        );}
		
       if ($_FILES['addFile3']['size'][0] != 0){ 
        $curl_post_data8 = array(
            'contactID' => $decoded['CONTACTID'],
            'portfolioChecklistID' => '724',
            'portfolioType' => 'Academic History',
            'portfolioTypeID' => '15712',
            'portfolioID' => '0'
           
        );}  
		if ($_FILES['addFile4']['size'][0] != 0){
		$curl_post_data7 = array(
            'contactID' => $decoded['CONTACTID'],
            'portfolioChecklistID' => '724',
            'portfolioType' => 'Visa',
            'portfolioTypeID' => '15706',
            'portfolioID' => '0'
        );}  
		
	    if ($_FILES['addFile5']['size'][0] != 0){	
        $curl_post_data6 = array(
           'contactID' => $decoded['CONTACTID'],
            'portfolioChecklistID' => '724',
            'portfolioType' => 'Other support documents',
            'portfolioTypeID' => '23520',
            'portfolioID' => '0'
        );} 
        
          $curl_post_data5 = array(
           'contactID' => $decoded['CONTACTID'],
            'portfolioChecklistID' => '724',
            'portfolioType' => 'Application for Enrolment',
            'portfolioTypeID' => '15701',
            'portfolioID' => '0'
        );  
        


$curl2 = curl_init($service_url2);
$curl9 = curl_init($service_url2);
$curl8 = curl_init($service_url2);
$curl7 = curl_init($service_url2);
$curl6 = curl_init($service_url2);
$curl5 = curl_init($service_url2);


curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl2, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl2, CURLOPT_POSTFIELDS, $curl_post_data2);

curl_setopt($curl9, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl9, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl9, CURLOPT_POSTFIELDS, $curl_post_data9);

curl_setopt($curl8, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl8, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl8, CURLOPT_POSTFIELDS, $curl_post_data8);

curl_setopt($curl7, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl7, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl7, CURLOPT_POSTFIELDS, $curl_post_data7);

curl_setopt($curl6, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl6, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl6, CURLOPT_POSTFIELDS, $curl_post_data6);

curl_setopt($curl5, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl5, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl5, CURLOPT_POSTFIELDS, $curl_post_data5);


$curl_response2 = curl_exec($curl2);
$curl_response9 = curl_exec($curl9);
$curl_response8 = curl_exec($curl8);
$curl_response7 = curl_exec($curl7);
$curl_response6 = curl_exec($curl6);
$curl_response5 = curl_exec($curl5);



if ($curl_response2 === false) {
    $info2 = curl_getinfo($curl2);
    curl_close($curl2);
    die('error occured during curl exec. Additioanl info: ' . var_export($info2));
}

curl_close($curl2);




$decoded2 = json_decode($curl_response2, true);

$decoded9 = json_decode($curl_response9, true);

$decoded8 = json_decode($curl_response8, true);

$decoded7 = json_decode($curl_response7, true);

$decoded6 = json_decode($curl_response6, true);

$decoded5 = json_decode($curl_response5, true);





$service_url3 = 'https://admin.axcelerate.com.au/api/contact/portfolio/file';



$file_data =

"Automated Enrolment Form submitted via  online enrolment form "."\r\n" ."\r\n" ."\r\n" ."\r\n" .


"Personal Details" ."\r\n" . "\r\n" ."\r\n" .

"Title: " . $_POST['title']."\r\n" ."\r\n" .
"Your Name: " . $_POST['givenName']. " " . $_POST['surname']."\r\n" ."\r\n" .
"DOB: " . $_POST['dob']."\r\n" ."\r\n" .
"Gender: " . $_POST['sex']."\r\n"."\r\n" .
"Passport Number: " . $_POST['passportNumber']."\r\n" ."\r\n" .
"USI Number: " . $_POST['customField_usinumber']."\r\n" ."\r\n" ."\r\n" .



"Contact Details" ."\r\n" . "\r\n" ."\r\n" .

"Email Address: " . $_POST['emailAddress']."\r\n" ."\r\n" .
"Mobile Phone: " . $_POST['mobilephone'] ."\r\n" ."\r\n" .
"Address: " . $_POST['unitNo']. " " . $_POST['streetNo']. " " .$_POST['streetName']. " " . $_POST['city']. " " .$_POST['state']. " " . $_POST['postcode']."\r\n" ."\r\n" ."\r\n" .


"Course Details" ."\r\n" . "\r\n" ."\r\n" .


"Your Course: " . $_POST['section'] ."\r\n" ."\r\n" .
"Intake Date: " . $_POST['division'] ."\r\n" ."\r\n" .


"Additional Details" ."\r\n" . "\r\n" ."\r\n" .

"OnShore or Offshore: " .$_POST['customField_onshoreoroffshore']."\r\n" ."\r\n" .
"Emergency: " . $_POST['EmergencyContact']. " " . $_POST['EmergencyContactRelation']. " " .$_POST['EmergencyContactPhone']."\r\n" ."\r\n" .
"Disable: " . $_POST['DisabilityFlag']."\r\n" ."\r\n" ."\r\n" .



"<b>Refund Policy & Declation</b>" ."\r\n" . "\r\n" ."\r\n" .


"I have read and understood the Conditions of Enrolment and International Student Refund Policy on the our website." ."\r\n"."\r\n".$_POST['agree'] ." above statements and submit my signature upon my application but not store on system"."\r\n";







$file = uniqid() . '.txt';   

$buffer = file_get_contents($file) . "\n" . $file_data;



$success = file_put_contents($file, $buffer);   



$filePath6 = $file;
$type6 = 'text/plain';
$fileName6 = $file;
        
            $curl_post_data55 = array(
            'contactID' => $decoded['CONTACTID'],
            'portfolioID' => $decoded5['PORTFOLIOID'],
             'portfolioType' => 'Application for Enrolment',
            'portfolioTypeID' => '15701',
            'addFile' => curl_file_create($filePath6, $type6, $fileName6)
            
        );  
        
 
 $curl55 = curl_init($service_url3);


curl_setopt($curl55, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl55, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl55, CURLOPT_POSTFIELDS, $curl_post_data55);


curl_exec($curl55);
 
 
 
 
 

if(count($_FILES["addFile1"])>0)
 { 

  for($j=0; $j < count($_FILES["addFile1"]['name']); $j++)
 { //loop the uploaded file array
   
   
   $filePath = $_FILES["addFile1"]['tmp_name']["$j"];
   $type = $_FILES['addFile1']['type']["$j"];
   $fileName = $_FILES["addFile1"]['name']["$j"]; 


   $curl_post_data3 = array(
            'contactID' => $decoded['CONTACTID'],
            'portfolioID' => $decoded2['PORTFOLIOID'],
            'portfolioType' => 'Passport',
            'portfolioTypeID' => '15705',
            'addFile' => curl_file_create($filePath, $type, $fileName)
           
            
        );  

$curl3 = curl_init($service_url3);


curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl3, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl3, CURLOPT_POSTFIELDS, $curl_post_data3);


curl_exec($curl3);


  }}
  
  
  
  
  
  if(count($_FILES["addFile2"])>0)
 { 

  for($j=0; $j < count($_FILES["addFile2"]['name']); $j++)
 { //loop the uploaded file array
   
   
   $filePath2 = $_FILES["addFile2"]['tmp_name']["$j"];
   $type2 = $_FILES['addFile2']['type']["$j"];
   $fileName2 = $_FILES["addFile2"]['name']["$j"]; 


  $curl_post_data99 = array(
            'contactID' => $decoded['CONTACTID'],
            'portfolioID' => $decoded9['PORTFOLIOID'],
            'portfolioType' => 'English Proficiency Document',
            'portfolioTypeID' => '15702',
            'addFile' => curl_file_create($filePath2, $type2, $fileName2)
            
        );  

$curl99 = curl_init($service_url3);


curl_setopt($curl99, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl99, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl99, CURLOPT_POSTFIELDS, $curl_post_data99);

curl_exec($curl99);


  }}
  
  
  
  
  
  
  if(count($_FILES["addFile3"])>0)
 { 

  for($j=0; $j < count($_FILES["addFile3"]['name']); $j++)
 { //loop the uploaded file array
   
   
   $filePath3 = $_FILES["addFile3"]['tmp_name']["$j"];
   $type3 = $_FILES['addFile3']['type']["$j"];
   $fileName3 = $_FILES["addFile3"]['name']["$j"]; 


  $curl_post_data88 = array(
            'contactID' => $decoded['CONTACTID'],
            'portfolioID' => $decoded8['PORTFOLIOID'],
            'portfolioType' => 'Academic History',
            'portfolioTypeID' => '15712',
            'addFile' => curl_file_create($filePath3, $type3, $fileName3)
            
        );  

$curl88 = curl_init($service_url3);


curl_setopt($curl88, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl88, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl88, CURLOPT_POSTFIELDS, $curl_post_data88);


curl_exec($curl88);


  }}
  
  
  
  
  
  
  if(count($_FILES["addFile4"])>0)
 { 

  for($j=0; $j < count($_FILES["addFile4"]['name']); $j++)
 { //loop the uploaded file array
   
   
   $filePath4 = $_FILES["addFile4"]['tmp_name']["$j"];
   $type4 = $_FILES['addFile4']['type']["$j"];
   $fileName4 = $_FILES["addFile4"]['name']["$j"]; 


   $curl_post_data77 = array(
            'contactID' => $decoded['CONTACTID'],
            'portfolioID' => $decoded7['PORTFOLIOID'],
            'portfolioType' => 'Visa',
            'portfolioTypeID' => '15706',
            'addFile' => curl_file_create($filePath4, $type4, $fileName4)
            
        );  
        

$curl77 = curl_init($service_url3);


curl_setopt($curl77, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl77, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl77, CURLOPT_POSTFIELDS, $curl_post_data77);


curl_exec($curl77);


  }}
  
  
  
  
  
  
  if(count($_FILES["addFile5"])>0)
 { 

  for($j=0; $j < count($_FILES["addFile5"]['name']); $j++)
 { //loop the uploaded file array
   
   
   $filePath5 = $_FILES["addFile5"]['tmp_name']["$j"];
   $type5 = $_FILES['addFile5']['type']["$j"];
   $fileName5 = $_FILES["addFile5"]['name']["$j"]; 


    $curl_post_data66 = array(
            'contactID' => $decoded['CONTACTID'],
            'portfolioID' => $decoded6['PORTFOLIOID'],
            'portfolioType' => 'Other support documents',
            'portfolioTypeID' => '23520',
            'addFile' => curl_file_create($filePath5, $type5, $fileName5)
        );  
        


$curl66 = curl_init($service_url3);


curl_setopt($curl66, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl66, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl66, CURLOPT_POSTFIELDS, $curl_post_data66);


curl_exec($curl66);


  }}


if ($curl_response3 === false) {
    $info3 = curl_getinfo($curl3);
    curl_close($curl3);
    die('error occured during curl exec. Additioanl info: ' . var_export($info3));
}

curl_close($curl3);


$decoded3 = json_decode($curl_response3, true);



if (isset($decoded3->response->status) && $decoded3->response->status == 'ERROR') {
    die('error occured: ' . $decoded3->response->errormessage);
}

unlink($file);

header("Location: https://.edu.au/thanks-for-the-enrolment/");

?>
