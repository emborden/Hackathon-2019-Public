CREATE TABLE users
(
	user_id serial,
	password char(60),
	username text,
	karma integer,
);

CREATE TABLE post
(
	post_id serial PRIMARY KEY,
	user_id integer REFERENCES users ON DELETE CASCADE,
	gathering_id integer REFERENCES gathering ON DELETE CASCADE,
	creation_timestamp date DEFAULT NOW,
	votes integer,
	content text,
)

CREATE TABLE gathering
(
	gathering_id serial PRIMARY KEY,
	name text,
)

CREATE TABLE photo
(
	photo_id serial PRIMARY KEY,
	location text,
)

CREATE TABLE video
(
	video_id serial PRIMARY KEY,
	location text,
)