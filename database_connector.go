package main

import (
	"database/sql"
	"fmt"
	"time"

	_ "github.com/lib/pq"
)

const (
	DB_USER     = "postgres"
	DB_PASSWORD = "postgres"
	DB_NAME     = "test"
)

type App struct {
	*sql.DB
}

func initApp() (*App, error) {
	dbinfo := fmt.Sprintf("user=%s password=%s dbname=%s sslmode=disable",
		DB_USER, DB_PASSWORD, DB_NAME)
	db, err := sql.Open("postgres", dbinfo)
	if err != nil {
		return nil, err
	}
	return &App{db}, nil
}

const (
	qGatheringsFromPost = "SELECT (post_id, user_id, photo_id, video_id, gathering_id, creation_timestamp, votes, content)" +
		"FROM  POST WHERE gathering_id=$1"
)

type Post struct {
	ID           int
	UserID       int
	PhotoID      int
	VideoID      int
	GatheringID  int
	CreationTime time.Time
	Votes        int
	Content      string
}

func (app *App) getGatheringPost(gatheringID int) ([]Post, error) {
	var posts []Post
	rows, err := app.Query(qGatheringsFromPost, gatheringID)
	if err != nil {
		return nil, nil
	}
	for rows.Next() {
		var post Post
		rows.Scan(&post.ID, post.UserID, post.PhotoID, post.VideoID, post.GatheringID, post.CreationTime, post.Votes, post.Content)
		posts = append(posts, post)
	}
	return posts, nil
}
