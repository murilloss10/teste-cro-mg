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
        $registry = Profile::where('user_id', $user_id)->first();

        if($registry == null){

            $rules = [
                'titration' => 'required|min:15',
                'cpf' => 'required|min:14|unique:profiles',
                'rg' => 'required|min:10|unique:profiles',
            ];
            $messages = [
                'required' => 'Campo obrigatório',
                'titration.min' => 'Digite um Título válido',
                'cpf.min' => 'Digite um CPF válido',
                'rg.min' => 'Digite um RG válido'
            ];
            $request->validate($rules, $messages);

        }
        else {

            if($request->input('cpf') == $registry->cpf && $request->input('rg') != $registry->rg){
            
                $rules = [
                    'titration' => 'required|min:15',
                    'cpf' => 'required|min:14',
                    'rg' => 'required|min:10|unique:profiles',
                ];
                $messages = [
                    'required' => 'Campo obrigatório',
                    'titration.min' => 'Digite um Título válido',
                    'cpf.min' => 'Digite um CPF válido',
                    'rg.min' => 'Digite um RG válido'
                ];
                $request->validate($rules, $messages);
    
            }
            else if($request->input('rg') == $registry->rg && $request->input('cpf') != $registry->cpf){
    
                $rules = [
                    'titration' => 'required|min:15',
                    'cpf' => 'required|min:14|unique:profiles',
                    'rg' => 'required|min:10',
                ];
                $messages = [
                    'required' => 'Campo obrigatório',
                    'titration.min' => 'Digite um Título válido',
                    'cpf.min' => 'Digite um CPF válido',
                    'rg.min' => 'Digite um RG válido'
                ];
                $request->validate($rules, $messages);
    
            }
            else if($request->input('cpf') == $registry->cpf && $request->input('rg') == $registry->rg){
    
                $rules = [
                    'titration' => 'required|min:15',
                    'cpf' => 'required|min:14',
                    'rg' => 'required|min:10',
                ];
                $messages = [
                    'required' => 'Campo obrigatório',
                    'titration.min' => 'Digite um Título válido',
                    'cpf.min' => 'Digite um CPF válido',
                    'rg.min' => 'Digite um RG válido'
                ];
                $request->validate($rules, $messages);
    
            }
            else {

                $rules = [
                    'titration' => 'required|min:15',
                    'cpf' => 'required|min:14|unique:profiles',
                    'rg' => 'required|min:10|unique:profiles',
                ];
                $messages = [
                    'required' => 'Campo obrigatório',
                    'titration.min' => 'Digite um Título válido',
                    'cpf.min' => 'Digite um CPF válido',
                    'rg.min' => 'Digite um RG válido'
                ];
                $request->validate($rules, $messages);
    
            }

        }
        

        Profile::updateOrCreate(
            [
                'user_id' => $user_id,
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
