<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $user_id = Auth::id();
        $dataFilms = Film::where('user_id', $user_id)->get();
        return view('film')->with('dataFilms', $dataFilms);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();

        $rules = [
            'title' => 'required',
            'release_year' => 'required',
            'director' => 'required',
        ];
        $messages = [
            'required' => 'Campo obrigatório',
        ];
        $request->validate($rules, $messages);

        Film::create([
            'id' => Str::uuid()->toString(),
            'user_id' => $user_id,
            'title' => $request->input('title'),
            'release_year' => $request->input('release_year'),
            'director' => $request->input('director'),
            'image_film' => 'https://scontent.fmoc6-1.fna.fbcdn.net/v/t1.6435-9/107594426_171946494311021_2464024522398253236_n.jpg?_nc_cat=101&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=mDEmFQmWKtgAX-2CzKO&_nc_ht=scontent.fmoc6-1.fna&oh=3da16961e2172d9367b17fa7305ecaab&oe=612EC86E'
        ]);

        return redirect()->action([FilmController::class, 'index']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        
        $user_id = Auth::id();
        $dataFilms = Film::where('user_id', $user_id)->get();
        return view('forms-edit.film-edit')->with('dataFilm', $film)->with('dataFilms', $dataFilms);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $rules = [
            'title' => 'required',
            'release_year' => 'required',
            'director' => 'required',
        ];
        $messages = [
            'required' => 'Campo obrigatório',
        ];
        $request->validate($rules, $messages);

        $user_id = Auth::id();

        Film::find($request->id)->update(array(
            'title' => $request->input('title'),
            'release_year' => $request->input('release_year'),
            'director' => $request->input('director'),
            'image_film' => 'https://scontent.fmoc6-1.fna.fbcdn.net/v/t1.6435-9/107594426_171946494311021_2464024522398253236_n.jpg?_nc_cat=101&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=mDEmFQmWKtgAX-2CzKO&_nc_ht=scontent.fmoc6-1.fna&oh=3da16961e2172d9367b17fa7305ecaab&oe=612EC86E'
        ));

        return redirect()->action([FilmController::class, 'index']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        
        $film->delete();
        return redirect()->action([FilmController::class, 'index']);

    }
}
