#!/usr/bin/env python

import sys

if sys.argv[1] == "sites":
    res = "CESGA;https://fedcloud-services.egi.cesga.es:11443\n"
    res += "RECAS-BARI;http://cloud.recas.ba.infn.it:8787/occi"
    print(res)
elif sys.argv[1] == "CESGA":
    if sys.argv[2] == "instances":
        res = "10;10240\n"
        res += "1;1024\n"
        res += "2;8192\n"
        res += "4;4096"
    elif sys.argv[2] == "os":
        res = "EGI Centos 6;egi.centos.6\n"
        res += "EGI CentOS 7;egi.centos.7"
    else:
        res = "Error"
    print(res)
else:
    print("Error")

