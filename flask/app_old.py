from asyncio.base_tasks import _task_get_stack
from flask import Flask, render_template, url_for, request, redirect

from datetime import datetime

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///test.db'
db = SQLAlchemy(app)

class Citizen(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(200),nullable=False)
    address = db.Column(db.String(200),nullable=False)
    city = db.Column(db.String(200),nullable=False)
    phone = db.Column(db.String(200),nullable=False)
    email = db.Column(db.String(200),nullable=False)
    date_created = db.Column(db.DateTime, default=datetime.utcnow)

class Owner(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(200),nullable=False)
    address = db.Column(db.String(200),nullable=False)
    phone = db.Column(db.String(200),nullable=False)
    email = db.Column(db.String(200),nullable=False)
    date_created = db.Column(db.DateTime, default=datetime.utcnow)

class Agent(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(200),nullable=False)
    password = db.Column(db.String(200),nullable=False)

class Hospital(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(200),nullable=False)
    password = db.Column(db.String(200),nullable=False)

    def __repr__(self):
        return '<Task %r>' % self.id

@app.route('/', methods=['POST', 'GET'])

def index():
    if request.method == 'POST':
        task_name = request.form['name']
        task_address = request.form['address']       
        task_city = request.form['city']       
        task_phone = request.form['phone']       
        task_email = request.form['email']       
        new_citizen = Citizen(name=task_name,address=task_address,city=task_city,phone=task_phone,email=task_email)

        try:
            db.session.add(new_citizen)
            db.session.commit()
            Info = Citizen.query.order_by(Citizen.date_created).all() 
            return 'Sucessfully added to our DB'
        except:
            return 'Issue adding your task' 

    else:
        pass

    return render_template('index.html')

@app.route('/citizen', methods=['POST', 'GET'])
def citizen():
    if request.method == 'POST':
        task_name = request.form['name']
        task_address = request.form['address']       
        task_city = request.form['city']       
        task_phone = request.form['phone']       
        task_email = request.form['email']       
        new_citizen = Citizen(name=task_name,address=task_address,city=task_city,phone=task_phone,email=task_email)

        try:
            db.session.add(new_citizen)
            db.session.commit()
            Info = Citizen.query.order_by(Citizen.date_created).all() 
            return 'Sucessfully added to our DB'
        except:
            return 'Issue adding your task' 

    else:
        pass

    return render_template('citizen.html')


@app.route('/owner', methods=['POST', 'GET'])
def owner():
    if request.method == 'POST':
        task_name = request.form['name']
        task_address = request.form['address']       
        task_phone = request.form['phone']       
        task_email = request.form['email']       
        new_owner = Owner(name=task_name,address=task_address,phone=task_phone,email=task_email)

        try:
            db.session.add(new_owner)
            db.session.commit()
            return 'Sucessfully added to our DB'
        except:
            return 'Issue adding your task' 

    else:
        pass

    return render_template('owner.html')


@app.route('/citizen_info', methods=['POST', 'GET'])
def citizen_info():
    db.session.commit()
    Info = Citizen.query.order_by(Citizen.date_created).all() 
    return render_template('citizen_info.html', Info=Info)

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
    db.session.commit()
    Info = Owner.query.order_by(Owner.date_created).all() 
    return render_template('owner_info.html', Info=Info)

if __name__ == "__main__":
    app.run(debug=True)