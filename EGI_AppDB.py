#!/usr/bin/env python

#
#  Copyright 2016 EGI Foundation
# 
#  Licensed under the Apache License, Version 2.0 (the "License");
#  you may not use this file except in compliance with the License.
#  You may obtain a copy of the License at
#
#      http://www.apache.org/licenses/LICENSE-2.0
#
#  Unless required by applicable law or agreed to in writing, software
#  distributed under the License is distributed on an "AS IS" BASIS,
#  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
#  See the License for the specific language governing permissions and
#  limitations under the License.
#
# /

import sys
import httplib
import xmltodict
from urlparse import urlparse

__copyright__ = "Copyright (c) 2016 EGI Foundation"
__license__ = "Apache Licence v2.0"

#apikey = "51db5c98-96fb-4566-866b-98b3d470170e"  # <== Change here!
#vo = "training.egi.eu"  # <== Change here!
#vo = "fedcloud.egi.eu"
vo = "eosc-synergy.eu"

def check_supported_VOs(data):
    if 'provider:image' in data['virtualization:provider']:
        for os_tpl in data['virtualization:provider']['provider:image']:
            if '@voname' in os_tpl and vo in os_tpl['@voname']:
                return True
    return False

def appdb_call(c):
    res = None
    cont = 0
    while res is None and cont < 3:
        cont += 1
        try:
            conn = httplib.HTTPSConnection('appdb.egi.eu')
            conn.request("GET", c)
            data = conn.getresponse().read()
            conn.close()
            data.replace('\n','')
            res = xmltodict.parse(data)['appdb:appdb']
        except:
            pass

    return res

def get_sites():
    data = appdb_call('/rest/1.0/sites?flt=%%2B%%3Dvo.name:%s&%%2B%%3Dsite.supports:1' % vo)
    providersID = []
    for site in data['appdb:site']:
        if  type(site['site:service']) == type([]):
            for service in site['site:service']:
                providersID.append(service['@id'])
        else:
            providersID.append(site['site:service']['@id'])

    # Get provider metadata
    endpoints = {}
    cont = 1
    for ID in providersID:
        data = appdb_call('/rest/1.0/va_providers/%s' % ID)
        if check_supported_VOs(data):
            if ('provider:url' in data['virtualization:provider'] and 
                data['virtualization:provider']['@service_type'] == 'org.openstack.nova'):
                provider_name = data['virtualization:provider']['provider:name']
                if data['virtualization:provider']['@service_status'] == "CRITICAL":
                    provider_name += " (CRITICAL state!)"
                provider_endpoint_url = data['virtualization:provider']['provider:url']
                url = urlparse(provider_endpoint_url)
                if provider_name in endpoints:
                    provider_name += str(cont)
                    cont += 1
                endpoints[provider_name] = provider_name + ";" + "%s://%s" % url[0:2]

    return endpoints

def get_oss(endpoint):
    oss = []
    data = appdb_call('/rest/1.0/sites?flt=%%2B%%3Dvo.name:%s&%%2B%%3Dsite.supports:1' % vo)
    for site in data['appdb:site']:
        if isinstance(site['site:service'], list):
            services = site['site:service']
        else:
            services = [site['site:service']]

        for service in services:
            try:
                va_data = appdb_call('/rest/1.0/va_providers/%s' % service['@id'])
                if ('provider:url' in va_data['virtualization:provider'] and
                    va_data['virtualization:provider']['@service_type'] == 'org.openstack.nova' and
                    va_data['virtualization:provider']['provider:name'] == endpoint):
                    for os_tpl in va_data['virtualization:provider']['provider:image']:
                        try:
                            if '@voname' in os_tpl and vo in os_tpl['@voname'] and os_tpl['@archived'] == "false":
                                oss.append(os_tpl['@appname'] + ";" + os_tpl['@appcname'])
                        except:
                            continue
            except:
                continue

    return oss
    
def get_instances(endpoint):
    instances = []
    data = appdb_call('/rest/1.0/sites?flt=%%2B%%3Dvo.name:%s&%%2B%%3Dsite.supports:1' % vo)
    for site in data['appdb:site']:
        if isinstance(site['site:service'], list):
            services = site['site:service']
        else:
            services = [site['site:service']]

        for service in services:
            try:
                va_data = appdb_call('/rest/1.0/va_providers/%s' % service['@id'])
                if ('provider:url' in va_data['virtualization:provider'] and
                    va_data['virtualization:provider']['@service_type'] == 'org.openstack.nova' and
                    va_data['virtualization:provider']['provider:name'] == endpoint):
                    for resource_tpl in va_data['virtualization:provider']['provider:template']:
                        instances.append((resource_tpl['provider_template:physical_cpus'], resource_tpl['provider_template:main_memory_size']))
            except:
                continue

    return instances


if __name__ == "__main__":
    option = "all"
    if len(sys.argv) > 2:
        endpoint = sys.argv[1]
        option = sys.argv[2]
    elif len(sys.argv) > 1:
        option = sys.argv[1]
    if option == "sites":
        for site in get_sites().values():
            if site.endswith("/"):
                print(site[:-1])
            else:
                print(site)
    elif option == "os":
        for os in get_oss(endpoint):
            if os.endswith("/"):
                print(os[:-1])
            else:
                print(os)
    elif option == "instances":
        for inst_desc, inst_name in get_instances(endpoint):
            print("%s;%s" % (inst_desc, inst_name))


