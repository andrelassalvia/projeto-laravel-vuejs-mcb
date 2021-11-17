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

    public function index()
    {
        // $fornecedor = Fornecedor::all();
        $fornecedor = $this->fornecedor->all()->sortByDesc('id');
        
        return $fornecedor;
    }
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fornecedor = $this->fornecedor->create($request->all());
        return $fornecedor;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fornecedor = $this->fornecedor->find($id);
        if($fornecedor === null){
            return ['erro' => 'Fornecedor procurado não está cadastrado'];
        }
        return $fornecedor;
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
        $fornecedor = $this->fornecedor->find($id);
        if($fornecedor === null){
            return ['erro' => 'Fornecedor procurado não está cadastrado'];
        }
        
        $fornecedor = $fornecedor->update($request->all());
        return $fornecedor;
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
            return ['erro' => 'Fornecedor procurado não está cadastrado'];
        }
        $fornecedor->delete();
        
        return ['msg' => "O fornecedor $fornecedor->nome foi excluido com sucesso."];
    }
}
