use web601_assess;

insert into tblUser(user_name, user_password, user_status, user_lesson) values
	('Joe', unhex(sha2('password', 256)),'O',1),
    ('Bob', unhex(sha2('password', 256)),'O',2),
    ('Sue', unhex(sha2('password', 256)),'O',3);

insert into tblLocation values
	('home', 'the home page'),
    ('find', 'finding a guitar'),
    ('lesson', 'lesson page'),
    ('less1', 'lesson one'),
    ('less2', 'lesson two'),
    ('less3', 'lesson three'),
    ('songs', 'songs page'),
    ('care', 'guitar care page'),
    ('comp', 'competition page');
    
insert into tblQuestion (question_text) values
	('What is the order of string names for a normal tuned guitar?'),
    ('Which chord includes the use of all six strings?'),
    ('Which chord uses the least number of fretted strings?');
    
insert into tblAnswer (answer_text) values
	('EBADGE'),
    ('EADGBE'),
    ('EDGEBE'),
    ('The C chord'),
    ('The D chord'),
    ('The G chord'),
    ('The Em chord');
    
insert into tblQuestionAnswer values
	(1, 1, false),
    (1, 2, true),
    (1, 3, false),
    (2, 4, false),
    (2, 5, false),
    (2, 6, true),
    (3, 7, true),
    (3, 5, false),
    (3, 6, false);