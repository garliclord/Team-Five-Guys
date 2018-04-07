#!C:\Users\carld\AppData\Local\Programs\Python\Python36\python.exe

import cgi

#import mysql connector and connect to server
import mysql.connector
con=mysql.connector.connect(user='root',password='',host='localhost',database='device_database')
cur=con.cursor()


#beginning of html page
def htmlTop():
  print("""Content-type:text/html\n\n
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/style.css">
  <title>Device Manager</title>
</head>

<body>

  <div class="container landing-page">
    <!-- Operating system button group -->
    <div class="row">
      <div class="col-sm-12">
        <h2>Device Operating System: </h2>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
    <form action="display1.cgi" method="post">
          <label class="btn btn-secondary" id="ios-btn">
            <input type="radio" name="os" value="ios" autocomplete="off"> iOS
          </label>
          <label class="btn btn-secondary" id="android-btn">
            <input type="radio" name="os" value="android" autocomplete="off"> Android
          </label>
          <label class="btn btn-secondary" id="other-btn">
            <input type="radio" name="options" autocomplete="off"> Other
          </label>
        </div>
      </div>
    </div>

    <!-- OS Version button group -->
    <div class="row">
      <div class="col-sm-12">
        <h2>OS Version</h2>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-secondary android-os hidden">
            <input type="checkbox" name="os_ver" value="4%" id="os4" autocomplete="off"> 4
          </label>
          <label class="btn btn-secondary android-os hidden">
            <input type="checkbox" name="os_ver" value="5%" id="os5" autocomplete="off"> 5
          </label>
          <label class="btn btn-secondary android-os hidden">
            <input type="checkbox" name="os_ver" value="6%" id="os6" autocomplete="off"> 6
          </label>
          <label class="btn btn-secondary android-os ios-os hidden">
            <input type="checkbox" name="os_ver" value="7%" id="os7" autocomplete="off"> 7
          </label>
          <label class="btn btn-secondary ios-os hidden">
            <input type="checkbox" name="os_ver" value="8%" id="os8" autocomplete="off"> 8
          </label>
          <label class="btn btn-secondary ios-os hidden">
            <input type="checkbox" name="os_ver" value="9%" id="os9" autocomplete="off"> 9
          </label>
          <label class="btn btn-secondary ios-os hidden">
            <input type="checkbox" name="os_ver" value="10%" id="os10" autocomplete="off"> 10
          </label>
        </div>
      </div>
    </div>

    <!-- Performance button group -->
    <div class="row">
      <div class="col-sm-12">
        <h2>Performance</h2>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
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
        <button id="search-btn" type="submit" name="button" class="btn">Search</button>
        <button id="add-device-btn" type="button" name="button" class="btn">Add New</button>
 </form>
      </div>
    </div>
  </div>

  <div class="container add-device-page hidden">
    <div class="row">
      <div class="col-sm-12">
        <h3>Add Device</h3>
        <table class="table">
          <tr>
            <td>Device Type:</td>
            <td><input type="text" name="" value=""> </td>
          </tr>
          <tr>
            <td>OS Type:</td>
            <td><input type="text" name="" value=""> </td>
          </tr>
          <tr>
            <td>RAM:</td>
            <td><input type="text" name="" value=""> </td>
          </tr>
        </table>
        <button type="button" id="add-device-page-save-btn" class="btn">Save</button>
        <button type="button" id="add-device-page-back-btn" class="btn btn-back">Back</button>
      </div>
    </div>
  </div>

  <div class="container display-page hidden">
    <div class="row">
      <div class="col-sm-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Device Name</th>
              <th scope="col">User</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">iPhone X
                <button type="button" id="info-btn" class="btn">Info</button>
              </th>
              <td>Dave
                <button type="button" id="assign-btn" class="btn btn-assign">Assign</button>
              </td>
            </tr>
            <tr>
              <th scope="row">iPhone 8
                <button type="button" id="info-btn1" class="btn">Info</button>
              </th>
              <td>Bryce
                <button type="button" id="assign-btn1" class="btn btn-assign">Assign</button>
              </td>
            </tr>
            <tr>
              <th scope="row">iPhone 7
                <button type="button" id="info-btn2" class="btn">Info</button>
              </th>
              <td>Bob
                <button type="button" id="assign-btn2" class="btn btn-assign">Assign</button>
              </td>
            </tr>
          </tbody>
        </table>
        <button type="button" id="display-page-back-btn" class="btn btn-back">Back</button>
      </div>
    </div>
  </div>

  <div class="container info-page hidden">
    <div class="row">
      <div class="col-sm-12 info-page">
        <h3>Device Name</h3>
        <table class="table">
          <tr>
            <td>Device Type:</td>
            <td>iPhone 7</td>
          </tr>
          <tr>
            <td>OS Type:</td>
            <td>iOS</td>
          </tr>
          <tr>
            <td>RAM</td>
            <td>4G</td>
          </tr>
        </table>
        <button type="button" id="info-page-edit-btn" class="btn">Edit</button>
        <button type="button" id="info-page-back-btn" class="btn btn-back">Back</button>
      </div>
    </div>
  </div>

  <div class="container assign-overlay hidden">
    <div class="row">
      <div class="col-sm-12">
        <p>assign-overlay</p>
        <button type="button" id="assign-overlay-back-btn" class="btn btn-back">Back</button>
      </div>
    </div>
  </div>

  <div class="container edit-page hidden">
    <div class="row">
      <div class="col-sm-12">
        <h3>Device Name</h3>
        <table class="table">
          <tr>
            <td>Device Type:</td>
            <td>
              <input type="text" name="" value="">
            </td>
          </tr>
          <tr>
            <td>OS Type:</td>
            <td>
              <input type="text" name="" value="">
            </td>
          </tr>
          <tr>
            <td>RAM:</td>
            <td>
              <input type="text" name="" value="">
            </td>
          </tr>
        </table>
        <button type="button" id="edit-page-save-btn" class="btn">Save</button>
        <button type="button" id="edit-page-back-btn" class="btn btn-back">Back</button>
      </div>
    </div>
  </div>

  <!-- Custom JavaScript -->
  <script type="text/javascript" src="Scripts/Script.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>""")

#end of html page
def htmlTail():
    print("""</body>
          </html>""")

#select all user table
def selectPeopleDB(db,cursor):
    sql = "select * from users"
    cursor.execute(sql)
    people = cursor.fetchall()
    return people

#select all device table
def selectDeviceDB(db,cursor):
  sql = "select * from devices"
  cursor.execute(sql)
  devices = cursor.fetchall()
  return devices


def selectOs(db,cursor):
  form=cgi.FieldStorage()
  os = form.getvalue('os')
  os = str(os)
  dgrade = form.getvalue('dgrade')
  dgrade = str(dgrade)
  os_ver = form.getvalue('os_ver')
  os_ver = str(os_ver)
  if dgrade == 'None' and os_ver == 'None':
      cursor.execute("""SELECT * from devices WHERE os_type = '{0}'""".format(os))
  elif os_ver == 'None':
      cursor.execute("""SELECT * from devices WHERE os_type = '{0}' AND grade = '{1}'""".format(os,dgrade))
  elif dgrade == 'None':
      cursor.execute("""SELECT * from devices WHERE os_type = '{0}' AND os_version LIKE '{1}'""".format(os,os_ver))
  elif dgrade == 'None' and os_ver == 'None' and os == 'None':
      cursor.execute("""SELECT * from devices""")
  Device = cursor.fetchall()
  if os != 'None':
      print("<table border='1'>")
      print("<tr>")
      print("<th>Name</th>")
      print("<th>OS Type</th>")
      print("<th>Type</th>")
      print("<th>OS Version</th>")
      print("<th>RAM</th>")
      print("<th>CPU</th>")
      print("<th>Bit</th>")
      print("<th>Screen Resolution</th>")
      print("<th>Grade</th>")
      print("<th>UUID</th>")
      print("<th>Assigned to:</th>")
      print("<th><input type='text' form='form1'></th>")
      print("</tr>")
      for each in Device:
        print("<tr>")
        print("<td>{0}</td>".format(each[0]))
        print("<td>{0}</td>".format(each[1]))
        print("<td>{0}</td>".format(each[2]))
        print("<td>{0}</td>".format(each[3]))
        print("<td>{0}</td>".format(each[4]))
        print("<td>{0}</td>".format(each[5]))
        print("<td>{0}</td>".format(each[6]))
        print("<td>{0}</td>".format(each[7]))
        print("<td>{0}</td>".format(each[8]))
        print("<td>{0}</td>".format(each[9]))
        print("<td>{0}</td>".format(each[10]))
        print("<td><form action='add_record.cgi' method='post' name='assign' id='form1'><input type='submit' value='assign'></form></th>")
        print("</tr>")
      print("</table>")


#display all user table
def displayPeople(people):
    print("<table border='1'>")
    print("<tr>")
    print("<th>ID</th>")
    print("<th>Name</th>")
    print("</tr>")
    for each in people:
      print("<tr>")
      print("<td>{0}</td>".format(each[0]))
      print("<td>{0}</td>".format(each[1]))
      print("</tr>")
    print("</table>")

#display all device table
def displayDevices(devices):
  print("<table border='1'>")
  print("<tr>")
  print("<th>Name</th>")
  print("<th>OS Type</th>")
  print("<th>Type</th>")
  print("<th>OS Version</th>")
  print("<th>RAM</th>")
  print("<th>CPU</th>")
  print("<th>Bit</th>")
  print("<th>Screen Resolution</th>")
  print("<th>Grade</th>")
  print("<th>UUID</th>")
  print("</tr>")
  for each in devices:
    print("<tr>")
    print("<td>{0}</td>".format(each[0]))
    print("<td>{0}</td>".format(each[1]))
    print("<td>{0}</td>".format(each[2]))
    print("<td>{0}</td>".format(each[3]))
    print("<td>{0}</td>".format(each[4]))
    print("<td>{0}</td>".format(each[5]))
    print("<td>{0}</td>".format(each[6]))
    print("<td>{0}</td>".format(each[7]))
    print("<td>{0}</td>".format(each[8]))
    print("<td>{0}</td>".format(each[9]))
    print("</tr>")
  print("</table>")


# main Program
if __name__ == "__main__":
  try:
    htmlTop()
    selectOs('device_database',cur)
    cur.close()
    htmlTail()
  except:
    cgi.print_exception()
