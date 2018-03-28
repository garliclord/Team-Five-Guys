#!C:\Users\carld\AppData\Local\Programs\Python\Python36\python.exe

import cgi

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

#recieve input from form and update user table
def userInput():
  form=cgi.FieldStorage()
  id = form.getvalue('id')
  name = form.getvalue('name')
  cur.execute("insert into users values(%s,%s)", (id,name))
  con.commit()
  print("<h1>Record inserted successfully</h1>")

# main program
if __name__ == "__main__":
  try:
    htmlTop()
    userInput()
    cur.close()
    htmlTail()
  except:
    cgi.print_exception()
