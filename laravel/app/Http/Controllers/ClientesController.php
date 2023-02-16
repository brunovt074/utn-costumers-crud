<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreClienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClientesController extends Controller
{
    //Lista clientes
    public function index(){
        
        $clientes = Cliente::get();

        return view('lista-clientes', ['clientes' => $clientes]);        

    }

    //Crear cliente
    public function create(){
        
        return view('cliente-create');
    }

    /**
     *Guardar cliente 
     * 
     * @ param \App\Http\Requests\StoreClienteRequest $request
     * @ return Illuminate\Http\Response
     */

    public function store(StoreClienteRequest $request){
        
        $cliente = new Cliente();
        $validated = $request->validated();

        //echo "valido";
        
        ClientesController::persistir($request, $cliente);
        
        return to_route('clientes.show',$cliente);

    }

    //Mostrar cliente por ID
    public function show($cliente){
      
        $cliente = Cliente::find($cliente); 

        return view('cliente-profile', ['cliente' => $cliente]);        

    }

    //Vista editar cliente
    public function edit(Cliente $cliente){        

        return view('cliente-edit', ['cliente' => $cliente]);        

    }

        
    public function update(Request $request, Cliente $cliente){

        $cliente = Cliente::find($cliente->nro_cliente);

        $validator = Validator::make($request->all(),[
            'cuit' => 'required | digits: 11 | unique:App\Models\Cliente',            
            Rule::unique('App\Models\Cliente')->ignore($cliente->id,'nro_cliente'),
            'nombre'=> 'required | max: 100',
            'apellido'=> 'required | max: 100',
            'telefono' => 'required | max: 25',
            'email'=> 'required | email | max: 150',
            Rule::unique('App\Models\Cliente')->ignore($cliente->id,'nro_cliente'),
        ]);        

        ClientesController::persistir($request, $cliente);        

        return to_route('clientes.show',$cliente);

    }

    //Borrar
    public function destroy(Cliente $cliente){

    	Cliente::destroy($cliente->nro_cliente);

    	return to_route('home');
    }

    //validacion y persistencia
    public function persistir(Request $request, Cliente &$cliente){

        try {

            $cliente->cuit = $request -> input('cuit');
            $cliente->apellido = $request -> input('apellido');
            $cliente->nombre = $request -> input('nombre');
            $cliente->telefono = $request -> input('telefono');
            $cliente->email = $request -> input('email');
            $cliente->provincia = $request -> input('provincia');
            $cliente->save();
            
        } catch (\Exception $e) {

            echo"<div class=\"alert alert-danger mt-0 mb-0 mr-0 ml-0\" role=\"alert\">
                        ERROR: ".$e->getMessage()."<br/>
                    </div>";
            
        }
    }        
}