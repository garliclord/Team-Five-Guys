#!C:\Users\carld\AppData\Local\Programs\Python\Python36\python.exe

import cgi

#import mysql connector and connect to server
import mysql.connector
con=mysql.connector.connect(user='root',password='',host='localhost',database='device_database')
cur=con.cursor()

f = open('index.html', 'r')
myhtml = f.read()
f.close()

#beginning of html page
def htmlTop():
  print("""Content-type:text/html\n\n""")
  print (myhtml)
  print("""@import "CSS/style.css";""")

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
  search = form.getvalue('search')
  search = str(search)
  if os == 'None' and dgrade == 'None' and os_ver == 'None':
    cursor.execute("""SELECT * from devices""")
  elif dgrade == 'None' and os_ver == 'None':
    cursor.execute("""SELECT * from devices WHERE os_type = '{0}'""".format(os))
  elif os_ver == 'None':
    cursor.execute("""SELECT * from devices WHERE os_type = '{0}' AND grade = '{1}'""".format(os,dgrade))
  elif dgrade == 'None':
    cursor.execute("""SELECT * from devices WHERE os_type = '{0}' AND os_version LIKE '{1}'""".format(os,os_ver))
  Device = cursor.fetchall()
  if search == 'search':
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
  print("<p id='one'>{0}</p>".format(os))
  print(dgrade)
  print(os_ver)
  print(search)

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
