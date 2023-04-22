<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class cliente extends Controller
{

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){   
        $url  = 'http://localhost:8080/cliente/save';
        $response = Http::post($url,
          [
            "nombre" => $request->post('nombre'),
            "telefono" => $request->post('telefono'),
            "correo" => $request->post('correo')
          ]
    );  

        return redirect()-> route('cliente.index'); 
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        /*Get */       

        return view('clientes/new');    
        }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    /*Get */
    $url = 'http://localhost:8080/cliente/getClientes';

    $response = Http::get($url);
    $clientes = $response->json();

    return view('clientes/index', compact('clientes'));    
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function show($id){
    /*Get */
    $urlcliente = 'http://localhost:8080/cliente/getCliente/'.$id;

    $response = Http::get($urlcliente);
    $cliente = $response->json();

    return view('clientes/show', compact('cliente'));    
    }


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete( $id){   
        $url  = 'http://localhost:8080/cliente/delete/'.$id;
        $response = Http::post($url);  

        return redirect()-> route('cliente.index'); 
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $id){   
        $url  = 'http://localhost:8080/cliente/getCliente/'.$id;
        $response = Http::get($url);  

        $cliente =  $response->json();

        return view('clientes/edit', compact('cliente'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){   
        $url  = 'http://localhost:8080/cliente/save';
        $response = Http::post($url,
          [
            "codigoCliente" => $id,
            "nombre" => $request->post('nombre'),
            "telefono" => $request->post('telefono'),
            "correo" => $request->post('correo')
          ]
    );  
        
        return redirect()-> route('cliente.index'); 
    }
    
}
