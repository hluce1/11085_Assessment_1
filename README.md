<!-- Please read this document online https://github.com/hluce1/11085_Assessment_1 -->
Assessment live at http://hluce1.epizy.com

# Rationale U3158894



<h2>Initiation and Development:</h2>

<p align="justify">Following the weekly activities, I initially set up the development environment and created the CRUD application using PHP, MySQL, Brackets as the code editor and lastly, version control using Git. I installed Git Bash because development was done in a Windows environment. Once all the software was installed, the first SQL database was created through MAMP and phpMyAdmin. The SQL used is slightly different from the code provided by Ben. The changes allow users to add plenty of variable characters into the text boxes, with form data specified in the form itself rather than making the SQL do the work. 
Secondly, using the code from the weekly activities, which also speed up the development process, each of the pages and CRUD functionality was operating as expected. The next process was changing the layout of the assessment. I used Bootstrap first but decided Skeleton was easier since it was minimal and only required one CDN reference. There is also additional CSS for the CRUD application for anything Skeleton didn’t target/style very well. I then decided the read page with the ‘View All’ button was redundant and just utilised the update.php page to do this. Next was to make the table data update rows only, and make an actions column for the update and delete buttons. After this, the CRUD app was finished. The next process was to get it hosted for free. Initially, I was using Heroku, but the site required a credit card to validate users if they wanted an SQL database. Thankfully, someone found infinityfree.net. 
Setting up the site to work online was straight forward, all that needed to be changed from the local files was config.php. I also renamed my local databases to reflect the ones on InfinityFree so that it was seamless to update via FTP. Then there was the addition of the .htaccess file, this file is on the live site, but hasn’t been uploaded to GitHub because it becomes hidden. 
Lastly was the registration functionality, I found a tutorial from codewithawa.com that was easy to follow. It required an additional 6 files to use. I had to change where these files would sit, as the FTP file manager wouldn’t pick up my files correctly using the .htaccess file InfinityFree provides. Lastly, I made a couple navigational buttons so users can easily navigate back and forth between the login/registration pages and the application itself. I then added some CSS changes to the registration pages.</p>




<h2>Testing/lessons learned:</h2>

<p align="justify">I first tried a Linux environment because I went through set-backs using MAMP. There was an issue with the software when I would change the root folder through preferences. The SQL wouldn’t turn on and made the local site unusable. After troubleshooting in Configuration and INI files the only method to alleviate this was to uninstall MAMP, delete any remaining files and reinstall it again. After creating a Linux VM, which didn’t go well, I made a Windows 10 VM that worked but encountered the same problems as my host machine. So there was back and forth between my host and the VM uninstalling and reinstalling when one or the other stopped working. 
In hindsight and what I’ve learned from this, would have been setting up the FTP server to work in a local IDE and just FTP the changes made when saving files locally. This would cut out a lot of the time wasted and I’d still see the changes in real time on the live site. I understand updating a live site isn’t the best course of action, but it would have been much easier than the MAMP issues.</p>


<h2>Bibliography:</h2>

Melvine, A. (2017). Complete user registration system using PHP and MySQL database.
[ONLINE] http://codewithawa.com. 
Available at: http://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database 
Accessed 24 Mar. 2019.

