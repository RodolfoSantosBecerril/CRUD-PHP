<?php

namespace App\Http\Controllers;

use App\Models\Client;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients= Client::paginate(10);
        return view('client.index')
        -> with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.form');  //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|max:50',
        'due'  => 'required|gte:0.1'  /* consultar en laravel mas informacion*/
      ]);
      $client = Client::create($request->only('name','due','comments'));
     
     
      Session::flash('mensaje','Registro creado con exito.');
     
      return redirect()->route('client.index');
    }

    /**                                         ESTO ES PARA UN FORMULARIO A PARTE DONDE SE MUESTRE UNICAMENTE EL REGISTRO
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.form') ->with('client', $client);
        // REUTILIZANDO CODIGO
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|max:50',
            'due'  => 'required|gte:0.1'  /* consultar en laravel mas informacion*/
          ]);
          $client-> name=$request['name'];
          $client-> due=$request['due'];
          $client-> comments=$request['comments'];
          $client-> save();
         
          Session::flash('mensaje','Registro modificado con exito.');
         
          return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
      $client-> delete();
      Session::flash('mensaje','Registro eliminado con exito.');
         
          return redirect()->route('client.index');
    }
}
