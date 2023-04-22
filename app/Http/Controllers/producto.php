<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class producto extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        /*Get */
        $url = 'http://localhost:8080/producto/getProductos';
    
        $response = Http::get($url);
        $productos = $response->json();
    
        return view('productos/index', compact('productos'));    
        }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
     public function show($id){
        /*Get */
        $url = 'http://localhost:8080/producto/getProducto/'.$id;
    
        $response = Http::get($url);
        $producto = $response->json();
    
        return view('productos/show', compact('producto'));    
        }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete( $id){   
        $url  = 'http://localhost:8080/producto/delete/'.$id;
        $response = Http::post($url);  

        return redirect()-> route('producto.index'); 
    }



   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    
        /*Obteniendo los fabricantes */
        $urlfabricante = 'http://localhost:8080/fabricante/getFabricantes';
        $response = Http::get($urlfabricante);
        $fabricantes = $response->json();
    

        /*obteniendo todos los productos */
        $url = 'http://localhost:8080/producto/getProductos';    
        $response = Http::get($url);
        $productos = $response->json();


        /*obteniendo todos las productos */
        $urlCate = 'http://localhost:8080/categoria/getCategorias';
    
        $response = Http::get($urlCate);
        $categorias = $response->json();

        $fabricantesDisp = array();



        $fabricantesProductos = array_column($productos, 'fabricante');

        /*obteniendo los fabricantes que no tiene productos */
        foreach ($fabricantes as $fabricante) {
            if (!in_array($fabricante, $fabricantesProductos)) {
                $fabricantesDisp[] = $fabricante;
            }
        }
       

        $fabricantes =  $fabricantesDisp;

        return view('productos/new', compact('fabricantes', 'categorias'));    
        }
    

        public function store(Request $request){   

        /* obteniendo las categorias */
        $urlCate = 'http://localhost:8080/categoria/getCategoria/'; 
        $categorias = array();
        foreach($request->post('categorias') as $codigo){
            $response = Http::get($urlCate.$codigo);
            $categorias[] = $response->json();
        }

        /*guardando el producto */
            /*POST producto */
    $url  = 'http://localhost:8080/producto/save';
    $response = Http::post($url,
    [
        "descripcion"=> $request->post('descripcion'),
        "pais" =>  $request->post('pais'),
        "precio" =>  $request->post('precio'),
        "fabricante" =>  [
            "codigoFabricante" =>  $request->post('codigoFabricante')
        ],
        "categorias" => $categorias
        ,
        "clientes" =>  [
  
        ]

        ]            
    );

     return redirect()-> route('producto.index'); 
        }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function buyer($id){
            /*Get */
            $url = 'http://localhost:8080/producto/getProducto/'.$id;        
            $response = Http::get($url);
            $producto = $response->json();

            /*Obteniendo los clientes */
            $urlCliente = 'http://localhost:8080/cliente/getClientes';
            $response = Http::get($urlCliente);
            $clientes = $response->json();

            $clientesProductos =  $producto['clientes'];

            $clientesDisp = array();

            /*obteniendo los clientes que no tiene productos */
            foreach ($clientes as $cliente) {
                if (!in_array($cliente, $clientesProductos)) {
                    $clientesDisp[] = $cliente;
                }
            }

            $clientes =  $clientesDisp;
            //print_r($clientesDisp);
            return view('productos/buyer', compact('clientes', 'producto'));    
            }


            public function storeBuyer(Request $request, $id){   

                /* obteniendo las categorias */

            $url = 'http://localhost:8080/producto/getProducto/'.$id;        
            $response = Http::get($url);
            $producto = $response->json();

        /* obteniendo los clientes */
            $urlCate = 'http://localhost:8080/cliente/getCliente/'; 
            $clientes = array();

            foreach($request->post('clientes') as $codigo){
                $response = Http::get($urlCate.$codigo);
                $clientes[] = $response->json();
            }


            $clientes = array_merge($clientes, $producto['clientes']);

        
                /*guardando el producto */
                    /*POST producto */
            $url  = 'http://localhost:8080/producto/save';
            $response = Http::post($url,
            [
                "codigoProducto"=> $producto['codigoProducto'],
                "descripcion"=> $producto['descripcion'],
                "pais" =>  $producto['pais'],
                "precio" =>  $producto['precio'],
                "fabricante" =>  [
                    "codigoFabricante" =>  $producto['fabricante']['codigoFabricante']                    
                ],
                "categorias" => $producto['categorias']
                ,
                "clientes" =>  $clientes
        
                ]            
            );
        
            
            return redirect()-> route('producto.index'); 
                }



                   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

         /*obteniendo producto */
         $url = 'http://localhost:8080/producto/getProducto/'.$id;
    
         $response = Http::get($url);
         $producto = $response->json();
    
        /*Obteniendo los fabricantes */
        $urlfabricante = 'http://localhost:8080/fabricante/getFabricantes';
        $response = Http::get($urlfabricante);
        $fabricantes = $response->json();
    

        /*obteniendo todos los productos */
        $url = 'http://localhost:8080/producto/getProductos';    
        $response = Http::get($url);
        $productos = $response->json();


        /*obteniendo todos las categorias */
        $urlCate = 'http://localhost:8080/categoria/getCategorias';
    
        $response = Http::get($urlCate);
        $categorias = $response->json();

        $fabricantesDisp = array();



        $fabricantesProductos = array_column($productos, 'fabricante');

        /*obteniendo los fabricantes que no tiene productos */
        foreach ($fabricantes as $fabricante) {
            if (!in_array($fabricante, $fabricantesProductos)) {
                $fabricantesDisp[] = $fabricante;
            }
        }
       

        $fabricantes =  $fabricantesDisp;
        $fabricantes[] =  $producto['fabricante'];
        
        return view('productos/edit', compact('fabricantes', 'categorias', 'producto'));    
        }

    
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function update(Request $request, $id){  
            
             /*obteniendo producto */
            $url = 'http://localhost:8080/producto/getProducto/'.$id;
    
            $response = Http::get($url);
            $producto = $response->json();

            /* obteniendo las categorias */
            $urlCate = 'http://localhost:8080/categoria/getCategoria/'; 
            $categorias = array();
            foreach($request->post('categorias') as $codigo){
                $response = Http::get($urlCate.$codigo);
                $categorias[] = $response->json();
            }
    
            /*guardando el producto */
                /*POST producto */
        $url  = 'http://localhost:8080/producto/save';
        $response = Http::post($url,
        [
            "descripcion"=> $request->post('descripcion'),
            "pais" =>  $request->post('pais'),
            "precio" =>  $request->post('precio'),
            "fabricante" =>  [
                "codigoFabricante" =>  $request->post('codigoFabricante')
            ],
            "categorias" => $categorias
            ,
            "clientes" =>  $producto['clientes']
    
            ]            
        );
    
         return redirect()-> route('producto.index'); 
            }
    
}
