  <?php include 'connection.php';?>
  <?php

   if(isset($_GET["message"]))
    {
     echo '<div class="alert alert-danger">'.$_GET["message"].'</div>';
    }
  
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
    $deviceName = isset($_GET["name"]) ? $_GET["name"] : '';
     if (isset($_POST['btnAssignUser']))
   {       
      $userID= $_POST["userid"];
      $deviceID= $_POST["hdndeviceid"];
	  $deviceName = $_POST["hdnDeviceName"];
      $selectedUsername= $_POST["hdnSelectedUser"];
	  $newUser = ucwords($_POST["newUser"]);
	  $userToInsert = '';
	  $sqlUser = '';
	  
	  if($newUser =='' && $selectedUsername == '')
	  {
		  header('refresh:0; url=AssignUser.php?deviceid='.$deviceID.'&name='.$deviceName.'&message=Please select user to assign or enter new user.');
		  echo '<div class="alert alert-danger">Please select user to assign or enter new user.</div>';
	  }

	  else
	  {
		  if ($newUser!='')
		  {
			  $userToInsert = $newUser;
			  $sqlUser = "insert into users (name) VALUES ('".$userToInsert."')";
		  }
		  else
		  {	  
			  $userToInsert = $selectedUsername;
		  }
		   
			$sqlDevices = "Update devices set assigned_to ='".$userToInsert."' where device_id = ".$deviceID;
			  
			if($sqlUser!='' && !mysqli_query($con, $sqlUser) || !mysqli_query($con, $sqlDevices))
				{
					echo '<div class="alert alert-danger">Unexpected error, please try again !!!</div>';
				}	
			
			else
				{
					echo "Inserted succesfully";
					header("refresh:0; url=index.php?message=User has been assigned successfully");
				}
	  }
   }
 ?>
 

<!DOCTYPE html>  
<html>
<head>
    <title>Cerebral fix device management</title>
	 <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
 <script>
 
 function validate() 
 {	
	var e = document.getElementById("userid");
	var strUser = e.options[e.selectedIndex].value;
	if(strUser == '0')
	{
		window.location.href='INDEX.php';
	}
 }
 
 function ChangeUser(control) 
	{
		document.getElementById("hdnSelectedUser").value = control.options[control.selectedIndex].innerHTML; 
	}
</script>
</head>
<body>
       
<form action ="AssignUser.php" method="post" class = "form-group">

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Device</label>
    <div class="col-sm-10">
      <p class="form-control-static"><?php echo $deviceName; ?></p>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">User</label>
    <div class="col-sm-4">	
	<select name="userid" id="userid" onchange="ChangeUser(this)">  
		  <option value="0">Select to assign user</option>  
		  
		  <!-- Used getUser($con) php function to return all users -->
		  <?php echo getUser($con); ?> 
	 </select> 
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Assign to new user</label>
    <div class="col-sm-5">
      <input type="text" name="newUser" value="" id="newUser" autocomplete="off"> 
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 add-search-btns" style="margin-top:10px;">
          <button type="Submit" class="btn btn-primary" name="btnAssignUser" id="btnAssignUser" onclick="validate()" >Assign Device</button>
		  <button type="button" class="btn btn-primary" id="add-device-btn" onclick = "location.href='INDEX.php';">Cancel</button>
  </div>
  
  
  <!-- Hidden field use to send silent information from one page to other, as we do not want to display that to user --> 
<input type="hidden" name="hdndeviceid" id="hdndeviceid" value="<?php echo $_GET["deviceid"];?>" />
<input type="hidden" name="hdnSelectedUser" id="hdnSelectedUser"  />
<input type="hidden" name="hdnDeviceName" id="hdnDeviceName" value= <?php if(isset($_GET['name'])) echo $_GET['name']; ?>  />

</form>
 
</body>
</html>