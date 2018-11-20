create schema web601_assess;
use web601_assess;
drop table if exists tblCompetitionSubmission;
drop table if exists tblQuestionAnswer;
drop table if exists tblUserVisited;
drop table if exists tblUser;
drop table if exists tblLocation;
drop table if exists tblAnswer;
drop table if exists tblQuestion;
drop table if exists tblValue;

create table tblUser(
	user_id int not null primary key auto_increment, 
    user_name varchar(20), 
    user_password binary(32),
    user_status char(1),
    user_date timestamp, 
    user_lesson int
    )
engine InnoDB;

create table tblLocation(
	page_id varchar(50) not null primary key, 
    description varchar(100)
    )    
engine InnoDB;
    
create table tblUserVisited(
	user_id int not null, 
    page_id varchar(50) not null,
    primary key (user_id, page_id),
    constraint fk_user 
		foreign key (user_id) 
        references tblUser(user_id) on delete cascade,
    constraint fk_page 
		foreign key (page_id) 
        references tblLocation(page_id) on delete cascade
    )
engine InnoDB;
    
create table tblAnswer(
	answer_id int primary key auto_increment,
    answer_text varchar(20)
    )
engine InnoDB;
    
create table tblQuestion(
	question_id int primary key auto_increment, 
    question_text varchar(100)    
    )
engine InnoDB;
    
create table tblQuestionAnswer(
	question_id int, 
    answer_id int, 
    correct bool,
    primary key (question_id, answer_id),
    constraint fk_question1 foreign key (question_id) references tblQuestion(question_id) on delete cascade,
    constraint fk_answer1 foreign key (answer_id) references tblAnswer(answer_id) on delete cascade
    )
engine InnoDB;
    
create table tblcompetitionsubmission(
	compsub_id int primary key auto_increment,
    user_id int,
    school_name varchar(30),
    class varchar (20),
    email varchar (50),
    phone varchar (15),
    question_id int, 
    answer_id int,
    correct tinyint,
    constraint fk_user2 foreign key (user_id) references tblUser(user_id) on delete cascade,
	constraint fk_question2 foreign key (question_id) references tblQuestion(question_id) on delete cascade,
    constraint fk_answer2 foreign key (answer_id) references tblAnswer(answer_id) on delete cascade   
    )
engine InnoDB;

create table tblValue(
	id VARCHAR(255), 
    description varchar(100),
    shortName int
    )
engine InnoDB;