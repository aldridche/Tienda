<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ventas\VentasCreateRequest;
use App\Http\Requests\Ventas\VentasUpdateRequest;
use App\Models\Ventas\Clientes;
use App\Models\Ventas\Producto;
use App\Models\Ventas\Ventas;
use Illuminate\Http\Request;

use Session;

class VentasController extends Controller
{
    public function index()
    {

        //$ventass = Ventas::select('ventass.id','fecha','clientess.id as clientes','clientess.RFC as clientes')->
        //                        join('clientess','clientess.id','=','ventass.clientess_id')->paginate(5);

        $ventass = Ventas::select('ventass.id','productos.id as producto', 'productos.producto as producto','ventass.fecha','clientess.id as clientes','clientess.RFC as clientes')->
                                join('clientess','clientess.id','=','ventass.clientess_id')->join('productos','productos.id','=','ventass.productos_id')->paginate(5);

        //$ventass = Ventas::select('ventass.id','productos.id as producto','productos.producto as producto','fecha')->
        //                        join('productos','productos.id','=','ventass.productos_id')->paginate(5);


        return View('ventas/index')->with('ventass',$ventass);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ventass = Ventas::all();
        //$productos = Producto::all();
        $productos = Producto::select('id')->get();
        $clientes = Clientes::select('id')->get();
        //$clientes = Clientes::all();

        return View('ventas.create',compact('clientes','productos'));
        //return View('ventas.create')->with('ventass',$ventass);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentasCreateRequest $request)
    {
        //
        Ventas::create($request->all());
        Session::flash('save', 'Se ha creado correctamente');
        return redirect()->route('ventas.index');
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
        $ventass = Ventas::FindOrFail($id);
        return view('ventas.show')->with('ventas',$ventass);

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
        //$productos = Producto::all();
        $productos = Producto::select('id', 'producto')->get();
        $clientes = Clientes::select('RFC', 'id')->get();
        //$clientes = Clientes::all();
        $ventass = Ventas::FindOrFail($id);

        //return View('ventas.edit',compact('clientes','productos'));
        return view('ventas.edit', array('ventas'=>$ventass,'productos'=>$productos, 'clientes'=>$clientes));
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

            'fecha' => 'required|min:10,fecha,'.$id,
            'productos_id' => 'required|not_in:0',
            'clientes_id' => 'not_in:0',

        ];

        $messages = [

            'fecha.required'=> 'La fecha es requerida',
            'fecha.min'=> 'La fecha requiere diez digitos minimo 2020-12-12',
            'productos_id.not_in' => 'El campo producto es obligatorio',
            'clientes_id.not_in' => 'El campo clientes es obligatorio',

        ];
        $this->validate($request, $rules, $messages);

        $ventass = Ventas::FindOrFail($id);
        $input = $request->all();
        $ventass->fill($input)->save();
        Session::flash('update', 'Se ha actualizado correctamente');
        return redirect()->route('ventas.index');
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
        $ventass = Ventas::FindOrFail($id);
        $ventass->delete();
        Session::flash('delete','Se ha eliminado correctamente');
        return redirect()->route('ventas.index');

    }
}
