<Ticket-Booking>
Copyright (C) <2013>  
<Abhijeet Ashok Muneshwar>
<openingknots@gmail.com>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
 any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

----------------------------------------------------------------------------

Steps to set up this website in WAMP.

1) Create user in WAMP.
eg.
grant all privileges on *.* to 'abhijeet'@localhost identified by 'abhijeet';
Note: Change the username & password in db_login.php according to your username & password.


2) Create database with name 'book'.

3) Import tables in 'book' database. Go to import tab in WAMP & give path of below file to import.
Ticket-Booking\database\book.sql

4) Done.
