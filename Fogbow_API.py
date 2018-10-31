#!/usr/bin/env python

import sys
from libcloud.compute.providers import get_driver
import json
import requests

class Fogbow():
	
	def __init__(self, username, password, tenant_id, project_id):
		self.username = username
		self.password = password
		self.tenant_id = tenant_id
		self.project_id = project_id

	def get_images(self, param):
		header = {'Accept': 'application/json',
				  'federationTokenValue': self.get_token()}

		res = []
		url = 'https://fns-atm-prod-cloud.lsd.ufcg.edu.br/images'
		response = requests.get(url, headers=header)
		images_json = response.json()

		for image in images_json:
			res.append((images_json.get(image), image))
		return res

	def get_token(self):
		url = 'https://fns-atm-prod-cloud.lsd.ufcg.edu.br/tokens'
		header = {'Accept': 'application/json',
				  'Content-Type': 'application/json'}
		data = {"username": self.username,
				"password": self.password,
				"domain": self.tenant_id,
				"projectname": self.project_id}
		response = requests.post(url, headers=header, data=json.dumps(data))
		return response.text


if __name__ == "__main__":
    param = "images"
    if len(sys.argv) > 1:
        param = sys.argv[1]
		
	if len(sys.argv) > 5:
		username = sys.argv[2]
		password = sys.argv[3]
		tenant_id = sys.argv[4]
		project_id = sys.argv[5]
	else:
		sys.exit(2)
	cli = Fogbow(username, password, tenant_id, project_id)
 
	if param == "images":
		for elem in cli.get_images(param):
			print(elem[0] + ";" + elem[1])
	elif param == "token":
		print cli.get_token()
	else:
		sys.exit(2)