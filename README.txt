# cosc349Assignment1
A vagrant system where VM's interact to provide a localhost webservice


For the user:


University of Otago past exams aren't provided with answers, so when practicing for actual
exams with these, students aren't able to be totally confident that their answers are correct.

This webservice allows students to view answers other students have uploaded to past exam questions.
To upload an answer the following data must be given: paper code, exam year, exam question, and the answer to the question.
The uploader also has the option to give their university username, but this is not required.

To run this system run: vagrant up
To use the service navigate to: 127.0.0.1:8080 in a browser





For the developer:

There are 3 VM's in this set up: dbserver, display and upload. 

The names are pretty self explanatory, the dbserver is responsible for hosting a mysql database
that the other 2 VM's can connect to. The display VM provides a webpage on 127.0.0.1:8080/index.php that
displays all the data entered by the users, and some dummy data that can be removed by commenting or
deleting the insert statement block at the bottom of the dbsetup.sql file in the home directory.
The upload server provides a webpage on 127.0.0.1:8090/upload.php which allows users to upload their exam
answers to the db. It should be noted there is no validation/parsing what so over on the stuff users enter.


-----      Network     -----
All 3 VM's are connected to a private network (named private_network) on 192.168.2.x (x is of course based
on which machine we're talking about). The addresses of the machines on this network are:

dbserver: 192.168.2.12
display: 192.168.2.11
upload: 192.168.2.10


The two webserver VM's, display and upload, also port forward on 127.0.0.1 to provide their webservice:

display operates on the port 8080
upload operates on the port 8090

On each web page there is a link to the other web page, be aware that the href attribute of the <a> tag
must be something like href="http://127.0.0.1:8080/index.php" and not href="127.0.0.1:8080/index.php", because
the latter will not work correctly.


-----     VM Configuration      -----
The VM's are configured by the VagrantFile. In this file you should find comprehensive documentation on
what each line of code is doing. The shell scripts define what the VM will do once it has been created and
is running. These shell scripts should also have some documentation explaining what each line is doing, and
will also echo out information about the VM once it is done being set up.

the two website config files display.conf and upload.conf define the directories to find the 
php pages to display to the user. The sql file dbsetup.sql 
