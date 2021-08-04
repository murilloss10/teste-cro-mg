<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

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
            'titration' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
        ];
        $messages = [
            'required' => 'Campo obrigatório',
        ];
        $request->validate($rules, $messages);

        Profile::updateOrCreate(
            [
                'user_id' => $user_id
            ],
            [
                'titration' => $request->input('titration'),
                'cpf' => $request->input('cpf'),
                'rg' => $request->input('rg'),
                'created_by' => $user_id,
                'updated_by' => $user_id
            ]
        );

        return redirect()->action([ProfileController::class, 'edit']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {

        $user_id = Auth::id();
        $dataUser = User::find($user_id);
        $dataProfiles = Profile::where('user_id', $user_id)->get();
        return view('profile')->with('dataUser', $dataUser)->with('dataProfiles', $dataProfiles);

    }


}
