#!/usr/bin/env python

import sys
from libcloud.compute.providers import get_driver
import json
import requests


class Exoscale():

    def __init__(self, api_key, secret_key, location='ch-gva-2'):
        self.api_key = api_key
        self.secret_key = secret_key
        self.location_name = location

    def get(self, param):
        exoscale_driver = get_driver('exoscale')
        exo = exoscale_driver(self.api_key, self.secret_key)

        # Get location
        locations = {l.name: l for l in exo.list_locations()}
        location = locations.get(self.location_name)

        res = []
        if param == "images":
            # Get images list
            images = exo.list_images(location=location)
            for image in images:
                res.append((image.name, image.id))
        elif param == "flavors":
            # Get flavors
            sizes = exo.list_sizes()
            sizes.sort(key=lambda x: x.ram)
            for size in sizes:
                res.append((size.name, str(size.extra['cpu']) + " vCPUs, " + str(size.ram) + "MB of RAM"))
        return res


class OTC():

    def __init__(self, username, password, tenant_id, project_id):
        self.username = username
        self.password = password
        self.tenant_id = tenant_id
        self.project_id = project_id

    def get(self, param):
        header = {'Content-type': 'application/json',
                  'X-Auth-Token': self.get_token()}

        res = []
        if param == "images":
            url = 'https://ims.eu-de.otc.t-systems.com/v2/cloudimages'
            response = requests.get(url, headers=header)
            images_json = response.json()

            for image in images_json['images']:
                # Check whether the image is public ?
                if image.get('__imagetype') == 'gold':
                    res.append((image.get('__os_version'), image.get('id')))
        elif param == "flavors":
            url = 'https://ecs.eu-de.otc.t-systems.com/v1/%s/cloudservers/flavors' % self.project_id
            response = requests.get(url, headers=header)
            flavors_json = response.json()

            flavors = sorted(flavors_json['flavors'], key=lambda x: x.get('ram'))
            print(flavors)
            for flavor in flavors:
                res.append((flavor.get('name'), flavor.get('name') + ": " + flavor.get('vcpus') + " vCPUs, "
                            + str(flavor.get('ram')) + "MB of RAM"))

        return res

    def get_token(self):
        url = 'https://iam.eu-de.otc.t-systems.com:443/v3/auth/tokens'
        header = {'Content-type': 'application/json'}
        data = {"auth": {"identity": {"methods": ["password"],
                                      "password": {"user": {"name": self.username,
                                                            "password": self.password,
                                                            "domain": {"name": self.tenant_id}}}},
                         "scope": {"project": {"name": "eu-de"}}}}
        response = requests.post(url, headers=header, data=json.dumps(data))
        return response.headers.get('X-Subject-Token')


if __name__ == "__main__":
    provider = "t-systems"
    param = "images"
    if len(sys.argv) > 1:
        provider = sys.argv[1]
    if len(sys.argv) > 2:
        param = sys.argv[2]

    if provider == "t-systems":
        if len(sys.argv) > 6:
            username = sys.argv[3]
            password = sys.argv[4]
            tenant_id = sys.argv[5]
            project_id = sys.argv[6]
        else:
            sys.exit(2)
        cli = OTC(username, password, tenant_id, project_id)
    elif provider == "exoscale":
        if len(sys.argv) > 4:
            api_key = sys.argv[3]
            secret_key = sys.argv[4]
        else:
            sys.exit(3)
        cli = Exoscale(api_key, secret_key)
    else:
        sys.exit(1)

    for elem in cli.get(param):
        print(elem[0] + ";" + elem[1])
