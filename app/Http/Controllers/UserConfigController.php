<?php

namespace App\Http\Controllers;

use App\Models\UserConfig;
use App\Http\Requests\StoreUserConfigRequest;
use App\Http\Requests\UpdateUserConfigRequest;
use Illuminate\Http\Request;

class UserConfigController extends Controller
{
    public function testShell()
    {
        // Obter userExams e userConfig dos cookies
        if (request()->hasCookie('userExamsCookie')) {
            $cookie = request()->cookie('userExamsCookie');
            $userExams = json_decode($cookie, true);
        }

        if (request()->hasCookie('userConfigCookie')) {
            $cookie = request()->cookie('userConfigCookie');
            $userConfig = json_decode($cookie, true);
        }

        // Gerar o inputText para passar ao script
        $inputText = json_encode([
            'userExams' => $userExams,
            'userConfig' => $userConfig
        ]);

        // Executar o comando Node.js, passando o inputText gerado
        $command = 'node ' . base_path('/resources/scripts/gemini.js') . ' ' . escapeshellarg($inputText);

        // Chama o script Node.js e captura a saída
        $aiOutput = shell_exec($command);
        $aiOutput = json_decode($aiOutput, true);

        //Save em cookie
        $cookie = cookie('aiOutputCookie', json_encode($aiOutput), 60 * 24 * 7);

        // Verifica se a resposta foi recebida corretamente
        if ($aiOutput) {
            // Processar e enviar a resposta para o frontend
            return redirect()->route('welcome')
                ->with('success', 'Plano de estudo gerado!')
                ->with('aiOutput', $aiOutput)
                ->with('userExams', $userExams)
                ->with('userConfig', $userConfig)
                ->withCookie($cookie);
        } else {
            return redirect()->route('welcome')
                ->with('error', 'Erro ao gerar o plano de estudo');
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userConfig = [];

        // Verificamos se o cookie 'userConfigCookie' existe
        if (request()->hasCookie('userConfigCookie')) {
            // Obtemos o cookie 'userConfigCookie'
            $cookieConfig = request()->cookie('userConfigCookie');
            // Decodificamos o JSON para um array
            $userConfig = json_decode($cookieConfig, true);
        }

        // Passamos os dados para a view
        return view('user.index', compact('userConfig'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Take data from cookie and pass to view
        if (request()->hasCookie('userConfigCookie')) {
            // Obtemos o cookie
            $cookie = request()->cookie('userConfigCookie');

            // Decodificamos o JSON para um array
            $userConfig = json_decode($cookie, true);

            // Passamos os dados para a view
            return view('user.create', compact('userConfig'));
        }
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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



    public function saveExam(Request $request)
    {
        // Obtemos os dados do formulário
        $userExam = $request->except('_token');

        // Verificamos se já existe o cookie com os exames
        $existingExams = [];
        if (request()->hasCookie('userExamsCookie')) {
            // Obtemos o cookie
            $cookieExams = request()->cookie('userExamsCookie');
            // Decodificamos o JSON para um array
            $existingExams = json_decode($cookieExams, true);
        }

        // Adicionamos os novos dados ao array existente
        // Caso o cookie já tenha dados, adicionar ao array
        $existingExams[] = $userExam;

        // Convertemos o array atualizado para JSON
        $jsonExams = json_encode($existingExams);

        // Criamos o cookie (duração: 1 semana = 60*24*7 minutos)
        $cookie = cookie('userExamsCookie', $jsonExams, 60 * 24 * 7);

        // Redirecionamos com o cookie atualizado
        return redirect()->route('welcome')
                        ->with('success', 'Exams guardados com sucesso!')
                        ->withCookie($cookie);
    }

    public function welcomeIndex()
    {
        $userConfig = [];
        $userExams = [];
        $aiOutput = session('aiOutput') ?? [];

        if (request()->hasCookie('userConfigCookie')) {
            $cookieConfig = request()->cookie('userConfigCookie');
            $userConfig = json_decode($cookieConfig, true);
        }

        if (request()->hasCookie('userExamsCookie')) {
            $cookieExams = request()->cookie('userExamsCookie');
            $userExams = json_decode($cookieExams, true);
        }

        if (request()->hasCookie('aiOutputCookie')) {
            $cookieAiOutput = request()->cookie('aiOutputCookie');
            $aiOutput = json_decode($cookieAiOutput, true);
        }
        return view('welcome', compact('userConfig', 'userExams', 'aiOutput'));
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
