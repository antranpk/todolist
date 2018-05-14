
-- Set some SQL Variables --

SET @name = 'My First Task';
SET @endDate = '2018-05-16';
SET @startDate = '2018-05-13';


CREATE TABLE IF NOT EXISTS Tasks (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  start_date datetime NOT NULL DEFAULT '2018-05-14 00:00:00',
  end_date datetime NOT NULL DEFAULT '2018-05-15 00:00:00',
  PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

INSERT INTO Tasks (name, start_date, end_date) VALUES
(@name, @startDate, @endDate);