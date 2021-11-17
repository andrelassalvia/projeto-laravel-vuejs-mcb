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
       return $servico;
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
        return $servico;
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
            return ['erro' => 'Servico procurado não está cadastrado.'];
        }
        return $servico;
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
            return ['erro' => 'Servico procurado não está cadastrado.'];
        }
        $servico = $servico->update($request->all());
        return $servico;
        
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
            return ['erro' => 'Servico procurado não está cadastrado.'];
        }
        $servico->delete();
        return ['msg' => "Registro de servico $servico->nome foi excluido com sucesso."];
    }
}
