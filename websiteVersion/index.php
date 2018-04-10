<?php include 'ShowDevices.php';?>

<!DOCTYPE html>
<html>
<head>
    <title>Title of the site</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script>
        // Javascript to hide and show os buttons
        function showAddDevice() {
            document.getElementById("addDevices").style.display = "block";
        }

        function showAll() {
            document.getElementById("iosVersion").style.display = "none";
            document.getElementById("androidVersion").style.display = "none";
        }

        function showiOSVersion() {
            document.getElementById("iosVersion").style.display = "block";
            document.getElementById("androidVersion").style.display = "none";
        }

        function showAndroidVersion() {
            document.getElementById("androidVersion").style.display = "block";
            document.getElementById("iosVersion").style.display = "none";
        }
        function hideVersion() {
            document.getElementById("androidVersion").style.display = "none";
            document.getElementById("iosVersion").style.display = "none";
        }

    </script>
</head>
<body>


    <div class="container landing-page">
        <!-- Operating system button group -->
        <div class="row">
            <div class="col-sm-12">
                <h2>Device Operating System: </h2>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <form>
                        <label class="btn btn-secondary" id="all" onclick="showAll()">
                            <input type="radio" name="os" value="all" autocomplete="off"> All
                        </label>
                        <label class="btn btn-secondary" id="ios" onclick="showiOSVersion()">
                            <input type="radio" name="os" value="ios" autocomplete="off"> iOS
                        </label>
                        <label class="btn btn-secondary" id="android-btn" onclick="showAndroidVersion()">
                            <input type="radio" name="os" value="android" autocomplete="off"> Android
                        </label>
                        <label class="btn btn-secondary" id="other-btn">
                            <input type="radio" name="os" value="other" autocomplete="off" onclick="hideVersion()"> Other
                        </label>
						
                </div>
            </div>
        </div>



        <!-- OS Version button group -->
        <div class="row" id="iosVersion" style="display:none">
            <div class="col-sm-12">
                <h2>OS Version</h2>
                <div>

                    <label class="btn btn-secondary android-os ios-os hidden">
                        <input type="checkbox" name="os_ver" value="7" id="os7" autocomplete="off"> 7
                    </label>
                    <label class="btn btn-secondary ios-os hidden">
                        <input type="checkbox" name="os_ver" value="8" id="os8" autocomplete="off"> 8
                    </label>
                    <label class="btn btn-secondary ios-os hidden">
                        <input type="checkbox" name="os_ver" value="9" id="os9" autocomplete="off"> 9
                    </label>
                    <label class="btn btn-secondary ios-os hidden">
                        <input type="checkbox" name="os_ver" value="10" id="os10" autocomplete="off"> 10
                    </label>
                    <label class="btn btn-secondary ios-os hidden">
                        <input type="checkbox" name="os_ver" value="11" id="os11" autocomplete="off"> 11
                    </label>
                </div>
            </div>
        </div>

        <!-- Android Version group -->

        <div class="row" id="androidVersion" style="display:none">
            <div class="col-sm-12">
                <h2>OS Version</h2>
                <div>
                    <label class="btn btn-secondary android-os hidden">
                        <input type="checkbox" name="os_ver" value="4" id="os4" autocomplete="off"> 4
                    </label>
                    <label class="btn btn-secondary android-os hidden">
                        <input type="checkbox" name="os_ver" value="5" id="os5" autocomplete="off"> 5
                    </label>
                    <label class="btn btn-secondary android-os hidden">
                        <input type="checkbox" name="os_ver" value="6" id="os6" autocomplete="off"> 6
                    </label>
                    <label class="btn btn-secondary android-os ios-os hidden">
                        <input type="checkbox" name="os_ver" value="7" id="os7" autocomplete="off"> 7
                    </label>
                </div>
            </div>
        </div>

        <!-- Performance button group -->
        <div class="row">
            <div class="col-sm-12">
                <h2>Performance</h2>
                <div>
                    <label class="btn btn-secondary">
                        <input type="checkbox" name="dgrade" value="obsolete" id="obsolete" autocomplete="off"> Obsolete
                    </label>
                    <label class="btn btn-secondary">
                        <input type="checkbox" name="dgrade" value="low" id="low" autocomplete="off"> Low
                    </label>
                    <label class="btn btn-secondary">
                        <input type="checkbox" name="dgrade" value="medium" id="medium" autocomplete="off"> Medium
                    </label>
                    <label class="btn btn-secondary">
                        <input type="checkbox" name="dgrade" value="high" id="high" autocomplete="off"> High
                    </label>
                </div>
            </div>
        </div>

        <!-- Search and Add buttons -->
        <div class="row">
            <div class="col-sm-12 add-search-btns">
                <button id="search-btn" type="submit" name="button" class="btn" onclick='showDevices()'>Search</button>
				
            </div>
        </div>
    </div>
    </div>

        <?php echo fill_devices($con); ?>
		
        </form>
		
</body>
</html>