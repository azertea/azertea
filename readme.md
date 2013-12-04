## File installation
Install the github windows software.
Then, click on tools > options and change the default storage directory to point to the webserver root.
Fork the azertea repository and clone the code on your computer.

## Database installation

Create a database with PhpMyAdmin.
Open the file web_server_root/your_vieassoc_folder/**app/config/database.php** and update the database password and the database name with your's local credentials


## Environment variables in Windows

For the next step, you'll need to execute a program written in php. But first, we will configure environment variables in Windows for specify the directory where the php executable is located.

- From the Desktop, right-click My Computer and click Properties.
- Click Advanced System Settings link in the left column.
- In the System Properties window click the Environment Variables button.

More information [here](http://www.computerhope.com/issues/ch000549.htm)

Edit the **system** environment variable ( not user environment variable ) nammed "Path" and add to the previous value 
- a semicolon ;
- then the folder where php.exe is located (I guess in your case that would be C:\xampp\php )

"Path" would looks like [precedent values of path];C:\xampp\php

## Database deployement
Hold the SHIFT key while you right-click the Windows window on the laravel root folder. You should see "Open Command Window here"

1. On the command window, type : 

    	php artisan migrate --env=local


##That's it
You can try to reach your local website now !
