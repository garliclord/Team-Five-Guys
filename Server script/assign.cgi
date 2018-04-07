#!C:\Users\ielemia\AppData\Local\Programs\Python\Python36\python.exe

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

def assign():
    form=cgi.FieldStorage()
    device = form.getvalue('device')
    id = form.getvalue('user_id')
    cur.execute("insert into device_assigned values(%s,%s)", (device, id))
    con.commit()
    print("<h1>Device assigned successfully</h1>")

def reassign():
    form=cgi.FieldStorage()
    device = form.getvalue('device')
    id = form.getvalue('user_id')
    cur.execute("update device_assigned SET (%s,%s) WHERE (%s,%s)", (device,id,device,id))
    con.commit()
    print("<h1>Device assigned successfully</h1>")

#main Program
if __name__ == "__main__":
  try:
    htmlTop()
    try:
        assign()
    except:
        reassign()
    cur.close()
    htmlTail()
  except:
    cgi.print_exception()
