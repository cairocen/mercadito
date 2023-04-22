<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class categoria extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        /*Get */
        $url = 'http://localhost:8080/categoria/getCategorias';
    
        $response = Http::get($url);
        $categorias = $response->json();
    
        return view('categorias/index', compact('categorias'));    
        }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){   
        $url  = 'http://localhost:8080/categoria/save';
        $response = Http::post($url,
          [
            "descripcion" => $request->post('descripcion')
          ]
        );  

        return redirect()-> route('categoria.index'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        /*Get */       

        return view('categorias/new');    
        }
    
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete( $id){   
        $url  = 'http://localhost:8080/categoria/delete/'.$id;
        $response = Http::post($url);  

        return redirect()-> route('categoria.index'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id){   

        $url  = 'http://localhost:8080/categoria/getCategoria/'.$id;
        $response = Http::get($url);

        $categoria = $response->json();
        
        return view('categorias/edit', compact('categoria'));
    }
    

    public function update( Request $request, $id){   

        $url  = 'http://localhost:8080/categoria/save';
        $response = Http::post($url,
          [
            "codigoCategoria" => $id,
            "descripcion" => $request->post('descripcion')
          ]
        );  

        return redirect()-> route('categoria.index'); 
    }
    
}
