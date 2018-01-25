2014-03-20 Roberto Bartolomé. First release
2018-01-25 Roberto Bartolomé. Implemented v5

Intro
The file index.php implements a web service that interact with the extranet to 
send or receive Alumni's data.

How is it implemented?
The web service is declared on the server 'alumniapi.irbbarcelona.pcb.ub.es' which 
is a CNAME of 'irbsvr10.irbbarcelona.pcb.ub.es' (eservices).
There is a test server on 'alumniapitest.irbbarcelona.pcb.ub.es'.

Version control
The software is under version control on https://github.com/itsatgithub/alumniapi

How to use it?
Execute on a browser service_test.php

How to reinstall from Git?
$ git reset --hard HEAD
$ git clean -f -d
$ git pull
