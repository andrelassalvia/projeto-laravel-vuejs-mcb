<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    public function __construct(Servico $servico){
        $this->servico = $servico;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index(Request $request)
    {
        $servicos = array();

        if($request->has('attrib')){
            $attrib = $request->attrib;
            $servicos = $this->servico->selectRaw($attrib)->with('ordens');
        }else{
            $servicos = $this->servico->with('ordens');
        }

        if($request->has('filtro')){
            $condicoes = explode(':', $request->filtro);
            $servicos = $servicos->where($condicoes[0], $condicoes[1], $condicoes[2])->get()->sortByDesc('updated-at');
        }else{
            $servicos = $servicos->get()->sortByDesc('updated_at');
        }

       return response()->json($servicos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->servico->rules(), $this->servico->feedback());
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
        $servico = $this->servico->with('ordens')->find($id);
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
        // dd($request);
        
        if($request->method() === 'PATCH'){
            $dynamicRules = array();
            foreach ($this->servico->rules() as $input => $rule) {
                if(array_key_exists($input, $this->servico->rules())){
                    $dynamicRules[$input] = $rule;
                }
            }
            $request->validate($dynamicRules, $this->servico->feedback());
        }else{

            $request->validate($this->servico->rules(), $this->servico->feedback());
        }

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
