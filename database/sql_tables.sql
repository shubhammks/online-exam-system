show databases;
create database exam_portal;
use exam_portal;
CREATE TABLE `mst_admin` (
  `loginid` varchar(20) default NULL,
  `pass` varchar(20) default NULL
);

CREATE TABLE `mst_question` (
  `que_id` int(5) NOT NULL auto_increment,
  `test_id` int(5) default NULL,
  `que_desc` varchar(150) default NULL,
  `ans1` varchar(75) default NULL,
  `ans2` varchar(75) default NULL,
  `ans3` varchar(75) default NULL,
  `ans4` varchar(75) default NULL,
  `true_ans` int(1) default NULL,
  PRIMARY KEY  (`que_id`)
);

drop table mst_question;
show tables;
desc mst_question;

CREATE TABLE `mst_result` (
  `login` varchar(20) default NULL,
  `test_id` int(5) default NULL,
  `test_date` date default NULL,
  `score` int(3) default NULL
) ;

CREATE TABLE `mst_subject` (
  `sub_id` int(5) NOT NULL auto_increment,
  `sub_name` varchar(25) default NULL,
  PRIMARY KEY  (`sub_id`)
);

CREATE TABLE `mst_test` (
  `test_id` int(5) NOT NULL auto_increment,
  `sub_id` int(5) default NULL,
  `test_name` varchar(30) default NULL,
  `total_que` varchar(15) default NULL,
  PRIMARY KEY  (`test_id`)
);

CREATE TABLE `mst_user` (
  `user_id` int(5) NOT NULL auto_increment,
  `login` varchar(20) default NULL,
  `pass` varchar(20) default NULL,
  `username` varchar(30) default NULL,
  `address` varchar(50) default NULL,
  `city` varchar(15) default NULL,
  `phone` int(10) default NULL,
  `email` varchar(30) default NULL,
  PRIMARY KEY  (`user_id`)
);


CREATE TABLE `mst_useranswer` (
  `sess_id` varchar(80) default NULL,
  `test_id` int(11) default NULL,
  `que_des` varchar(200) default NULL,
  `ans1` varchar(50) default NULL,
  `ans2` varchar(50) default NULL,
  `ans3` varchar(50) default NULL,
  `ans4` varchar(50) default NULL,
  `true_ans` int(11) default NULL,
  `your_ans` int(11) default NULL
);