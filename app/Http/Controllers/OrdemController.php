<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordem;
use App\Repositories\OrdemRepository;

class OrdemController extends Controller
{
    public function __construct(Ordem $ordem){
        $this->ordem = $ordem;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ordemRepository = new OrdemRepository($this->ordem);

        if($request->has('attrib_cliente')){
            $attrib_cliente = 'cliente:id,'.$request->attrib_cliente;
            $ordemRepository->selectAttribRelacionados($attrib_cliente);
        }else{
            $ordemRepository->selectAttribRelacionados('cliente');
        }

        if($request->has('attrib_fornecedor')){
            $attrib_fornecedor = 'fornecedor:id,'.$request->attrib_fornecedor;
            $ordemRepository->selectAttribRelacionados($attrib_fornecedor);
        }else{
            $ordemRepository->selectAttribRelacionados('fornecedor');
        }

        if($request->has('attrib_servico')){
            $attrib_servico = 'servico:id,'.$request->attrib_servico;
            $ordemRepository->selectAttribRelacionados($attrib_servico);
        }else{
            $ordemRepository->selectAttribRelacionados('servico');
        }

        if($request->has('filtro')){
            $ordemRepository->filtro($request->filtro);
        }

        if($request->has('attrib')){
            $ordemRepository->selectAttribs($request->attrib);
        }

        $ordemRepository->charge('updated_at');


        return response()->json($ordemRepository, 200);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->ordem->rules(), $this->ordem->feedback());

        $ordem = $this->ordem->create($request->all());
        return response()->json($ordem, 201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordem = $this->ordem->with('cliente', 'fornecedor', 'servico')->find($id);
        if($ordem === null){
            return response()->json(['erro' => 'ordem procurada não está cadastrada'], 404);
        }
        return response()->json($ordem, 200);    
    }

    
    public function update(Request $request, $id)
    {
        if($request->method() === 'PATCH'){
            $dynamicRules = array();
            foreach ($this->ordem->rules() as $input => $rule) {
                               
                if(array_key_exists($input, $request->all())){
                    $dynamicRules[$input] = $rule;
                }
            }
            $request->validate($dynamicRules, $this->ordem->feedback());
        }else{

            $request->validate($this->ordem->rules(), $this->ordem->feedback());
        }
        

        $ordem = $this->ordem->find($id);
        if($ordem === null){
            return response(['erro' => 'ordem procurada não está cadastrada'], 404);
        }
        
        $ordem->update($request->all());
        return response()->json($ordem, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ordem = $this->ordem->find($id);
        if($ordem === null){
            return response()->json(['erro' => 'Ordem procurada não está cadastrada'], 404);
        }
        $ordem->delete();
        
        return response(['msg' => "Ordem excluida com sucesso."], 200);
    }
}
