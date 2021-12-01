<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtapaRequest;
use App\Models\Cliente;
use App\Models\Etapa;
use Illuminate\Http\Request;

class EtapaController extends Controller
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

        return view('etapas.index', ['etapas' => Etapa::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etapas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtapaRequest $request)
    {
        Etapa::create([
            'nome' => $request['nome']
        ]);

        return redirect()->route('etapas.index');
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
    public function edit(Etapa $etapa)
    {
        return view('etapas.update', ['etapa' => $etapa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EtapaRequest $request, Etapa $etapa)
    {
        $etapa->update([
            'nome' => $request['nome']
        ]);

        return redirect()->route('etapas.edit', $etapa->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etapa $etapa)
    {
        $etapa->delete();

        return redirect()->route('etapas.index');
    }
}
