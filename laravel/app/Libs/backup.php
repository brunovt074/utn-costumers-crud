<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreClienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use App\Libs\helpers;

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
     * @param \App\Http\Requests\StoreClienteRequest $request
     * @return Illuminate\Http\Response
     */

    public function store(StoreClienteRequest $request){
        
        $validated = $request->validated();

        echo "valido";
        //$cliente = new Cliente();
        //ClientesController::validar($request, $cliente);
        
        //return to_route('clientes.show',$cliente);

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

    //Update                                
    public function update(Request $request, Cliente $cliente){

        $cliente = Cliente::find($cliente->nro_cliente);

        ClientesController::validar($request, $cliente);        

        return to_route('clientes.show',$cliente);

    }

    //Borrar
    public function destroy(Cliente $cliente){

    	Cliente::destroy($cliente->nro_cliente);

    	return to_route('home');
    }

    //validacion y persistencia
    public function validar(Request $request, Cliente $cliente){

        try {

            if (strlen($request -> input('cuit')) == 11 && ($request -> input('cuit')) !== null) {

            $cliente->cuit = $request -> input('cuit');

            }

            if (strlen($request -> input('apellido')) <= 100) {
                $cliente->apellido = $request -> input('apellido');
            }

            if (strlen($request -> input('nombre')) <= 100) {
                $cliente->nombre = $request -> input('nombre');
            }

            if (strlen($request -> input('telefono')) <= 25) {
                $cliente->telefono = $request -> input('telefono');
            }      
                        
            if (strlen($request -> input('email')) <= 150) {
                $cliente->email = $request -> input('email');
            }
            
            if (strlen($request -> input('provincia')) <= 100) {
                $cliente->provincia = $request -> input('provincia');
            }                


            $cliente->save();
            
        } catch (Exception $e) {

            echo"<div class=\"alert alert-danger mt-0 mb-0 mr-0 ml-0\" role=\"alert\">
                        ERROR: ".$e->getMessage()."<br/>
                    </div>";
            
        }

		      
        

    }        
        
            

        
} 
    


