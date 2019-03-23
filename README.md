Project Information
*******************

- Project		: Bookshop System
- Version		: 1
- Author		: Nhlakanipho Brian Sihlongonyane - SinaweTech
- Start date	: 01 March 2019

Description
***********

To allow schools to record, loan out to students and also track text books.

Tools Used
**********

- PHP
- Twitter bootstrap
- Mysql
- Python

System Modules
**************

1) Admin Module
	- Manage users
	- Manage system logs
	- Configure emails
2) School Module
	- Configure school information
	- Manage subjects
	- Manage classes
	- Manage streams
    - Manage students
3) Books
	- Manage books
	- Manage book copies
	- Loan out books
	- Track books
4) Reports
	- Loaned out books
	- Books in stock
	- New books
    - Old books
    - Student statement

SETUP
*****

1) Create users and privileges : use commandline or phpmyadmin

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'P@ssw0rd';
CREATE USER 'bookshop'@'localhost' IDENTIFIED BY 'P@ssw0rd';

CREATE DATABASE book_shop_dev;
CREATE DATABASE book_shop_trn;
CREATE DATABASE book_shop_prd;

GRANT ALL PRIVILEGES ON book_shop_dev.* TO 'admin'@'localhost' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON book_shop_trn.* TO 'admin'@'localhost' WITH GRANT OPTION;
GRANT SELECT, UPDATE ON book_shop_prd.* TO 'bookshop'@'localhost';

2) Import databases 
    - From phpmyadmin, import the three database located in the db folder using file schema.sql

3) Create initial user
    - Modify db/seed.php to change system instance
    - From commandline, run "php db/seed.php"

4) Login and start using system
