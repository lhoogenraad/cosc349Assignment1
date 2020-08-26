apt-get update

# This is a shell variable that contains the mysql root password
export MYSQL_PWD='admin_pw'

# These linues automatically answers set-up questions from installing the 
# mysql package, which means our startup script isn't interrupted.

echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections 
echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections

# Installing the mysql server
apt-get -y install mysql-server

# This creates a new database called examanswers
echo "CREATE DATABASE examanswers;" | mysql

# This creates a db user called webuser with the password db_pw
echo "CREATE USER 'webuser'@'%' IDENTIFIED BY 'db_pw';" | mysql

# This grants all the permissions to the newly created webuser on the examanswers db
echo "GRANT ALL PRIVILEGES ON examanswers.* TO 'webuser'@'%'" | mysql

# Sets the shell variable from the start of the script to the non-admin password
export MYSQL_PWD='db_pw'

# This line makes it so mysql will listen to any network requests
# (by default it will only listen for local network requests)
sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf

# Now we restart mysql to affect our changes
service mysql restart
