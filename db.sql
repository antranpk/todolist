
-- Set some SQL Variables --

SET @name1 = 'My First Task 1';
SET @endDate1 = '2018-05-16';
SET @startDate1 = '2018-05-13';
SET @status1 = 1;

SET @name2 = 'My First Task 2';
SET @endDate2 = '2018-05-17';
SET @startDate2 = '2018-05-14';
SET @status2 = 2;

SET @name3 = 'My First Task 3';
SET @endDate3 = '2018-05-18';
SET @startDate3 = '2018-05-15';
SET @status3 = 3;

SET @name4 = 'My First Task 4';
SET @endDate4 = '2018-05-19';
SET @startDate4 = '2018-05-16';
SET @status4 = 1;

SET @name5 = 'My First Task 5';
SET @endDate5 = '2018-05-20';
SET @startDate5 = '2018-05-17';
SET @status5 = 3;

CREATE TABLE IF NOT EXISTS Tasks (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  start_date date NOT NULL DEFAULT '2018-05-14',
  end_date date NOT NULL DEFAULT '2018-05-15',
  status int NOT NULL,
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

INSERT INTO Tasks (name, start_date, end_date, status) VALUES
(@name1, @startDate1, @endDate1, @status1),
(@name2, @startDate2, @endDate2,@status2),
(@name3, @startDate3, @endDate3,@status3),
(@name4, @startDate4, @endDate4,@status4),
(@name5, @startDate5, @endDate5,@status5);