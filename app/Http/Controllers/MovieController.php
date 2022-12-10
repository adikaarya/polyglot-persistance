<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function getMovieShow() {
        $response = Http::acceptJson()->get(env("API_URL").'/api/movies');

        // check if movie is empty
        if (empty(json_decode($response->body()))) {
            return view('movie.index', [
                'movies' => null,
            ]);
        }
        
        // return view with movies
        return view('movie.index', [
            'movies' => json_decode($response->body()),
        ]);
    }

    public function createMovie() {
        return view('movie.store');
    }

    public function createMoviePost(Request $request) {
        $response = Http::post(env("API_URL").'/api/movies', [
            'title' => $request->title,
            'year' => $request->year,
            'director' => $request->director,
            'description' => $request->description,
            'imageUrl' => $request->imageurl,
            'rating' => $request->rating
        ]);

        if (!$response->successful()) {
            return redirect()->back()->withInput()->withErrors($response->json());
        }
        return redirect()->to('/');
    }

    public function editMovie(Request $request) {
        $response = Http::get(env("API_URL").'/api/movies/'.$request->id);  
        return view('movie.edit', ['movie' => json_decode($response->body())]);
    }

    public function updateMovie(Request $request) {
        $response = Http::put(env("API_URL").'/api/movies/'.$request->id, [
            'title' => $request->title,
            'year' => $request->year,
            'director' => $request->director,
            'description' => $request->description,
            'imageUrl' => $request->imageurl,
            'rating' => $request->rating
        ]);

        if (!$response->successful()) {
            return redirect()->back()->withInput()->withErrors($response->json());
        }
        return redirect()->to('/');
    }


    public function showMovieById(Request $request) {
        $response = Http::get(env("API_URL").'/api/movies/'.$request->id);  
        return view('movie.detail', ['movie' => json_decode($response->body())]);
    }

    public function deleteMovie(Request $request) {
        $response = Http::delete(env("API_URL").'/api/movies/'.$request->id);  
        return redirect()->to('/');
    }
}
