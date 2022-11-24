<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use services;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apitmdb = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIzNGZiNTg0YjAwNzIxMDBjYWY2ZTkyMzgzMjM2ODI1OSIsInN1YiI6IjYzN2Y2Nzc4ODViMTA1MDBkZjY1ODI3YyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.YfsQFplb_3UECChuo6iB2lI-V911jgpGARklDnR4Mww';

        $tmdbPopuler = Http::withToken($apitmdb)
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];
        $listGenre = Http::withToken($apitmdb)
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];
        $genre = collect($listGenre)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        return view('index', [
            'tmdbPopuler' => $tmdbPopuler,
            'genre' => $genre
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
