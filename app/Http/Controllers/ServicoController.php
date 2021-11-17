<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Servico $servico){
        $this->servico = $servico;
    }

    public function index()
    {
       $servico = $this->servico->all()->sortBy('nome');
       return response()->json($servico, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servico = $this->servico->create($request->all());
        return response()->json($servico, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servico = $this->servico->find($id);
        if($servico === null){
            return response(['erro' => 'Servico procurado não está cadastrado.'], 404);
        }
        return response()->json($servico, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $servico = $this->servico->find($id);
        if($servico === null){
            return response()->json(['erro' => 'Servico procurado não está cadastrado.'], 404);
        }
        $servico->update($request->all());
        return response()->json($servico, 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servico = $this->servico->find($id);
        if($servico === null){
            return response()->json(['erro' => 'Servico procurado não está cadastrado.'], 404);
        }
        $servico->delete();
        return response()->json(['msg' => "Registro de servico $servico->nome foi excluido com sucesso."], 200);
    }
}
