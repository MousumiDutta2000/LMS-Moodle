# Learning Management System - Moodle

The goal of the Moodle learning management system is to give teachers, administrators, and students access to one reliable, private, and integrated system that comprises detailed learning environments. It gives us a quick way for the participants to engage with one another and exchange information about their coursework. The teaching staff also gains a clear awareness of the student's progress; the attendance can be generated routinely; the exam could have been given online, and lessons can also be published on the internet. The administrators receive all the information about the classes or courses, making it easier for him to track every minute detail without hovering everywhere. Students can also benefit since they can attend class from any location, the time constraints on learning can be modified, and they can ask questions to get answers to their questions.

Demo Video : https://youtu.be/EEfOscDUUUk 


## HOW TO USE IT

<hr>

1. Run 'Start Moodle.exe' to start up the system.

2. Visit http://localhost/ to use your Moodle site!

3. Other people have to access it via http://xxx.xxx.xxx.xxx where
   xx.xx.xx.xx is the IP number or name of your Windows computer.

4. If you want to shut down the Moodle server, use 'Stop Moodle.exe'


## TECHNICAL INFORMATION

<hr>

1. Start/Stop Moodle.exe

'Start Moodle.exe' runs the xampp installation script
located in server/install/install.php. Then it starts Apache and MariaDB.
'Stop Moodle.exe' stops the Apache and MariaDB processes.


2. XAMPP (https://www.apachefriends.org/en/xampp.html)

You can use xampp executable files directly if you like.  They are 
located in the "server" directory. 
 

3. Moodle (https://moodle.org/)

All moodle files are located in server/moodle/


4. Performance Settings (https://docs.moodle.org/en/Performance)

In order to optimize your Moodle Environment, see the Moodle Performance docs. 


## TROUBLESHOOTING

<hr>

If 'Start Moodle.exe' fails to work and the windows closes automatically, 
you may have something blocking port 80 on your machine.  Make sure there
are no other web servers running on this port, Skype is configured not 
to use port 80, firewalls are open etc

Another reason could be because PHP in this package needs the Microsoft
Visual C++ 2015 Redistributable package from:
https://www.microsoft.com/en-us/download/details.aspx?id=48145

For more information, visit:
https://docs.moodle.org/en/Complete_install_packages_for_Windows

Do not rename the 'server/' folder. Otherwise 'Start Moodle.exe' and 
'Stop Moodle.exe' will stop working and you'll have to use xampp 
executable files. (xammp-control.exe)


## TEAM MEMBERS
<hr>
<table>
    <tr>
        <td align="center">
            <a href="https://www.linkedin.com/in/mousumi-dutta-b4199a217/">
                <img src="https://i.postimg.cc/dJf525qf/97080528.jpg" width="120px;" alt=""/>
                <p><b>Mousumi Dutta</b></p><br />
            </a>
        </td>
       <td align="center">
            <a href="https://www.linkedin.com/in/parichoynandi/">
                <img src="https://i.postimg.cc/ZRK00hxN/1633196362960.jpg" width="120px;" alt=""/>
                <p><b>Parichoy Nandi</b></p><br />
            </a>
        </td>
        <td align="center">
            <a href="https://www.linkedin.com/in/azmat-ali-14542a21b/">
                <img src="https://i.postimg.cc/sXtKsK5t/1633268635353.jpg" width="120px;" alt=""/>
                <p><b>Azmat Ali</b></p><br />
            </a>
       </td>
       <td align="center">
            <a href="https://www.linkedin.com/in/swarnamoy-ghosh-681746224/">
                <img src="https://i.postimg.cc/fy4B75qM/image.png" width="120px;" alt=""/>
                <p><b>Swarnamoy Ghosh</b></p><br />
            </a>
        </td>
       </tr>
</table>
