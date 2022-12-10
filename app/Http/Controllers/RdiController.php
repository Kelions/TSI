<?php

namespace App\Http\Controllers;

use App\Models\Rdi;
use Illuminate\Http\Request;

class RdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:rdi-listar|rdi-crear|rdi-editar|rdi-borrar', ['only' => ['index','show']]);
         $this->middleware('permission:rdi-crear', ['only' => ['create','store']]);
         $this->middleware('permission:rdi-editar', ['only' => ['edit','update']]);
         $this->middleware('permission:rdi-borrar', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rdis = Rdi::latest()->paginate(5);
        return view('rdis.index',compact('rdi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rdis.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Rdi::create($request->all());
    
        return redirect()->route('rdis.index')
                        ->with('success','El RDI se ha Creado Satisfactoriamente.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Rdi  $rdi
     * @return \Illuminate\Http\Response
     */
    public function show(Rdi $rdi)
    {
        return view('rdis.show',compact('rdi'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rdi  $rdi
     * @return \Illuminate\Http\Response
     */
    public function edit(Rdi $rdi)
    {
        return view('rdis.edit',compact('rdi'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rdi  $rdi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rdi $rdi)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $rdi->update($request->all());
    
        return redirect()->route('rdis.index')
                        ->with('success','El RDI se ha Actualizado');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rdi  $rdi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rdi $rdi)
    {
        $rdi->delete();
    
        return redirect()->route('rdis.index')
                        ->with('success','El RDI se ha borrado');
    }
}
