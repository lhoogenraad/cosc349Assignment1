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
deleting the insert statement block at the bottom of the dbsetup.sql file in the home directory
