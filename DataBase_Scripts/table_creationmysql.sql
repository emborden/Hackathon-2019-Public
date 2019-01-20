/*create database cornhack2019*/
use cornhack2019;
DROP TABLE IF EXISTS Person;
DROP TABLE IF EXISTS Gathering;
DROP TABLE IF EXISTS Photo;
DROP TABLE IF EXISTS Video;
DROP TABLE IF EXISTS Post;

CREATE TABLE Person(
person_ID INT NOT NULL,
pass VARCHAR(60) NOT NULL,
handle VARCHAR(60) NOT NULL,
karma INT NOT NULL,
primary key(person_ID)
);

CREATE TABLE Gathering
(
	gathering_id INT NOT NULL,
	gname VARCHAR(255),
    primary key(gathering_id)
);

CREATE TABLE Photo
(
	photo_id INT NOT NULL,
	location VARCHAR(255),
    primary key(photo_id)
);

CREATE TABLE Video
(
	video_id INT NOT NULL,
	location VARCHAR(255),
    primary key(video_id)
);
CREATE TABLE post
(
	post_id INT NOT NULL,
	person_id INT NOT NULL,
	photo_id INT,
	video_id INT,
	gathering_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	votes INT,
	content VARCHAR(255),
    primary key(post_id),
    foreign key(person_id) References Person(Person_ID),
    foreign key(photo_id) References photo(photo_id),
    foreign key(video_id) References video(video_id),
    foreign key(gathering_id) References gathering(gathering_id)
    
);
