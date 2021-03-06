<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Storage;
use App\Repositories\ClienteRepository;

class ClienteController extends Controller
{
    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
        
        //  Fazendo set $this->cliente com $cliente
    }

    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $clienteRepository = new ClienteRepository($this->cliente);

        if($request->has('attrib_ordens')){
            $attrib_ordens = 'ordens:id,'.$request->attrib_ordens;
            $clienteRepository->selectAttribRelacionados($attrib_ordens);
        }else{
            $clienteRepository->selectAttribRelacionados('ordens');
        }

        if($request->has('filtro')){
            $clienteRepository->filtro($request->filtro);
        }

        if($request->has('attrib')){
            $clienteRepository->selectAttribs($request->attrib);
        }

        $clienteRepository->charge('updated_at');


        return response()->json($clienteRepository, 200);
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // Validation Rules
        $request->validate($this->cliente->rules(), $this->cliente->feedback());
        

        // Attributes without images
        $cliente = $this->cliente->create([
            'nome' => $request->nome, 
            'telefone' => $request->telefone, 
            'email' => $request->email, 
            'pais_residencia' => $request->pais_residencia, 
            'cidade_residencia' => $request->cidade_residencia, 
            'estado_br' => $request->estado_br, 
            'cidade_br' => $request->cidade_br, 
            'cpf' => $request->cpf, 
            'rg' => $request->rg, 
            'passaporte' => $request->passaporte, 
            'cnh' => $request->cnh, 
            'dt_nascimento' => $request->dt_nascimento
        ]);

        // Attributes with images
        $docs = $this->cliente->docsElements;
        foreach ($docs as $doc) {
            $file = $request->file($doc['field']);

            if($file != null){
                $urn = $file->store('imagens/'.$doc['el'], 'public');
                
                switch ($doc['el']) {
                    case 'cpf':
                        $cliente->cpf_imagem = $urn;
                        break;
                    case 'rg':
                        $cliente->rg_imagem = $urn;
                        break;
                    case 'passaporte':
                        $cliente->passaporte_imagem = $urn;
                        break;
                    case 'cnh':
                        $cliente->cnh_imagem = $urn;
                        break;
                    
                    default:
                        $urn = null;
                        break;
                }
                
            }
           
        }
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
        $cliente = $this->cliente->with('ordens')->find($id);
        if($cliente === null){
            return response()->json(['erro' => 'Cliente procurado n??o est?? cadastrado.'], 404);
        }
        
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
        $clienteRepository = new ClienteRepository($this->cliente);
       // Validacao para PATCH
       if($request->method() === 'PATCH'){
           $clienteRepository->dynamicRulesUpdate($request);
        
        }else{
        $request->validate($this->cliente->rules(), $this->cliente->feedback());
    }
            

        // Encontrando o cliente
        $cliente = $this->cliente->find($id);
       
        if($cliente === null){
            return response()->json(['erro' => 'Cliente procurado n??o est?? cadastrado.'], 404);
        }
        
        // preenche o objeto com o que vier no request. Se nao vier, nao preenche.
        $cliente->fill($request->all());
        $cliente->save();

        $docs = $this->cliente->docsElements;
        foreach ($docs as $doc) {
            $file = $request->file($doc['field']);

            if($file != null){
               
                $urn = $file->store('imagens/'.$doc['el'], 'public');
                
                switch ($doc['el']) {
                    case 'cpf':
                        Storage::disk('public')->delete($cliente->cpf_imagem); // remover imagem antiga
                        $cliente->cpf_imagem = $urn;
                        break;
                    case 'rg':
                        Storage::disk('public')->delete($cliente->rg_imagem);
                        $cliente->rg_imagem = $urn;
                        break;
                    case 'passaporte':
                        Storage::disk('public')->delete($cliente->passaporte_imagem);
                        $cliente->passaporte_imagem = $urn;
                        break;
                    case 'cnh':
                        Storage::disk('public')->delete($cliente->cnh_imagem);
                        $cliente->cnh_imagem = $urn;
                        break;
                    
                    default:
                        $urn = null;
                        break;
                }

                $cliente->save();
                
            }
           
        }
       
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
            return response()->json(['erro' => 'Cliente procurado n??o est?? cadastrado.'], 404);
        }
        $cliente->delete();
        return response()->json(['msg' => "Registro $cliente->nome excluido."], 200);
    }
}
