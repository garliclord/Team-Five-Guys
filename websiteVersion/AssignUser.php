  <?php include 'connection.php';?>
  <?php

  
 # Get all user from db and show in drop down.
  	function getUser($con)
   {
        $output = '';
        $sql = "SELECT * FROM users";
        $result = mysqli_query($con, $sql);       
        while($row = mysqli_fetch_array($result))
        {
             $output .= '<option value="'.$row["user_id"].'">'.$row["name"].'</option>';
        }	
        return $output;
   }
   
   # Assign device to user
     if (isset($_POST['btnAssignUser']))
   {       
      $userID= $_POST["userid"];
      $deviceID= $_POST["hdndeviceid"];
      $username= $_POST["hdnSelectedUser"];
         
        $sqlUser = "insert into device_assigned (devices_id,user_id) 
        VALUES ('".$userID."','".$deviceID."')";
    		   		   
        $sqlDevices = "Update devices set assigned_to ='".$username."' where device_id = ".$deviceID;
          
        if(!mysqli_query($con, $sqlUser) || !mysqli_query($con, $sqlDevices))
			{
				echo $sqlUser."Something went wrong !!!.";
			}	
		else
			{
				echo "Inserted succesfully";
				header("refresh:0; url=LandingPage.php?message=User has been assigned successfully");
			}		
   } 
 ?>
 

<!DOCTYPE html>  
<html>
<head>
    <title>Title of the site</title>
	 <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
 <script>
 
 function ChangeUser(control) 
	{
		 if(control.value == 0)
		 {
			 alert("Please select user to assign");
			 return false;
		 }
		document.getElementById("hdnSelectedUser").value = control.options[control.selectedIndex].innerHTML; 
	}
</script>
</head>
<body>
       
<form action ="AssignUser.php" method="post">

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Device</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php if(isset($_GET['name'])) echo $_GET['name']; ?></p>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">User</label>
    <div class="col-sm-4">	
	<select name="userid" id="userid" onchange="ChangeUser(this)">  
		  <option value="0">Show All Users</option>  
		  <!-- Used getUser($con) php function to return all users -->
		  <?php echo getUser($con); ?>  
	 </select> 
    </div>
  </div>
  
  <button type="Submit" class="btn btn-secondary" name="btnAssignUser" >Assign Device</button>
  
  <!-- Hidden field use to send silent information from one page to other. Specially when we do not want to display that  --> 
<input type="hidden" name="hdndeviceid" id="hdndeviceid" value="<?php echo $_GET["deviceid"];?>" />
<input type="hidden" name="hdnSelectedUser" id="hdnSelectedUser"  />

</form>
 
</body>
</html>