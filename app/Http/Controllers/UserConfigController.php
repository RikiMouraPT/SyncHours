<?php

namespace App\Http\Controllers;

use App\Models\UserConfig;
use App\Http\Requests\StoreUserConfigRequest;
use App\Http\Requests\UpdateUserConfigRequest;
use Illuminate\Http\Request;

class UserConfigController extends Controller
{
    //Save form to cookie
    public function save(Request $request)
    {
        // Obtemos os dados do formulário
        $userConfig = $request->except('_token');

        // Convertemos para JSON para guardar no cookie
        $jsonConfig = json_encode($userConfig);

        // Criamos o cookie (duração: 1 semana = 60*24*7 minutos)
        $cookie = cookie('userConfigCookie', $jsonConfig, 60 * 24 * 7);

        // Redirecionamos com o cookie anexado
        return redirect()->route('user.index')
                        ->with('success', 'Configuração guardada com sucesso!')
                        ->withCookie($cookie);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Verificamos se o cookie existe
        if (request()->hasCookie('userConfigCookie')) {
            // Obtemos o cookie
            $cookie = request()->cookie('userConfigCookie');

            // Decodificamos o JSON para um array
            $userConfig = json_decode($cookie, true);

            // Passamos os dados para a view
            return view('user.index', compact('userConfig'));
        }

        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserConfigRequest $request, UserConfig $userConfig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserConfig $userConfig)
    {
        //
    }
}
