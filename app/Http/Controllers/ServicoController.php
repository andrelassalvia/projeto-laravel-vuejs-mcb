<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;
use App\Repositories\ServicoRepository;

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
        $servicoRepository = new ServicoRepository($this->servico);

        if($request->has('attrib_ordens')){
            $attrib_ordens = 'ordens:id,'.$request->attrib_ordens;
            $servicoRepository->selectAttribRelacionados($attrib_ordens);
        }else{
            $servicoRepository->selectAttribRelacionados('ordens');
        }

        if($request->has('filtro')){
            $servicoRepository->filtro($request->filtro);
        }

        if($request->has('attrib')){
            $servicoRepository->selectAttribs($request->attrib);
            $servicoRepository->charge('updated_at');
        }else{
            $servicoRepository->charge('updated_at');

        }

        return response()->json($servicoRepository, 200);
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
        $servicoRepository = new ServicoRepository($this->servico);
        
        if($request->method() === 'PATCH'){
            $servicoRepository->dynamicRulesUpdate($request);
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
