<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class fabricante extends Controller

{


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){   
        $url  = 'http://localhost:8080/fabricante/save';
        $response = Http::post($url,
          [
            "descripcion" => $request->post('descripcion'),
            "fechaInicioOperacion" => $request->post('fechaInicioOperacion')
          ]
    );  

        return redirect()-> route('fabricante.index'); 
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        /*Get */       

        return view('fabricantes/new');    
        }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    /*Get */
    $urlfabricante = 'http://localhost:8080/fabricante/getFabricantes';

    $response = Http::get($urlfabricante);
    $fabricantes = $response->json();

    return view('fabricantes/index', compact('fabricantes'));    
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function show($id){
    /*Get */
    $urlfabricante = 'http://localhost:8080/fabricante/getFabricante/'.$id;

    $response = Http::get($urlfabricante);
    $fabricante = $response->json();

    return view('fabricantes/show', compact('fabricante'));    
    }


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete( $id){   
        $url  = 'http://localhost:8080/fabricante/delete/'.$id;
        $response = Http::post($url);  

        return redirect()-> route('fabricante.index'); 
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $id){   
        $url  = 'http://localhost:8080/fabricante/getFabricante/'.$id;
        $response = Http::get($url);  

        $fabricante = $response->json();
        return view('fabricantes.edit', compact('fabricante'));
    }


    public function update( Request $request, $id){   

        $url  = 'http://localhost:8080/fabricante/save';
        $response = Http::post($url,
          [
            "codigoFabricante"=> $id,
            "descripcion" => $request->post('descripcion'),
            "fechaInicioOperacion" => $request->post('fechaInicioOperacion')
          ]
        );  

        return redirect()-> route('fabricante.index'); 
    }
    
    
}
