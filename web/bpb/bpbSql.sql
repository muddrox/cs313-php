CREATE TABLE highscores (
  id SERIAL PRIMARY KEY NOT NULL,
  player varchar(256) NOT NULL,
  score INT NOT NULL
);

CREATE TABLE usernames (
  id SERIAL PRIMARY KEY NOT NULL,
  name VARCHAR(256) UNIQUE NOT NULL,
  password VARCHAR(256) NOT NULL
);

CREATE TABLE achievements (
  id SERIAL PRIMARY KEY NOT NULL,
  title VARCHAR(256) NOT NULL,
  info VARCHAR(256) NOT NULL
);

CREATE TABLE playerAchievements (
  id SERIAL PRIMARY KEY NOT NULL,
  nameId int NOT NULL REFERENCES highscores(id),
  achievementId int NOT NULL REFERENCES achievements(id)
);

CREATE TABLE feedback (
  id SERIAL PRIMARY KEY NOT NULL,
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

INSERT INTO usernames (name, password) VALUES 
  ('Brock', 'pass'),
	('Kasidy', 'pass'),
	('Jake', 'pass'),
	('Colton', 'pass');

INSERT INTO achievements (title, info) VALUES 
  ('Over Achiever', 'Got over 500 points!'),
	('Epic Failure', 'You got 0 points!  Good job?'),
	('Why did the chicken cross the road?', 'To get away from you!  Over 100 nuclear chickens detonated.'),
	('Hey Batta Batta, swing!', 'Struck out 25 bats');

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

GRANT ALL ON highscores TO bpb_user;
GRANT ALL ON usernames TO bpb_user;
GRANT ALL ON achievements TO bpb_user;
GRANT ALL ON playerAchievements TO bpb_user;
GRANT ALL ON feedback TO bpb_user;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public TO bpb_user;