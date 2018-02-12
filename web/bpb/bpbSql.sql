CREATE TABLE highscores (
  id SERIAL PRIMARY KEY,
  player varchar(256) NOT NULL,
  score INT NOT NULL
);

CREATE TABLE usernames (
  id SERIAL PRIMARY KEY,
  name VARCHAR(256) NOT NULL
);

CREATE TABLE achievements (
  id SERIAL PRIMARY KEY,
  title VARCHAR(256) NOT NULL,
  info VARCHAR(256) NOT NULL
);

CREATE TABLE playerAchievements (
  id SERIAL PRIMARY KEY,
  nameId int NOT NULL REFERENCES highscores(id),
  achievementId int NOT NULL REFERENCES achievements(id)
);

CREATE TABLE feedback (
  id SERIAL PRIMARY KEY,
  userId int NOT NULL REFERENCES usernames(id),
  content varchar(512) NOT NULL
);

INSERT INTO highscores (player, score) VALUES
	('Brock', 500),
	('Kasidy', 300),
	('Jake', 400),
	('Colton', 650),
	('Alex', 200),
	('Braidon', 600),
	('Shaun', 20),
	('Kylie', 470),
  ('Topher', 900),
  ('Riley', 5);

INSERT INTO usernames (name) 
	VALUES ('Brock');

INSERT INTO usernames (name) 
	VALUES ('Kasidy');

INSERT INTO usernames (name) 
	VALUES ('Jake');

INSERT INTO usernames (name) 
	VALUES ('Colton');

INSERT INTO achievements (title, info) 
	VALUES ('Over Achiever', 'Got over 500 points!');

INSERT INTO achievements (title, info) 
	VALUES ('Epic Failure', 'You got 0 points!  Good job?');

INSERT INTO achievements (title, info) 
	VALUES ('Why did the chicken cross the road?', 'To get away from you!  Over 100 nuclear chickens detonated.');

INSERT INTO achievements (title, info) 
	VALUES ('Hey Batta Batta, swing!', 'Struck out 25 bats');

INSERT INTO playerAchievements (nameId, achievementId) VALUES 
  (1, 4),
  (4, 1),
  (1, 3),
  (2, 4),
  (3, 2),
  (3, 3);

INSERT INTO feedback (userId, content) VALUES 
  (1, 'I like Bench Press Ben.'),
  (2, 'I really think the game needs better graphics.'),
  (3, 'BUG!  I saw a bug, the chickens started flickering, FIX IT!'),
  (4, 'What goes on that brain of yours?  People would like to know...');