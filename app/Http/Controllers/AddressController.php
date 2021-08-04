<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user_id = Auth::id();
        $dataAddresses = Address::where('user_id', $user_id)->get();
        return view('address')->with('dataAddresses', $dataAddresses);

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
            'street' => 'required|min:3|max:36',
            'number' => 'required',
            'district' => 'required|min:3|max:36',
            'zip_code' => 'required|min:9',
            'complement' => 'max:50'
        ];
        $messages = [
            'required' => 'Campo obrigatório',
            'street.min' => 'Digite uma rua com ao menos 3 caracteres',
            'street.max' => 'Digite uma rua com no máximo 36 caracteres',
            'district.min' => 'Digite uma rua com ao menos 3 caracteres',
            'district.max' => 'Digite uma rua com no máximo 36 caracteres',
            'zip_code.min' => 'Digite um CEP  válido',
            'complement.max' => 'Digite um complemento com no máximo 50 caracteres',
        ];
        $request->validate($rules, $messages);

        Address::create([
            'id' => Str::uuid()->toString(),
            'user_id' => $user_id,
            'street' => $request->input('street'),
            'number' => $request->input('number'),
            'complement' => $request->input('complement'),
            'district' => $request->input('district'),
            'zip_code' => $request->input('zip_code'),
        ]);

        return redirect()->action([AddressController::class, 'index']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        
        $user_id = Auth::id();
        $dataAddresses = Address::where('user_id', $user_id)->get();
        return view('forms-edit.address-edit')->with('dataAddress', $address)->with('dataAddresses', $dataAddresses);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $user_id = Auth::id();

        $rules = [
            'street' => 'required|min:3|max:36',
            'number' => 'required',
            'district' => 'required|min:3|max:36',
            'zip_code' => 'required|min:9',
            'complement' => 'max:50'
        ];
        $messages = [
            'required' => 'Campo obrigatório',
            'street.min' => 'Digite uma rua com ao menos 3 caracteres',
            'street.max' => 'Digite uma rua com no máximo 36 caracteres',
            'district.min' => 'Digite uma rua com ao menos 3 caracteres',
            'district.max' => 'Digite uma rua com no máximo 36 caracteres',
            'zip_code.min' => 'Digite um CEP  válido',
            'complement.max' => 'Digite um complemento com no máximo 50 caracteres',
        ];
        $request->validate($rules, $messages);

        Address::find($request->id)->update(array(
            'street' => $request->input('street'),
            'number' => $request->input('number'),
            'district' => $request->input('district'),
            'zip_code' => $request->input('zip_code'),
            'complement' => $request->input('complement'),
        ));

        return redirect()->action([AddressController::class, 'index']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        
        $address->delete();
        return redirect()->action([AddressController::class, 'index']);

    }
}
