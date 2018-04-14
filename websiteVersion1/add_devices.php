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
	$device_name 	= trim($_POST['device_name']);
	$os_type 		= trim($_POST['os_type']);
	$device_type 	= trim($_POST['device_type']);
	$os_version 	= trim($_POST['os_version']);
	$ram 			= trim($_POST['ram']);
	$cpu 			= trim($_POST['cpu']);
	$bit 			= trim($_POST['bit']);
	$screen 		= trim($_POST['screen']);
	$grade 			= trim($_POST['grade']);
	$uuid 			= trim($_POST['uuid']);
	$hdndeviceId 	= trim($_POST['hdnDeviceId']); // this hidden field have device id from query string

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
		#echo $sqlDevices;
		#Write update Query
		$queryStatus = "Data updated successfully !!!";
	}
	else # We do not have device Id that means we are inserting.
	{

		# TO insert data in database
		$sqlDevices = "INSERT INTO devices (name, os_type, type, os_version, ram, cpu, bit, screen_resolution,
		 grade, uuid, assigned_to) VALUES ('".$device_name."', '".$os_type."', '".$device_type."', '".$os_version."', '".$ram."',
		'".$cpu."', '".$bit."', '".$screen."', '".$grade."','".$uuid."', 'Assign')";
		
		$queryStatus = "Device added successfully !!!";
		
	}
 
	if($device_name == '')
		{
		echo '<div class="alert alert-danger">Please Enter Device Name !!!</div>';
		}	
	else  if(!mysqli_query($con, $sqlDevices))
		{
		echo '<div class="alert alert-danger">Unexpected error, please try again !!!</div>';
		}	
	else
		{	
		header(  "refresh:0; url=index.php?message=".$queryStatus  );
		}		

}
?>

<!DOCTYPE html>  
<html>
<head>
    <title>Cerebral fix device management</title>
	 <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    
	

</head>
<body>
	<div class="container-fluid">
    <!-Add buttons -->
    
	
	
     
    <form name="form" action="add_devices.php" method="POST">    
     <h1>Add or Update Devices</h1>
        <table class = "table">
          <tr>
            <td width="20%" ><h6>Device Name:</h6></td>
            <td><input type="text" name="device_name" value=" <?php if(isset($row['name'])) echo $row['name']; ?>"</td>
          </tr>
          <tr>
            <td><h6>OS Type:</h6></td>
            <td><input type="text" name="os_type" value="<?php if(isset($row['name'])) echo $row['os_type']; ?>"> </td>
          </tr>
          <tr>
            <td><h6>Device Type:</h6></td>
            <td><input type="text" name="device_type" value="<?php if(isset($row['name'])) echo $row['type']; ?>"> </td>
          </tr>
		  <tr>
            <td><h6>OS Version:</h6></td>
            <td><input type="text" name="os_version" value="<?php if(isset($row['name'])) echo $row['os_version']; ?>"> </td>
          </tr>
		  <tr>
            <td><h6>RAM:</h6></td>
            <td><input type="text" name="ram" value="<?php if(isset($row['name'])) echo $row['ram']; ?>"> </td>
          </tr>
		  <tr>
            <td><h6>CPU:</h6></td>
            <td><input type="text" name="cpu" value="<?php if(isset($row['name'])) echo $row['cpu']; ?>"> </td>
          </tr>
		  <tr>
            <td><h6>BIT:</h6></td>
            <td><input type="text" name="bit" value="<?php if(isset($row['name'])) echo $row['bit']; ?>"> </td>
          </tr>
		  <tr>
            <td><h6>Screen Resolution:</h6></td>
            <td><input type="text" name="screen" value="<?php if(isset($row['name'])) echo $row['screen_resolution']; ?>"> </td>
          </tr>
		  <tr>
            <td><h6>Grade:</h6></td>
            <td><input type="text" name="grade" value="<?php if(isset($row['name'])) echo $row['grade']; ?>"> </td>
          </tr>
		  <tr>
            <td><h6>UUID:</h6></td>
            <td><input type="text" name="uuid" value="<?php if(isset($row['name'])) echo $row['uuid']; ?>"> </td>
          </tr>
		  <!-- This hidden field used to send a device id to a variable as on submit btn click page gets reload and it looses query string -->
		  <input type="hidden" name="hdnDeviceId" value="<?php if(isset($_GET['deviceid'])) echo $_GET['deviceid']; ?>">
         
		  
        <div class="row">
            <div class="col-sm-12 add-search-btns" style="margin-bottom:10px;">
                <button id="btnAddDevice" type="submit" name="btnAddDevice" class="btn btn-primary" >Submit</button>
				<button type="button" class="btn btn-primary" id="add-device-btn" onclick = "location.href='index.php';">Cancel</button>
		</div>
        </div>
		
		</table>
		<hr>
        
     </form> 
	</div>
</body>
</html>


 