#!/usr/bin/env python

import sys

if sys.argv[1] == "sites":
    if sys.argv[2] != "fedcloud.egi.eu":
        res = "Error"
    else:
        res = "100IT;https://occi-api.100percentit.com:8787/occi1.1\n"
        res += "UPV-GRyCAP;https://fc-one.i3m.upv.es:11443"
    print(res)
elif sys.argv[1] == "instances":
    if sys.argv[2] != "UPV-GRyCAP" and sys.argv[3] != "fedcloud.egi.eu":
        res = "Error"
    else:
        res = "4096 MB - 4 CPUs;large\n"
        res += "8192 MB - 2 CPUs;mem_medium"
    print(res)
elif sys.argv[1] == "os":
    if sys.argv[2] != "UPV-GRyCAP" and sys.argv[3] != "fedcloud.egi.eu":
        res = "Error"
    else:
        res = "EGI Centos 6;egi.centos.6\n"
        res += "EGI CentOS 7;egi.centos.7"
    print(res)
else:
    print("Error")

