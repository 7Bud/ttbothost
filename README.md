ttbothost
=========

A Turntable.fm bot open source hosting service!

What does it do?
=========

You login, upload your bot and if you need to start/stop. IT WILL!

Cool! How can I use and then host it?
=========

1. Get the file by cloning it or getting the zip of it.

2. Put it on your Webserver. This is only for Servers!

3. Upload the controller/* (MEANS UPOLAD ALL OF THESE EXECPT crontab.txt!) to the same or another server. Before that, make a directory called: /bots/ and then do it.

4. Setup mysql database and enter them in wbsite/secretmysqldb.txt.

5. For the another server or same, do "crontab -e" (WITHOUT QUOTES!) and then pick the editor you want. 

6. Enter the cron BELOW the info in controller/contrab.txt.

7. Do "INSERT into admin VALUES ('1','yourusernamehere','yourpasswordhere');" (WITHOUT QUOTES!) in the mysql session.

8. On the same or another Server, cd to /bots/ directory and then do "npm install ttapi twit mysql" anything you need to install for npm. 

9. Enjoy!

Also configure the website and the controller!
