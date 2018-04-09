<?php include 'connection.php';?>
<?php 
  
# Region Assign User: This is to show whether or not device assigned successfully.
  if(isset($_GET["success"]) )
  {
    if($_GET["success"] == 'true')
    {
     echo '<div class="alert alert-success">Device has been assigned to user successfully !!!</div>';
    }
    else
    {
    echo '<div class="alert alert-danger">Unexpected error in assigning user, please try again !!!</div>';
    }
  
  }
  ## End Region Assign User
  
  # This function returns devices based on control selection.
 function fill_devices($con)  
 {  
     $whereConditionOsVer='';
     $whereConditionPer='';
     $os=' ';
     $vars = array();
  
  $queryS=$_SERVER['QUERY_STRING']; #Takes query string from URL
  
     if($_SERVER['QUERY_STRING'] != '')
    {
      
      $cntOSVer=0;
      $cntperformance=0;
	  
	  #This forloop accessing query string in key pair set and returning values for each key given
    foreach (explode('&', $queryS) as $pair) 
      {
          list($key, $value) = explode('=', $pair);
          $vars[] = array(urldecode($key), urldecode($value));
      	
        	# where query for multiple Os Versions
        	if($key == 'os_ver')
        	{
          		if($cntOSVer == 0)
          		{
          			$whereConditionOsVer .= " and (os_version like '".$value."%'";
          		}
          		else
          		{
          			$whereConditionOsVer .= "  or os_version like  '" .$value."%'";
          		}
        		
        		    $cntOSVer = $cntOSVer+1;
        	}
        	# where query for multiple performances
        	if($key == 'dgrade')
        	{
          		if($cntperformance == 0)
          		{
          			$whereConditionPer=" and (grade like '".$value."%'";
          		}
          		else
          		{
          			$whereConditionPer .= "  or grade like  '" .$value."%'";
          		}
        		
        		    $cntperformance = $cntperformance+1;
        	}
      	
        	if($key == 'os')
        	{
        		$os = $value;
        	}
      }
  
     $sql='';
   
   # If device is 'IOS' or 'Android' then query in DB
     if($os != '' && ($os == 'ios' || $os == 'android'))
     {	
    	$sql = "SELECT * FROM devices WHERE os_type like '".$_GET["os"]."'";   
     }
     
	 
     else if($os != '' and $os == 'other')
     {
    	 $sql="SELECT * FROM devices WHERE os_type != 'IOS' and os_type != 'Android'";
     }
	 #This condition will handle 'All'
     else
     {
    	 $sql = "SELECT * FROM devices  where 1";
     }
     
	 #If we have selected OS version/ Performance then only append condition in main query
    if($whereConditionOsVer != '')
          $sql .= $whereConditionOsVer . ')';
  
  
  
     if($whereConditionPer != '')
    	   $sql .= $whereConditionPer .')';
  # to be removed from final version
  	echo $sql;
  	
	#Trigger query in DB
  	$result=mysqli_query($con,$sql);
  	
  	 $output ='';
  	 $cnt=1;
	 
	 $output .= '<table class="table" id="deviceTbl">
        <tr>
            <th>Device Name</th>
            <th>OS Type</th>
            <th>Type</th>
            <th>OS Version</th>
            <th>Ram</th>
            <th>CPU</th>
            <th>Bit</th>
            <th>Screen Resolution</th>
            <th>Grade</th>
            <th>UUID</th>
            <th>Assigned to</th>
        </tr>';
		
  	 #Fetch result in while
        while($row = mysqli_fetch_array($result))  
          {  
              $id = $row['device_id'];
              $name = $row['name'];
              $os_type = $row['os_type'];
              $type = $row['type'];
              $os_version = $row['os_version'];
              $ram = $row['ram'];
              $cpu = $row['cpu'];
              $bit = $row['bit'];
              $screen_resolution = $row['screen_resolution'];
              $grade = $row['grade'];
              $uuid = $row['uuid'];
              $assigned_to = $row['assigned_to'];
              
              $output .= '<tr>';
              
              $output .=  '<td ><a href=assignUser.php?deviceid='.$id.'>'.$name.'</a></td>';
              $output .=  '<td>' . $os_type . '</td>';
              $output .=  '<td>' . $type . '</td>';
              $output .=  '<td>' . $os_version . '</td>';
              $output .=  '<td>' . $ram . '</td>';
              $output .=  '<td>' . $cpu . '</td>';
              $output .=  '<td>' . $bit . '</td>';
              $output .=  '<td>' . $screen_resolution . '</td>';
              $output .=  '<td>' . $grade . '</td>';
              $output .=  '<td >' . $uuid . '</td>';
              $output .=  '<td>' . $assigned_to . '</td>';
              $output .= '</tr>';
              
          }  
        
        return $output;  
    } 
 }

 ?>  
