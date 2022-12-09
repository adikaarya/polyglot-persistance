<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function getMovieShow() {
        $response = Http::acceptJson()->get(env("API_URL").'/api/movies');
        return view('welcome', [
            'movies' => json_decode($response->body()),
        ]);
    }

    public function createMovie() {
        return view('edit');
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

//        @dd(json_decode($response->body()));
        return redirect()->to('/');
    }

    public function showMovieById(Request $request) {
        $response = Http::get(env("API_URL").'/api/movies/'.$request->id);
        return view('detail', ['movie' => json_decode($response->body())]);
    }
}
