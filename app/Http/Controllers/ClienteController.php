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
        
        if($request->file('cpf_imagem') != null){
            $imagem_cpf = $request->file('cpf_imagem');
            $cpf_urn = $imagem_cpf->store('imagens/cpf', 'public');
        }else{
            $cpf_urn = null;
        }

        if($request->file('rg_imagem') != null){
            $imagem_rg = $request->file('rg_imagem');
            $rg_urn = $imagem_rg->store('imagens/rg', 'public');
        }else{
            $rg_urn = null;
        }

        if($request->file('passaporte_imagem') != null){
            $imagem_passaporte = $request->file('passaporte_imagem');
            $passaporte_urn = $imagem_passaporte->store('imagens/passaporte', 'public');
        }else{
            $passapore_urn = null;
        }

        if($request->file('cnh_imagem') != null){
            $imagem_cnh = $request->file('cnh_imagem');
            $cnh_urn = $imagem_cnh->store('imagens/cnh', 'public');
        }else{
            $cnh_urn = null;
        }

        // dd($cpf_urn, $passaporte_urn, $rg_urn, $cnh_urn);

        $cliente = $this->cliente;
        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;
        $cliente->pais_residencia = $request->pais_residencia;
        $cliente->cidade_residencia = $request->cidade_residencia;
        $cliente->estado_br = $request->estado_br;
        $cliente->cidade_br = $request->cidade_br;
        $cliente->cpf = $request->cpf;
        $cliente->cpf_imagem = $cpf_urn;
        $cliente->rg = $request->rg;
        $cliente->rg_imagem = $rg_urn;
        $cliente->passaporte = $request->passaporte;
        $cliente->passaporte_imagem = $passaporte_urn;
        $cliente->cnh = $request->cnh;
        $cliente->cnh_imagem = $cnh_urn;
        $cliente->dt_nascimento = $request->dt_nascimento;

        $cliente->save();

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
        if($request->method() === 'PATCH'){
            $dynamicRules = array();
            foreach ($this->cliente->rules() as $input => $rule) {
                if(array_key_exists($input, $request->all())){
                    $dynamicRules[$input] = $rule;
                }
            }
            $request->validate($dynamicRules, $this->cliente->feedback());
        }else{

            $request->validate($this->cliente->rules(), $this->cliente->feedback());
        }

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
