<?php

namespace App\Http\Controllers;

use App\Models\Tempo;
use Illuminate\Http\Request;

class TempoController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Tempo::create([
            'id_tarefa' => $request->id_tarefa,
            'inicio' => $request->inicio,
            'fim' => $request->fim
        ]);

        return json_encode(['tipo' => 'success']);
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
    public function edit(Tempo $tempo)
    {
        return json_encode(['route' => route('tempos.update', $tempo->id), 'tempo' => $tempo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tempo $tempo)
    {

        $tempo->update([
            'id_tarefa' => $request->id_tarefa,
            'inicio' => $request->inicio,
            'fim' => $request->fim
        ]);

        return json_encode(['tipo' => 'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tempo $tempo)
    {
        $id_tarefa = $tempo->id_tarefa;

        $tempo->delete();

        return redirect()->route('tarefas.tempos', $id_tarefa);
    }
}
