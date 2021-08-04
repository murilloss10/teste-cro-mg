<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Auth;

use App\Models\Address;
use App\Models\Film;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard(){

        $user_id = Auth::id();
        $dataAddresses = Address::where('user_id', $user_id)->get();
        $dataFilms = Film::where('user_id', $user_id)->get();
        return view('dashboard')
            ->with('dataAddresses', $dataAddresses)
            ->with('dataFilms', $dataFilms);

    }

}
