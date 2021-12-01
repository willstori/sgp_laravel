<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjetoRequest;
use App\Models\Cliente;
use App\Models\Etapa;
use App\Models\Projeto;
use Illuminate\Http\Request;

class ProjetoController extends Controller
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
        $Dados['projetos'] = Projeto::with(['cliente', 'etapa'])->paginate(10);
        return view('projetos.index', $Dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projetos.create', ['clientes' => Cliente::all(), 'etapas' => Etapa::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjetoRequest $request)
    {
        Projeto::create([
            'id_cliente' => $request->id_cliente,
            'id_etapa' => $request->id_etapa,
            'nome' => $request->nome,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim
        ]);

        return redirect()->route('projetos.index');
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
    public function edit(Projeto $projeto)
    {
        return view('projetos.update', [
            'projeto' => $projeto,
            'clientes' => Cliente::all(),
            'etapas' => Etapa::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjetoRequest $request, Projeto $projeto)
    {
        $projeto->update([
            'id_cliente' => $request->id_cliente,
            'id_etapa' => $request->id_etapa,
            'nome' => $request->nome,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim
        ]);

        return redirect()->route('projetos.edit', $projeto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projeto $projeto)
    {
        $projeto->delete();
        return redirect()->route('projetos.index');
    }
}
