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
              <meta charset="utf-8"/>
            </head>
          <body>""")

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
    people = selectPeopleDB('device_database',cur)
    devices = selectDeviceDB('device_database',cur)
    cur.close()
    displayPeople(people)
    displayDevices(devices)
    htmlTail()
  except:
    cgi.print_exception()


