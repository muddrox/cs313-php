CREATE TABLE usernames (
  id SERIAL PRIMARY KEY NOT NULL,
  name VARCHAR(256) UNIQUE NOT NULL,
  password VARCHAR(256) NOT NULL
);

CREATE TABLE highscores (
  id SERIAL PRIMARY KEY NOT NULL,
  userId int NOT NULL REFERENCES usernames(id),
  score INT NOT NULL
);

CREATE TABLE achievements (
  id SERIAL PRIMARY KEY NOT NULL,
  title VARCHAR(256) NOT NULL,
  info VARCHAR(256) NOT NULL
);

CREATE TABLE userAchievements (
  id SERIAL PRIMARY KEY NOT NULL,
  userId int NOT NULL REFERENCES usernames(id),
  achievementId int NOT NULL REFERENCES achievements(id)
);

CREATE TABLE feedback (
  id SERIAL PRIMARY KEY NOT NULL,
  userId int NOT NULL REFERENCES usernames(id),
  content varchar(512) NOT NULL
);

INSERT INTO usernames (name, password) VALUES 
  ('Ted', 'pass'),
	('Felisha', 'pass'),
	('Kip', 'pass'),
	('Betsy', 'pass');

INSERT INTO highscores (userId, score) VALUES
	(1, 50),
	(2, 30),
	(3, 40),
	(4, 65);

INSERT INTO achievements (title, info) VALUES 
  ('Over Achiever', 'Got over 400 points!'),
	('Epic Failure', 'You got 0 points!  Good job?'),
	('Why did the chicken cross the road?', 'To get away from you!  Over 15 nuclear chickens detonated.'),
	('Hey Batta Batta, swing!', 'Struck out 10 bats');

INSERT INTO userAchievements (userId, achievementId) VALUES 
  (1, 2),
  (4, 3),
  (1, 4);

INSERT INTO feedback (userId, content) VALUES 
  (1, 'I like Bench Press Ben.'),
  (2, 'I really think the game needs better graphics.'),
  (3, 'BUG!  I saw a bug, the chickens started flickering, FIX IT!'),
  (4, 'What goes on that brain of yours?  People would like to know...');

GRANT ALL ON highscores TO bpb_user;
GRANT ALL ON usernames TO bpb_user;
GRANT ALL ON achievements TO bpb_user;
GRANT ALL ON userAchievements TO bpb_user;
GRANT ALL ON feedback TO bpb_user;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public TO bpb_user;