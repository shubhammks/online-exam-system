use assi5;
delimiter //
 create procedure top5()
 begin    
	declare emp_no int;
	declare emp_name varchar(50);
	declare emp_sal decimal(10,2);
	declare done int default 0; 
	declare cur cursor for
	select empno ,empname,salary from employee order by salary desc LIMIT 5;
	declare continue handler for not found set done=1;
	open cur;
	repeat 
	featch cur into emp_no,emp_name,salary; 
	if not done then
		select emp_no,emp_name,salary
     end if ;
		until done end repate;  
     close cur;
end //
     
     
     
     
     
     
CREATE TABLE employee ( empno INT PRIMARY KEY, empname VARCHAR(50),joindate DATE, designation VARCHAR(50), salary DECIMAL(10, 2) )


delimiter;


CREATE PROCEDURE Top5employees()
BEGIN

DECLARE empno INT;
DECLARE empname VARCHAR(50);
DECLARE empsal DECIMAL(10, 2);
DECLARE done INT DEFAULT 0;

DECLARE cur CURSOR FOR
SELECT empno, empname, salary FROM employee ORDER BY salary DESC LIMIT 5;

DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

OPEN cur;

REPEAT
    FETCH cur INTO empno, empname, empsal;
    IF NOT done THEN
        SELECT empno, empname, empsal;
    END IF;
UNTIL done END REPEAT;

CLOSE cur;
