<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clientes\ClientesCreateRequest;
use App\Http\Requests\Clientes\ClientesUpdateRequest;
use App\Models\Ventas\Clientes;
use Illuminate\Http\Request;
use Session;

class ClientesController extends Controller
{
    //
    public function index()
    {
        //
        $clientess = Clientes::select('id', 'nombre', 'apellido', 'edad', 'RFC', 'domicilio')->paginate(5);
        //$clientess = \App\Models\Ventas\Clientes::all();
        return View('clientes/index')->with('clientess',$clientess);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return View('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientesCreateRequest $request)
    {
        //metodologia nbc
        Clientes::create($request->all());
        Session::flash('save', 'Se ha creado correctamente');
        //Session::flash('save','Se ha creado correctamente');
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $clientess = Clientes::FindOrFail($id);
        //return view('producto.show')->with('producto',$productos);
        return view('clientes.show')->with('clientes', $clientess);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //$productos = Producto::Find($id);
        $clientess = Clientes::FindOrFail($id);

        //return View('ventas.edit',compact('clientes','productos'));
        return view('clientes.edit', array('clientes'=>$clientess));
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

        $rules = [
            'nombre' => 'required|min:3,nombre,'.$id,
            'apellido' => 'required|min:3,',
            'edad'=> 'required',
            'RFC' => 'required|min:5,',
            'domicilio' => 'required|min:10',
        ];

        $messages = [
            'nombre.required'=> 'El nombre es requerido',
            'nombre.min'=> 'El nombre debe tener un minimo de 3 letras',
            'apellido.required'=> 'El apellido es requerido',
            'apellido.min'=> 'El apellido debe tener un minimo de 3 letras',
            'edad.required'=> 'La edad es requerida',
            'RFC.required'=> 'El RFC es requerido',
            'RFC.min'=> 'El RFC debe tener un minimo de 5 letras',
            'domicilio.required' => 'El campo domicilio es obligatorio',
            'domicilio.min'=> 'El domicilio debe tener un minimo de 5 letras',
        ];
        $this->validate($request, $rules, $messages);

        $clientess = Clientes::FindOrFail($id);
        $input = $request->all();
        $clientess->fill($input)->save();
        Session::flash('update', 'Se ha actualizado correctamente');
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $clientess = Clientes::FindOrFail($id);
        $clientess->delete();
        Session::flash('delete','Se ha eliminado correctamente');
        return redirect()->route('clientes.index');
    }
}
