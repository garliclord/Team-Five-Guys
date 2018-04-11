<?php include 'connection.php'; ?>
<?php 

$row = '';
if (isset($_GET['deviceid']))
	{
		
	$deviceid = $_GET['deviceid'];
		$deviceInfo = "SELECT * FROM devices where device_id =" .$deviceid;
		
	$result = mysqli_query($con, $deviceInfo);
	$row = mysqli_fetch_array($result);
	}

# to add devices


if (isset($_POST['btnAddDevice']))
{
	$device_name 	= $_POST['device_name'];
	$os_type 		= $_POST['os_type'];
	$device_type 	= $_POST['device_type'];
	$os_version 	= $_POST['os_version'];
	$ram 			= $_POST['ram'];
	$cpu 			= $_POST['cpu'];
	$bit 			= $_POST['bit'];
	$screen 		= $_POST['screen'];
	$grade 			= $_POST['grade'];
	$uuid 			= $_POST['uuid'];
	$hdndeviceId 	= $_POST['hdnDeviceId']; // this hidden field have device id from query string

	$sqlDevices = '';
	$queryStatus='';
	#TO UPDATE Query
	if($hdndeviceId != '') #If device id exist that means we are updating result
	{
		$sqlDevices = "UPDATE devices 
						SET name= '".$device_name."',os_type='".$os_type."',
							type='".$device_type."',os_version='".$os_version."',ram='".$ram."',
							cpu='".$cpu."',bit='".$bit."',screen_resolution='".$screen."',
							grade='".$grade."',uuid='".$uuid."'
							WHERE device_id =" .$hdndeviceId;
		echo $sqlDevices;
		#Write update Query
		$queryStatus = "Data updated successfully !!!";
	}
	else # We do not have device Id that means we are inserting.
	{

		# TO insert data in database
		$sqlDevices = "INSERT INTO devices (name, os_type, type, os_version, ram, cpu, bit, screen_resolution,
		 grade, uuid, assigned_to) VALUES ('".$device_name."', '".$os_type."', '".$device_type."', '".$os_version."', '".$ram."',
		'".$cpu."', '".$bit."', '".$screen."', '".$grade."','".$uuid."', 'None')";
		
		$queryStatus = "Data Inserted successfully !!!";
		
	}
 
	if(!mysqli_query($con, $sqlDevices))
		{
		echo '<div class="alert alert-danger">Unexpected error, please try again !!!</div>';
		}	
	else
		{	
		echo $queryStatus;
		header(  "refresh:0; url=LandingPage.php?message=".$queryStatus  );
		}		

}
?>

<!DOCTYPE html>  
<html>
<head>
    <title>Add or update devices</title>
	 <!-- Required meta tags -->
  <meta charset="utf-8">
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    

</head>
<body>
    <!-Add buttons -->
    
	
     
    <form name="form" action="add_devices.php" method="POST">    
     <h1>Add or Update Devices</h1>
        <table class="table">
          <tr>
            <td>Device Name:</td>
            <td><input type="text" name="device_name" value="<?php if(isset($row['name'])) echo $row['name']; ?>"> </td>
          </tr>
          <tr>
            <td>OS Type:</td>
            <td><input type="text" name="os_type" value="<?php if(isset($row['name'])) echo $row['os_type']; ?>"> </td>
          </tr>
          <tr>
            <td>Device Type:</td>
            <td><input type="text" name="device_type" value="<?php if(isset($row['name'])) echo $row['type']; ?>"> </td>
          </tr>
		  <tr>
            <td>OS Version:</td>
            <td><input type="text" name="os_version" value="<?php if(isset($row['name'])) echo $row['os_version']; ?>"> </td>
          </tr>
		  <tr>
            <td>RAM:</td>
            <td><input type="text" name="ram" value="<?php if(isset($row['name'])) echo $row['ram']; ?>"> </td>
          </tr>
		  <tr>
            <td>CPU:</td>
            <td><input type="text" name="cpu" value="<?php if(isset($row['name'])) echo $row['cpu']; ?>"> </td>
          </tr>
		  <tr>
            <td>BIT:</td>
            <td><input type="text" name="bit" value="<?php if(isset($row['name'])) echo $row['bit']; ?>"> </td>
          </tr>
		  <tr>
            <td>Screen Resolution:</td>
            <td><input type="text" name="screen" value="<?php if(isset($row['name'])) echo $row['screen_resolution']; ?>"> </td>
          </tr>
		  <tr>
            <td>Grade:</td>
            <td><input type="text" name="grade" value="<?php if(isset($row['name'])) echo $row['grade']; ?>"> </td>
          </tr>
		  <tr>
            <td>UUID:</td>
            <td><input type="text" name="uuid" value="<?php if(isset($row['name'])) echo $row['uuid']; ?>"> </td>
          </tr>
		  <!-- This hidden field used to send a device id to a variable as on submit btn click page gets reload and it looses query string -->
		  <input type="hidden" name="hdnDeviceId" value="<?php if(isset($_GET['deviceid'])) echo $_GET['deviceid']; ?>">
         
		  <button id="btnAddDevice" type="submit" name="btnAddDevice" class="btn" >Submit</button>
        </table>
        
     </form> 
	
</body>
</html>


 