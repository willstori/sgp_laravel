<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaRequest;
use App\Models\Tarefa;
use App\Models\Projeto;
use App\Models\Prioridade;
use App\Models\Status;
use App\Models\Tempo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Dados['tarefas'] = Tarefa::with(['projeto', 'prioridade', 'status'])->paginate(10);

        return view('tarefas.index', $Dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Dados['projetos'] = Projeto::with('cliente')->get();

        $Dados['prioridades'] = DB::table('tarefas_prioridades')->get();

        $Dados['status'] = DB::table('tarefas_status')->get();

        $Dados['users'] = User::all();

        return view('tarefas.create', $Dados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarefaRequest $request)
    {

        Tarefa::create([
            'id_projeto' => $request->id_projeto,
            'id_prioridade' => $request->id_prioridade,
            'id_status' => $request->id_status,
            'id_user' => $request->id_user,
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'data_inicio'=> $request->data_inicio,
            'data_fim' => $request->data_fim,
            'faturada' => $request->faturada
        ]);

        return redirect()->route('tarefas.index');
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
    public function edit(Tarefa $tarefa)
    {
        $Dados['projetos'] = Projeto::all();
        $Dados['prioridades'] = Prioridade::all();
        $Dados['status'] = Status::all();
        $Dados['users'] = User::all();

        $Dados['tarefa'] = $tarefa;

        return view('tarefas.update', $Dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TarefaRequest $request, Tarefa $tarefa)
    {
        $tarefa->update([
            'id_projeto' => $request->id_projeto,
            'id_prioridade' => $request->id_prioridade,
            'id_status' => $request->id_status,
            'id_user' => $request->id_user,
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'data_inicio'=> $request->data_inicio,
            'data_fim' => $request->data_fim,
            'faturada' => $request->faturada
        ]);

        return redirect()->route('tarefas.edit', $tarefa->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index');
    }


    public function tempos(Tarefa $tarefa)
    {
        $Dados['tarefa'] = $tarefa;
        $Dados['tempos'] = Tempo::all();
        return view('tarefas.tempos', $Dados);
    }


}
