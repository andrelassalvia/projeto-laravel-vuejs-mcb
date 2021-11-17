<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Fazendo set $this->cliente com $cliente
    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
    }

    public function index()
    {
        // Ordem reversa por ID
        $cliente = $this->cliente->all()->sortByDesc("id");
       
        return response()->json($cliente, 200);
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->cliente->rules(), $this->cliente->feedback());
        
        $cliente = $this->cliente->create($request->all());
        return response()->json($cliente, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = $this->cliente->find($id);
        if($cliente === null){
            return response()->json(['erro' => 'Cliente procurado não está cadastrado.'], 404);
        }

        // dd($cliente);
        
        return response()->json($cliente, 200);
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
        $request->validate($this->cliente->rules(), $this->cliente->feedback());

        $cliente = $this->cliente->find($id);
        if($cliente === null){
            return response()->json(['erro' => 'Cliente procurado não está cadastrado.'], 404);
        }
        $cliente->update($request->all());
        return response()->json($cliente, 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = $this->cliente->find($id);
        if($cliente === null){
            return response()->json(['erro' => 'Cliente procurado não está cadastrado.'], 404);
        }
        $cliente->delete();
        return response()->json(['msg' => "Registro $cliente->nome excluido."], 200);
    }
}
