from asyncio.base_tasks import _task_get_stack
from flask import Flask, render_template,request,flash,redirect,url_for,session
from datetime import datetime
import sqlite3


app = Flask(__name__)
app.secret_key="123"

# Database
con = sqlite3.connect("database.db")
# Owner
con.execute("create table if not exists owner(id integer primary key,name text,address text,phone text,email text)")
# Citizen
con.execute("create table if not exists citizen(id integer primary key,name text,address text,phone text,email text, city text)")
con.close()


@app.route('/', methods=['POST', 'GET'])

def index():
    if request.method == 'POST':
        task_name = request.form['name']
        task_address = request.form['address']       
        task_city = request.form['city']       
        task_phone = request.form['phone']       
        task_email = request.form['email']       

    else:
        pass

    return render_template('index.html')

@app.route('/citizen', methods=['POST', 'GET'])
def citizen():
    if request.method == 'POST':
        try:
            task_name = request.form['name']
            task_address = request.form['address']       
            task_city = request.form['city']       
            task_phone = request.form['phone']       
            task_email = request.form['email']       
            print(task_name, task_address, task_phone, task_email, task_city)
            con=sqlite3.connect("database.db")
            cur=con.cursor()
            cur.execute("insert into citizen(name,address,phone,email,city)values(?,?,?,?,?)",(task_name,task_address,task_phone,task_email,task_city))
            con.commit()
            print("success")
            flash("Record Added  Successfully","success")

        except:
            print("error occured")
            flash("Error in Insert Operation","danger")
        finally:
            return redirect(url_for("index"))
            con.close()
    else:
        pass

    return render_template('citizen.html')


@app.route('/owner', methods=['POST', 'GET'])
def owner():
    if request.method == 'POST':
        try:
            task_name = request.form['name']
            task_address = request.form['address']       
            task_phone = request.form['phone']       
            task_email = request.form['email']       

            con=sqlite3.connect("database.db")
            cur=con.cursor()
            cur.execute("insert into owner(name,address,phone,email)values(?,?,?,?)",(task_name,task_address,task_phone,task_email))

            con.commit()
            print("success")
            flash("Record Added  Successfully","success")

        except:
            print("error occured")
            flash("Error in Insert Operation","danger")
        finally:
            return redirect(url_for("index"))
            con.close()

    else:
        pass

    return render_template('owner.html')


@app.route('/citizen_info', methods=['POST', 'GET'])
def citizen_info():
    return render_template('citizen_info.html')

@app.route('/agent', methods=['POST', 'GET'])
def agent():
    if request.method == 'POST':
        task_username = request.form['username']
        task_password = request.form['password']  
        if task_username == 'admin' and task_password == '123':
            return 'successfully Logged in'
        else:
            return 'failure'

    
    return render_template('agent.html')


@app.route('/hospital', methods=['POST', 'GET'])
def hospital():
    if request.method == 'POST':
        task_username = request.form['username']
        task_password = request.form['password']  
    
    return render_template('hospital.html')

@app.route('/owner_info', methods=['POST', 'GET'])
def owner_info():
    return render_template('owner_info.html')

if __name__ == "__main__":
    app.run(debug=True)