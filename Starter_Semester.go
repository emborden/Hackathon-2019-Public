package main

import (
	"encoding/json"
	"io/ioutil"
	"log"
	"math/rand"
	"net/http"
	"strconv"

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

//Create Index Page
func createIndexPage(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "text/html")
	content, err := ioutil.ReadFile("web_client/semesterSurfer.html")
	if err != nil {
		log.Fatal(err)
	}
	w.Write(content)

}

//Get all Gatherings
func getGatherings(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(gatherings)
}

//get single Gathering
func getGathering(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	params := mux.Vars(r) //get params
	//loop through gatherings and find id
	for _, item := range gatherings {
		if item.ID == params["id"] {
			json.NewEncoder(w).Encode(item)
			return
		}
	}
	json.NewEncoder(w).Encode(&Gathering{})
}

// create a new Gathering
func createGathering(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	var gathering Gathering
	_ = json.NewDecoder(r.Body).Decode(&gathering)
	gathering.ID = strconv.Itoa(rand.Intn(10000000)) //mock not safe
	gatherings = append(gatherings, gathering)
	json.NewEncoder(w).Encode(gathering)
}
func updateGathering(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	params := mux.Vars(r)
	for index, item := range gatherings {
		if item.ID == params["id"] {
			gatherings = append(gatherings[:index], gatherings[index+1:]...)
			var gathering Gathering
			_ = json.NewDecoder(r.Body).Decode(&gathering)
			gathering.ID = params["id"] //strconv.Itoa(rand.Intn(10000000)) //mock not safe
			gatherings = append(gatherings, gathering)
			json.NewEncoder(w).Encode(gathering)
			return
		}
	}
	json.NewEncoder(w).Encode(gatherings)
}
func deleteGathering(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	params := mux.Vars(r)
	for index, item := range gatherings {
		if item.ID == params["id"] {
			gatherings = append(gatherings[:index], gatherings[index+1:]...)
			break
		}
	}
	json.NewEncoder(w).Encode(gatherings)
}
func main() {
	initApp()
	//Init Router
	r := mux.NewRouter()
	//mockData - @todo - implment DB
	gatherings = append(gatherings, Gathering{ID: "1", Name: "CSCE 156"})
	gatherings = append(gatherings, Gathering{ID: "2", Name: "CSCE 155"})
	gatherings = append(gatherings, Gathering{ID: "3", Name: "CSCE 451"})
	gatherings = append(gatherings, Gathering{ID: "4", Name: "CSCE 231"})
	//Route Handlers /Endpoints
	r.HandleFunc("/index", createIndexPage).Methods("GET")
	r.HandleFunc("/api/Gatherings", getGatherings).Methods("GET")
	r.HandleFunc("/api/Gatherings/{id}", getGathering).Methods("GET")
	r.HandleFunc("/api/Gatherings", createGathering).Methods("POST")
	r.HandleFunc("/api/Gatherings/{id}", updateGathering).Methods("PUT")
	r.HandleFunc("/api/Gatherings/{id}", deleteGathering).Methods("DELETE")
	log.Fatal(http.ListenAndServe(":8000", r))

}
