<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Producto\ProductoCreateRequest;
use App\Http\Requests\Producto\ProductoUpdateRequest;
use App\Models\Ventas\Producto;
use Illuminate\Http\Request;
use Session;

class ProductoController extends Controller
{
    //
    public function index()
    {
        //
        $productos = Producto::select('id', 'producto', 'disponibles','precioUnitario', 'iva', 'precioTotal')->paginate(5);
        return View('producto/index')->with('productos',$productos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoCreateRequest $request)
    {
        //
        //Producto::create($request->select('id', 'producto', 'disponibles','precioUnitario', 'iva', ));
        //Producto::create($request->all());
        $producto = new Producto;
        $producto->producto=$request->producto;
        $producto->disponibles=$request->disponibles;
        $producto->precioUnitario=$request->precioUnitario;
        $producto->iva=$request->iva;
        // if (){
        $producto->precioTotal=$request->precioUnitario+(($request->precioUnitario*$request->iva)/(100));
        //}
        $producto->save();
        Session::flash('save','Se ha creado correctamente');
        return redirect()->route('producto.index');
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
        //$ventass = Ventas::FindOrFail($id);
        $productos = Producto::FindOrFail($id);
        //return view('ventas.show')->with('ventas',$ventass);
        return view('producto.show')->with('producto',$productos);

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
        $productos = Producto::FindOrFail($id);

        //return View('ventas.edit',compact('clientes','productos'));
        return view('producto.edit', array('producto'=>$productos));
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
        //
        $rules = [
            'producto' => 'required|min:3|unique:productos,producto,'.$id,
            'disponibles' => 'required',
            'precioUnitario'=> 'required',
            'iva' => 'required',
            'precioTotal' => 'required',
        ];

        $messages = [
            'producto.required'=> 'El nombre es requerido',
            'producto.min'=> 'El producto debe tener un minimo de 3 letras',
            'producto.unique'=> 'El producto ya existe',
            'disponibles.required'=> 'Este campo es requerido',
            'apellido.required'=> 'El campo disponibles es requerido',
            'iva.required'=> 'El iva es requerida',
            'precioTotal.required'=> 'El precio total es requerida',
            'precioUnitario.required' => 'El precio unitario es obligatorio',
        ];
        $this->validate($request, $rules, $messages);

        $productos = Producto::FindOrFail($id);
        $input = $request->all();
        $productos->fill($input)->save();
        Session::flash('update', 'Se ha actualizado correctamente');
        return redirect()->route('producto.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
        $ventass = Ventas::FindOrFail($id);
        $ventass->delete();
        return redirect()->route('ventas.index'); */
        $productos = Producto::FindOrFail($id);
        $productos->delete();
        Session::flash('delete','Se ha eliminado correctamente');
        return redirect()->route('producto.index');

    }
}
