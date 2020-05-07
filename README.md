# 411metrics
Crud Operation

For Window setup:
Install xamp
Place the php file in  C:\xampp\htdocs
Start Apache and Mysql from xamp control panel
Make changes in project directory application/config/database.php at the end of file.
Run => 411metrics.sql file in mysql database.
In browser run localohost/411metrics


For Linux setup:
Install Lamp server in your system.
RUN => sudo a2enmod rewrite
RUN => sudo service apache2 restart

Create a directory in your file system like testdir make clone in this directory using command.
RUN => git clone https://github.com/Shazmalik/411metrics.git
Make changes in project directory application/config/database.php at the end of file.
Run => import 411metrics.sql file in mysql database.
Create symbolic link in /var/www/html like
sudo ln -s /home/testdir/411metrics /var/www/html/
Then run localhost/411metrics
