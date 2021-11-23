<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(Fornecedor $fornecedor){

        $this->fornecedor = $fornecedor;
     }

    public function index(Request $request)
    {
        $fornecedores = array();
        if($request->has('attrib')){
            $attrib = $request->attrib;
            $fornecedores = $this->fornecedor->selectRaw($attrib)->with('ordens')->get()->sortByDesc('updated_at');

        }else{

            $fornecedores = $this->fornecedor->with('ordens')->get()->sortByDesc('updated_at');
        }
        
        return response()->json($fornecedores, 200);    }
  

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
        // dd($request->all());
        
        if($request->method() === 'PATCH'){
            $dynamicRules = array();
            foreach ($this->fornecedor->rules() as $input => $rule) {
                               
                if(array_key_exists($input, $request->all())){
                    $dynamicRules[$input] = $rule;
                }
            }
            $request->validate($dynamicRules, $this->fornecedor->feedback());
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
