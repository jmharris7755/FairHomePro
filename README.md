# FairHomePro Project UI '21, Aug-December 2021, Harris, Wisecarver

# FairHomePro Project (FHP)∗

| Justin Harris Department of Computer Engineering University of Idaho, USA Harr1433@vandals.uidaho.edu	| Jeremey Wisecarver Department of Computer Science University of Idaho, USA Wise9314@vandals.uidaho.edu |
| --- | --- |

## ABSTRACT

SQL is a domain-specific language that is used for managing data in relational database management systems. In this document, we focus on the development of a Fair Home Pro project given to us in CS360 (Database Management) at the University of Idaho. The project goal was to design a system from the ground up that uses MySQL as the backend, a front-end web system, and a middle-end system to query the MySQL database.

## FHP CONCEPTS

• MySQL; Web-Based Graphical user interface (GUI); RDMS -\&gt Relation Database Management System;

## KEYWORDS

SQL; PHP; MySQL; JavaScript; HTML; Database; PHP;

## 1 INTRODUCTION

The scope of this paper is to describe the inner workings of our Fair Home Pro project. From here on out FHP will refer to Fair Home Pro. The main goal of the FHP project is to create a website where a homeowner can get a service contract with a service professional at the lowest price possible. The FHP project has two major components to it. The front end, also known as the user interface (UI) is the first component. The UI is talked about in section 3. The back end, also known as the Relational Database Management System (RDMS) is the second component. The RDMS is mentioned in section 1.1, 2, and 4.

## RDMS using MySQL

For our RDMS, we are using MySQL to host our database schema “fairhomepro”. MySQL is one of the most popular open-source SQL databases and was the primary query language taught in CS360. Since MySQL is widely used, it has a lot of forum and community support to assist us when creating our database. Although MySQL lack good performance scaling for larger databases, it was the correct choice for the FHP project’s database.

## 1.2 Tools used in Development

Through-out the development of this project, multiple tools were utilized by each member of the project. The tools used in our development were Visual Studio Code (VS code), phpMyAdmin, Github and Github Desktop, Discord and XAMPP. VS Code was the primary IDE used to write, compile, test, and review source code. Each team members had multiple extensions installed, which they were allowed to choose themselves, in VS Code to make the development process as easy as possible. All team members used phpMyAdmin to create, manage, and test the FHP database. The management of the source code for this project was handled through GitHub and GitHub Desktop. Using GitHub allowed us to create a centralized master repository of our source code. From the master repository, team members would then create a separate branch off the master repository to develop individual portions of the overall project. Once the individual portions were finished, team members could then create a pull request to merge the branch back into the master repository. This enabled the team to compartmentalize the project into smaller portions, allowing team members to stay focused on one task at a time to piece the whole project together. All team communications and meetings were handled through Discord. We would regularly post references, progress updates, and questions in Discord which allowed us to stay up to date on the overall development of the project. XAMPP was just to install and run the PHP and MySQL services on each team members development device. 

## 1.3 Languages used in Development

The languages used to create this project include PHP, HTML, MySQL, JavaScript (JS) and Cascading Style Sheets (CSS). Since this project mainly involved sending and retrieving data to and from a database, using MySQL alongside PHP was an obvious choice for us especially since MySQL was the primary language used throughout the CS360 course.  Using PHP enabled us to easily connect directly to our database, as well as query, update, and insert data without the need for additional API packages or routing options that other languages like JavaScript would require. Since PHP was chosen as our primary language to run the back end of our project, HTML was the best option to use for this project’s front end. PHP and HTML work together simply by declaring the PHP source file as an HTML type of document inside of the source file. Then, if we needed to use PHP within the HTML declaration, we would just use PHP tags to identify those specific sections as PHP code. The JS and CSS were used in tandem with the HTML to create additional functionality and styling for the project. Using JS were able to allow additional windows to be displayed on top of our webpage instead of always redirecting to another page. CSS was used to add additional styling using inline CSS directly coded into the HTML sections of code and global style sheets from Bootstrap. Additionally, some CSS style sheets were created by team members to customize additional styling. Some of the biggest challenges that we faced was learning how to use each of these coding languages separately and using them together. Neither member had used any of the languages used in this project prior to the assignment of this project, so there was a steep learning curve concerning how to use the syntax of each of these languages.

If you would like to continue the full PDF report can be found under the Reports directory. https://github.com/jmharris7755/FairHomePro/blob/master/Reports/FairHomePro%20Final%20Report.pdf

## XAMMP Project ZIP

Download and extract the XAMMP folder under C:\XAMMP It is hosted on IPFS. https://ipfs.io/ipfs/QmXhPRzRRvNHcZ1XBMVm4Y6tQckJFWrZCQ34PxDas3yc9p?filename=xampp.zip
