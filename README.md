

**PES UNIVERSITY**

**Department of Computer Science & Engineering**

**DBMS - UE20CS301**

**Mini Project**

**Payroll Management System**

**Submitted to:**

**Submitted By:**

Dr. Geetha D

Vijith BG

Associate Professor

PES2UG20CS402

V Semester

Section G





**Table of Contents**

**Title**

**Sl.No**

**1**

**Page No**

**Description and**

**scope**

3

**2**

**3**

**4**

**5**

**ER Diagram**

**Relational Schema**

**DDL statements**

4

**5**

**6**

**7**

**Populating the**

**Database**

**6**

**7**

**8**

**9**

**Join Queries**

**~~Aggregate functions~~**

**SET operations**

**8-10**

**11-13**

**14-15**

**16-17**

**Procedures and**

**functions**

**10**

**11**

**12**

**Triggers and cursors**

**~~Developing Frontend~~**

**References**

**18-20**

**21-35**

**36**





**1. Short Description and Scope of the Project**

“Employee Payroll Management System” is designed to make the existing

manual system automatic with the help of computerised equipment and

full-edged computer software, fulfilling their requirements, so that their

valuable data and information can be stored for a longer period with easy

access and manipulation of the same. The required software is easily

available and easy to work with. This web application can maintain and

view computerised records without getting redundant entries. The project

describes how to manage user data for good performance and provide

better services for the client.

The proposed project “Employee Payroll Management System” has been

developed to overcome the problems faced in the practicing of manual

system. This software is built to eliminate and, in some cases, reduce the

hardships faced by the existing system. Moreover, this system is designed

for need of the company to carry out its operations in a smooth and

effective manner.

*Outcome:* This system is expected to be user friendly and will offer easy

access to data as well as services such as employee’s salaries, deductions,

other payments, net pay, bonuses, and the creation of pay stub.

This system deals with the financial aspects of employee's Salary,

Deductions, allowances, Net pay. The user can view the account of every

employee's and update their payments, and the user can also manage

deductions, modify overtime and salary rate.





**2. ER Diagram**





**3. Relational Schema**





**4. DDL statements - Building the database**

CREATE TABLE employee (empl\_id int(10) NOT NULL AUTO\_INCREMENT,name

varchar(20),fname varchar(20),gender varchar(6),emp\_type varchar(20),division

varchar(30),deduction int(10),overtime\_hrs int(10),bonus int(10),PRIMARY

KEY(empl\_id));

CREATE TABLE deduction (deduction\_id int NOT NULL

AUTO\_INCREMENT,medical int(20),tax int(20),loans int(20),gsis int(20),empl\_id

int, empl\_type varchar(20),PRIMARY KEY(deduction\_id) , FOREIGN KEY(empl\_id)

REFERENCES employee(empl\_id));

CREATE TABLE overtime (ot\_id int(10) NOT NULL AUTO\_INCREMENT,rate int(10)

NOT NULL,empl\_id int, empl\_type varchar(20),FOREIGN KEY(empl\_id)

REFERENCES employee(empl\_id),PRIMARY KEY (`ot\_id`));

CREATE TABLE salary(

salary\_id int(10) NOT NULL AUTO\_INCREMENT,

salary\_rate int(10) NOT NULL,

empl\_id int, empl\_division varchar(20), FOREIGN KEY(empl\_id) REFERENCES

employee(empl\_id),

PRIMARY KEY (salary\_id)

);

CREATE TABLE IF NOT EXISTS admin (

id int(5) NOT NULL AUTO\_INCREMENT,

username varchar(20) NOT NULL,

password varchar(20) NOT NULL,

PRIMARY KEY (id)

);

CREATE TABLE PAYMENT(pay\_id int NOT NULL AUTO\_INCREMENT, pay\_date

date , empl\_id int, net\_pay int ,PRIMARY KEY (pay\_id), FOREIGN KEY (empl\_id)

REFERENCES employee(empl\_id))





**5. Populating the Database**

INSERT INTO `employee` (`emp\_id`, `fname`, `lname`, `gender`,

`emp\_type`, `division`, `deduction`, `overtime`, `bonus`) VALUES (16,

'Daniel', 'Crisopher', 'Male', 'Job Order', 'Engineering', 12, 10, 10000), (17,

'Ganesh', 'B', 'Male', 'Job Order', 'Engineering', 5, 100, 10000), (19, 'Parth',

'Shetty', 'Male', 'Regular', 'Engineering', 11, 120, 12000), (20, 'Bobby',

'John', 'Male', 'Regular', 'Accounting', 28, 0, 0), (21, 'Shreya', 'Patel',

'Female', 'Regular', 'Accounting', 21, 12, 12000), (22, 'Prateek', 'Baskar',

'Male', 'Regular', 'Human Resource', 11, 12, 1200), (23, 'Kavya', 'Shet',

'Female', 'Casual', 'Supply', 11, 15, 10000);

INSERT INTO `payment` (`pay\_id`, `emp\_id`, `paydate`, `net\_pay`)

VALUES (1, 16, '2021-04-24', 50000), (2, 17, '2021-12-28', 60000), (3, 18,

'2022-01-23', 12000), (4, 19, '2022-02-14', 140000), (5, 20, '2022-03-16',

80000), (6, 21, '2022-04-24', 56000), (7, 22, '2022-05-12', 90900), (8, 23,

'2022-06-07', 100000), (9, 24, '2022-07-07', 32000);

INSERT INTO `deductions` (`deduction\_id`, `Medical`, `tax`, `gsis`,

`loans`, `emp\_id`) VALUES (1, 5, 6, 5, 5, 16), (2, 12, 2, 2, 12, 17), (3, 3, 3,

3, 12, 18), (4, 5, 6, 8, 10, 19), (5, 4, 6, 5, 8, 20), (6, 5, 10, 2, 2, 21);

INSERT INTO `overtime` (`ot\_id`, `rate`, `emp\_id`) VALUES (2, 2, 16), (3,

3, 17), (4, 4, 18), (5, 5, 19), (6, 6, 20), (7, 7, 21), (8, 8, 22);

INSERT INTO `salary` (`salary\_id`, `salary\_rate`, `emp\_id`) VALUES (2,

90000, 16), (3, 30000, 17), (4, 35000, 18), (5, 40000, 19), (6, 30000, 20);

INSERT INTO `user` (`id`, `username`, `password`) VALUES (2, 'admin',

'admin'), (3, 'vijith', 'admin');





**6. Join Queries**

Showcase at least 4 join queries

Write the query in English Language, Show the equivalent SQL statement and also a

screenshot of the query and the results

\1. Retrieve the details of the employee with their base salary rate greater than the average salary

Inner Join()

SELECT \*

FROM employee

INNER JOIN salary ON employee.emp\_id=salary.emp\_id

WHERE salary\_rate>(SELECT AVG(salary\_rate) from salary);

\2. Retrieve the details of the employee with their base salary rate is greater than twice the

minimum salary

Left Join

SELECT \*

FROM employee

LEFT JOIN salary ON employee.emp\_id=salary.emp\_id





WHERE salary\_rate>(SELECT 2\*MIN(salary\_rate) from salary);

\3. Retrieve the details of the female employee with their base salary rate

Right Join

SELECT \*

FROM employee

RIGHT JOIN salary ON employee.emp\_id=salary.emp\_id

WHERE gender = 'Female';

\4. Retrieve the details of the employee whose percentage deduction is less than the average

deduction percentage of all the employees

Outer Join

SELECT \* FROM employee

LEFT JOIN salary ON employee.emp\_id = salary.emp\_id





UNION

SELECT \* FROM employee

RIGHT JOIN salary ON employee.emp\_id = salary.emp\_id

WHERE deduction<(SELECT AVG(deduction) FROM employee);





**7. Aggregate Functions**

Showcase at least 4 Aggregate function queries

Write the query in English Language, Show the equivalent SQL statement and also a

screenshot of the query and the results

\1. Find the number of employees working overtime more than 15 hrs.

COUNT ()

SELECT COUNT(emp\_id)

FROM employee

WHERE overtime>15

GROUP BY gender

ORDER BY fname;

\2. Find the employee fname and lname having MIN percentage of deductions.

MIN()

SELECT fname,lname,MIN(deduction)

FROM employee

WHERE deduction = (SELECT MIN(deduction) from employee)

ORDER BY fname;





\3. Find the employee fname and lname having MAX hours of overtime.

MAX ()

SELECT fname,lname,MAX(overtime)

FROM employee

WHERE overtime = (SELECT MAX(overtime) from employee)

ORDER BY fname;





\4. Find the AVG amount of salary company can give to its employees.

AVG()

SELECT AVG(salary\_rate)

FROM salary;





**8. Set Operations**

Showcase at least 4 Set Operations queries

Write the query in English Language, Show the equivalent SQL statement and also a

screenshot of the query and the results

\1. UNION()

SELECT \* FROM salary

UNION

SELECT \* FROM overtime;

\2. List all the employee id’s of the employee who have deduction in their salary

INTERSECT()

SELECT emp\_id from salary

INTERSECT

SELECT emp\_id from deductions;





\3. List all the employee id’s of the employee who have no bonuses in their salary

MINUS()

SELECT emp\_id FROM salary

LEFT JOIN overtime USING (emp\_id)

WHERE overtime.emp\_id IS NULL;

\4. UNION ALL

SELECT \* FROM salary

UNION ALL

SELECT \* FROM overtime;





**9. Functions and Procedures**

Create a Function and Procedure. State the objective of the function / Procedure. Run and

display the results.

Objective: List all the employees who have worked overtime for more than 10 hours

Function:

DELIMITER $$

CREATE FUNCTION Overtime\_10(overtime int)

RETURNS VARCHAR(50)

BEGIN

IF overtime>10 THEN

RETURN ("Worked overtime for more than 10 hrs");

ELSE

RETURN ("Worked overtime for less than 10 hrs");

END IF;

END;

$$

DELIMITER ;

SELECT fname,lname,division,Overtime\_10(deduction) from employee;

Procedure:

Objective: List all the engineers in the company with their bonuses and deduction

DELIMITER $$

CREATE PROCEDURE GetEngineerNames()

BEGIN

SELECT fname,lname,deduction,bonus FROM employee where division = 'Engineering' and bonus >

(SELECT AVG(bonus) from employee);

END

$$

DELIMITER ;





CALL GetEngineerNames()





**10.**

**Triggers and Cursors**

Create a Trigger and a Cursor. State the objective. Run and display the results.

Objective: Write a trigger on insert to salary table when a new base salary rate gets

added and make sure that value is above 18000.

Trigger:

DELIMITER $$

CREATE TRIGGER BSAL

BEFORE INSERT

ON salary

FOR EACH ROW

BEGIN

DECLARE ERR VARCHAR(50);

SET ERR = "Base Salary Rate cannot be less than 18000";

IF(NEW.salary\_rate < 18000) THEN

SIGNAL SQLSTATE '45000'

SET MESSAGE\_TEXT = ERR;

END IF;

END;

$$

DELIMITER ;





Cursor:

Objective: Retrieve all the distinct divisions of the employees.

DELIMITER $$

CREATE OR REPLACE PROCEDURE type\_division (

INOUT type\_list varchar(4000)

)

BEGIN

DECLARE finished INTEGER DEFAULT 0;

DECLARE type varchar(100) DEFAULT "";

DEClARE cur\_for\_division

CURSOR FOR

SELECT DISTINCT(division) FROM employee;

DECLARE CONTINUE HANDLER

FOR NOT FOUND SET finished = 1;

OPEN cur\_for\_division;

get\_cur\_division: LOOP

FETCH cur\_for\_division INTO type;

IF finished = 1 THEN

LEAVE get\_cur\_division;

END IF;

SET type\_list = CONCAT(type,";",type\_list);

END LOOP get\_cur\_division;

CLOSE cur\_for\_division;

END$$

DELIMITER ;

SET @type\_list = "";

CALL type\_division(@type\_list);

SELECT @type\_list;









**11.**

**Developing a Frontend**

The frontend should support

\1. Addition, Modification and Deletion of records from any chosen table

\2. There should be an window to accept and run any SQL statement and display the result

Before inserting:









After:





After deleting employee Vijith,Bg:





Modification:





Sample code:

Add\_deductions.php

<?php

require("db.php");

@$id

@$Medical

@$tax

= $\_POST['deduction\_id'];

= $\_POST['Medical'];

= $\_POST['tax'];

= $\_POST['gsis'];

@$gsis

// @$love

@$loans

= $\_POST['pag\_ibig'];

= $\_POST['loans'];





$sql = mysqli\_query($conn,"UPDATE deductions SET tax='$tax', gsis='$gsis',

loans='$loans', Medical='$Medical' WHERE deduction\_id='1'");

if($sql)

{

?>

<script>

alert('Deductions successfully updated...');

window.location.href='home\_deductions.php';

</script>

<?php

}

else {

}

echo "Not Successfull!";

?>

Add\_employee.php

<?php

$conn = mysqli\_connect('localhost', 'root', '');

if (!$conn)

{

die("Database Connection Failed" . mysqli\_error());

}

$select\_db = mysqli\_select\_db($conn,'payroll');

if (!$select\_db)

{

die("Database Selection Failed" . mysqli\_error());

}

if(isset($\_POST['submit'])!="")

{

$fname = $\_POST['fname'];

$lname = $\_POST['lname'];

$gender = $\_POST['gender'];

$type

= $\_POST['emp\_type'];

$division = $\_POST['division'];

$sql = mysqli\_query($conn,"INSERT into employee(fname, lname, gender, emp\_type,

division)VALUES('$fname','$lname','$gender', '$type', '$division')");

if($sql)

{

?>

<script>

alert('Employee had been successfully added.');

window.location.href='home\_employee.php?page=emp\_list';





</script>

<?php

}

else

{

?>

<script>

alert('Invalid.');

window.location.href='index.php';

</script>

<?php

}

}

?>

Add\_overtime.php

<?php

require("db.php");

@$id

@$overtime

= $\_POST['ot\_id'];

= $\_POST['rate'];

$sql = mysqli\_query($conn,"UPDATE overtime SET rate='$overtime' WHERE ot\_id='1'");

if($sql)

{

?>

<script>

alert('Overtime rate per hour successfully changed...');

window.location.href='home\_salary.php';

</script>

<?php

}

else {

echo "Not Successfull!";

}

?>

Home\_deductions.php

<?php

$conn = mysqli\_connect('localhost', 'root', '');

if (!$conn)

{

die("Database Connection Failed" . mysqli\_error());





}

$select\_db = mysqli\_select\_db($conn ,'payroll');

if (!$select\_db)

{

die("Database Selection Failed" . mysqli\_error());

}

$query = mysqli\_query($conn ,"SELECT \* from deductions where deduction\_id = '1'");

while($row=mysqli\_fetch\_array($query))

{

$id

= $row['deduction\_id'];

$Medical = $row['Medical'];

$tax

= $row['tax'];

$gsis

= $row['gsis'];

// $love

$loans

= $row['pag\_ibig'];

= $row['loans'];

$total

= $Medical + $tax + $gsis + $loans;

}

?>

Home\_employee.php

<?php

include("auth.php"); //include auth.php file on all secure pages

include("add\_employee.php");

$sql = mysqli\_query($conn,"SELECT \* from deductions WHERE deduction\_id='1'");

while($row = mysqli\_fetch\_array($sql))

{

$Medical = $row['Medical'];

$tax = $row['tax'];

$gsis = $row['gsis'];

$loans = $row['loans'];

}

?>

<?php

$conn = mysqli\_connect('localhost', 'root', '');

if (!$conn)

{

die("Database Connection Failed" . mysqli\_error());

}

$select\_db = mysqli\_select\_db($conn ,'payroll');

if (!$select\_db)

{

die("Database Selection Failed" . mysqli\_error());





}

$query=mysqli\_query($conn,"select \* from employee ORDER BY emp\_id asc")or

die(mysqli\_error());

while($row=mysqli\_fetch\_array($query))

{

$id =$row['emp\_id'];

$lname =$row['lname'];

$fname =$row['fname'];

$type =$row['emp\_type'];

$deduction =$row['deduction'];

$overtime =$row['overtime'];

$bonus =$row['bonus'];

?>

Home\_salary.php

<?php

$query = mysqli\_query($conn ,"SELECT \* from overtime WHERE ot\_id = '1'");

while($row=mysqli\_fetch\_array($query))

{

@$rate = $row['rate'];

}

$query = mysqli\_query($conn ,"SELECT \* from salary WHERE salary\_id = '1'");

while($row=mysqli\_fetch\_array($query))

{

@$salary = $row['salary\_rate'];

}

?>

<?php

$query = mysqli\_query($conn ,"SELECT \* from overtime where ot\_id = '1'");

while($row=mysqli\_fetch\_array($query))

{

$rate = $row['rate'];

}

$query = mysqli\_query($conn ,"SELECT \* from salary where salary\_id='1'");

while($row=mysqli\_fetch\_array($query))

{

$salary\_rate = $row['salary\_rate'];

}

$query = mysqli\_query($conn ,"SELECT \* from employee");

while($row=mysqli\_fetch\_array($query))

{

$lname

$fname

$deduction

= $row['lname'];

= $row['fname'];

= $row['deduction'];





$overtime

$bonus

= $row['overtime'];

= $row['bonus'];

$over = $row['overtime'] \* $rate;

$bonus = $row['bonus'];

$deduction = $row['deduction'];

$income = $over + $bonus + $salary\_rate;

$netpay = $income-(($income\*$deduction)/100);

?>

Index.php

<?php

$conn = mysqli\_connect('localhost', 'root', '');

if (!$conn)

{

die("Database Connection Failed" . mysqli\_error());

}

$select\_db = mysqli\_select\_db($conn,'payroll');

if (!$select\_db)

{

die("Database Selection Failed" . mysqli\_error());

}

$query = mysqli\_query($conn,"SELECT \* from deductions");

while($row=mysqli\_fetch\_array($query))

{

$id

= $row['deduction\_id'];

$Medical = $row['Medical'];

$tax

= $row['tax'];

$gsis

= $row['gsis'];

// $love

$loans

= $row['pag\_ibig'];

= $row['loans'];

$total

= $Medical + $tax + $gsis + $loans;

}

?>

Login.php

<?php

require('db.php');

session\_start();

// If form submitted, insert values into the database.

if (isset($\_POST['username']))

{

$username = $\_POST['username'];

$password = $\_POST['password'];





$username = stripslashes($username);

$username = mysqli\_real\_escape\_string($conn,$username);

$password = stripslashes($password);

$password = mysqli\_real\_escape\_string($conn,$password);

//Checking is user existing in the database or not

$query = "SELECT \* FROM `user` WHERE username='$username' and password='$password'";

$result = mysqli\_query($conn,$query) or die(mysqli\_error());

$rows = mysqli\_num\_rows($result);

if($rows==1)

{

$\_SESSION['username'] = $username;

header("Location: index.php");

}

else

{

?>

<script>

alert('Invalid Keyword, please try again.');

window.location.href='login.php';

</script>

<?php

}

}

else

{

?>

Update\_account.php

<?php

include("db.php");

include("auth.php");

$id

= $\_POST['id'];

$deduction = $\_POST['deduction'];

$overtime = $\_POST['overtime'];

$bonus

= $\_POST['bonus'];

$sql = mysqli\_query($conn,"UPDATE employee SET deduction='$deduction', overtime='$overtime',

bonus='$bonus' WHERE emp\_id='$id'");

if ($sql)

{

?>





<script>

alert('Account successfully updated.');

window.location.href='home\_employee.php';

</script>

<?php

}

else

{

echo "Invalid";

}

?>

Update\_employee.php

<?php

include("db.php");

include("auth.php");

$id

= $\_POST['id'];

$fname = $\_POST['fname'];

$lname = $\_POST['lname'];

$gender = $\_POST['gender'];

$division = $\_POST['division'];

$emp\_type = $\_POST['emp\_type'];

$sql = mysqli\_query($conn,"UPDATE employee SET emp\_type='$emp\_type',

fname='$fname',lname='$lname', gender='$gender', division='$division' WHERE emp\_id='$id'");

if ($sql)

{

?>

<script>

alert('Employee successfully updated.');

window.location.href='home\_employee.php';

</script>

<?php

}

else

{

?>

<script>

alert('Invalid action.');

window.location.href='home\_employee.php';

</script>

<?php

}

?>





Update\_overtime.php

<?php

require("db.php");

@$id

@$rate

= $\_POST['ot\_id'];

= $\_POST['rate'];

$sql = mysqli\_query($conn,"UPDATE overtime SET rate = '$rate' WHERE ot\_id='1'");

if($sql)

{

?>

<script>

alert('Overtime rate successfully changed...');

window.location.href='home\_salary.php';

</script>

<?php

}

else {

echo "Not Successfull!";

}

?>

Update\_salary.php

<?php

require("db.php");

@$id

= $\_POST['salary\_id'];

@$salary

= $\_POST['salary\_rate'];

$sql = mysqli\_query($conn,"UPDATE salary SET salary\_rate='$salary' WHERE

salary\_id='1'");

if($sql)

{

?>

<script>

alert('Salary rate successfully changed...');

window.location.href='home\_salary.php';

</script>

<?php

}

else {

echo "Not Successfull!";





}

?>





**12. Conclusion References**

**Conclusion**

This project is built keeping in mind that it is to be used by only one user that is

the admin. It is built for use in small scale organization where the number of

employees is limited. According to the requested requirement the admin can

add, manipulate, update and delete all employee data in his organization. The

admin can add new departments and delete them. The admin can also add

predefined pay grades for the employees. The required records can be easily

viewed by the admin anytime time he wants in an instant. The payment of the

employee is based on monthly basis. Numerous validations implemented would

enable the admin to enter accurate data. The main objective of this framework is

to save time, make the system cost effective and management records

efficiently.

Reference 1: <https://www.w3schools.com/>

Reference 2: <https://www.geeksforgeeks.org/>

Reference 3: <https://www.javatpoint.com/>

Reference 4: [~~https://www.youtube.com/~~](https://www.youtube.com/)

