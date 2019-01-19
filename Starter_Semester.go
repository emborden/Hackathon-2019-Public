package main

import (
	"encoding/json"
	"log"
	"net/http"

	"github.com/gorilla/mux"
)

/*
https://www.youtube.com/watch?v=SonwZ6MF5BE
used this as a source
*/
//Gathering struct

type Gathering struct {
	ID   string `json:"id"`
	Name string `json:"name"`
}

//User Struct
type UserContent struct {
	user    string `json:"username"`
	token   string `json:"token"`
	text    string `json:"text"`
	video   string `json:"video"`
	picture string `json: "picture"`
}

//Init books var as a slice Gathering struct
var gatherings []Gathering

//Get all Gatherings
func getGatherings(w http.ResponseWriter, r *http.Request) {
	// w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(gatherings)
}

//get single Gathering
func getGathering(w http.ResponseWriter, r *http.Request) {

}

// create a new Gathering
func createGathering(w http.ResponseWriter, r *http.Request) {

}
func updateGathering(w http.ResponseWriter, r *http.Request) {

}
func deleteGathering(w http.ResponseWriter, r *http.Request) {

}
func main() {
	//Init Router
	r := mux.NewRouter()
	//mockData - @todo - implment DB
	gatherings = append(gatherings, Gathering{ID: "1", Name: "CSCE 156"})
	gatherings = append(gatherings, Gathering{ID: "2", Name: "CSCE 155"})
	gatherings = append(gatherings, Gathering{ID: "3", Name: "CSCE 451"})
	gatherings = append(gatherings, Gathering{ID: "4", Name: "CSCE 231"})
	//Route Handlers /Endpoints
	r.HandleFunc("/api/Gatherings", getGatherings).Methods("GET")
	r.HandleFunc("/api/Gatherings/{id}", getGathering).Methods("GET")
	r.HandleFunc("/api/Gatherings", createGathering).Methods("POST")
	r.HandleFunc("/api/Gatherings/{id}", updateGathering).Methods("PUT")

	log.Fatal(http.ListenAndServe(":8000", r))

}
