import os, sys
import string
import random
currentdir = os.path.dirname(os.path.realpath(__file__))
parentdir = os.path.dirname(currentdir)
sys.path.append(parentdir)
# import tempfile
import unittest

from app import app



class FlaskTestCase(unittest.TestCase):
    # Please note that this test cases depend on your computer as well as well. For example if I already have
    # a instructor named admin in my database that might not be true for you so KEEP THIS IN MIND.


    def test_home_page(self):
        tester = app.test_client(self)
        response = tester.get('/', content_type="html/text")
        self.assertIn(b'Home', response.data)
    
    # The login is not successful for incorrect credentials
    def test_agent_login_unsuccessful(self):
        tester = app.test_client(self)
        response = tester.post('/agent', data=dict(username="wrong1", password="wrong"), follow_redirects=True)
        self.assertIn(b'Wrong username or password', response.data)

    # Citizen Registration
    def test_citizen_registration(self):
        tester = app.test_client(self)
        response = tester.post('/citizen', data=dict(name='hello',address="hii",phone="9898098909",email="hello@hello.com",city="bremen"))
        self.assertIn(b'Redirecting', response.data)


    # Owner Registration
    def test_owner_registration(self):
        tester = app.test_client(self)
        response = tester.post('/owner', data=dict(name='Aayush',address="Jacobs",phone="2312112",email="mymail@wmail.com"), follow_redirects=True)
        # Returns QR Code so using PNG
        self.assertIn(b'PNG', response.data)

    # The login is not successful for incorrect credentials
    def test_hospital_login(self):
        tester = app.test_client(self)
        response = tester.post('/hospital', data=dict(username="wrong1", password="wrong"), follow_redirects=True)
        self.assertIn(b'Wrong username or password', response.data)


    def test_owner_page(self):
        tester = app.test_client(self)
        response = tester.get('/owner', content_type="html/text")
        self.assertIn(b'Owner', response.data)

if __name__=='__main__':
   unittest.main()
   