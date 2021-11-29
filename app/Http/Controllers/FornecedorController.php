<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Repositories\FornecedorRepository;

class FornecedorController extends Controller
{
    public function __construct(Fornecedor $fornecedor){

        $this->fornecedor = $fornecedor;
     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $fornecedorRepository = new FornecedorRepository($this->fornecedor);

        if($request->has('attrib_ordens')){
            $attrib_ordens = 'ordens:id,'.$request->attrib_ordens;
            $fornecedorRepository->selectAttribRelacionados($attrib_ordens);
        }else{
            $fornecedorRepository->selectAttribRelacionados('ordens');
        }

        if($request->has('filtro')){
            $fornecedorRepository->filtro($request->filtro);
        }

        if($request->has('attrib')){
            $fornecedorRepository->selectAttribs($request->attrib);
            $fornecedorRepository->charge('updated_at');
        }else{
            $fornecedorRepository->charge('updated_at');
        }
   
        return response()->json($fornecedorRepository, 200);

    }
        
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->fornecedor->rules(), $this->fornecedor->feedback());

        $fornecedor = $this->fornecedor->create($request->all());
        return response()->json($fornecedor, 201);    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fornecedor = $this->fornecedor->with('ordens')->find($id);
        if($fornecedor === null){
            return response()->json(['erro' => 'Fornecedor procurado não está cadastrado'], 404);
        }
        return response()->json($fornecedor, 200);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fornecedorRepository = new FornecedorRepository($this->fornecedor);
        if($request->method() === 'PATCH'){
            $fornecedorRepository->dynamicRulesUpdate($request);
            
        }else{
            $request->validate($this->fornecedor->rules(), $this->fornecedor->feedback());
        }
        
        $fornecedor = $this->fornecedor->find($id);
        if($fornecedor === null){
            return response(['erro' => 'Fornecedor procurado não está cadastrado'], 404);
        }
        
        $fornecedor->update($request->all());
        return response()->json($fornecedor, 200);  
        
    }
        

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fornecedor = $this->fornecedor->find($id);
        if($fornecedor === null){
            return response()->json(['erro' => 'Fornecedor procurado não está cadastrado'], 404);
        }
        $fornecedor->delete();
        
        return response(['msg' => "O fornecedor $fornecedor->nome foi excluido com sucesso."], 200);
    }
}
