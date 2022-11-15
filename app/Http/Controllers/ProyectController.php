<?php
    
namespace App\Http\Controllers;
    
use App\Models\Proyect;
use Illuminate\Http\Request;
    
class ProyectController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:proyecto-listar|proyecto-crear|proyecto-editar|proyecto-borrar', ['only' => ['index','show']]);
         $this->middleware('permission:proyecto-crear', ['only' => ['create','store']]);
         $this->middleware('permission:proyecto-editar', ['only' => ['edit','update']]);
         $this->middleware('permission:proyecto-borrar', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyects = Proyect::latest()->paginate(5);
        return view('proyects.index',compact('proyects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyects.create');
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
    
        Proyect::create($request->all());
    
        return redirect()->route('proyects.index')
                        ->with('success','El Proyecto se ha Creado Satisfactoriamente.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function show(Proyect $proyect)
    {
        return view('proyects.show',compact('proyect'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyect $proyect)
    {
        return view('proyects.edit',compact('proyect'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyect $proyect)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $proyect->update($request->all());
    
        return redirect()->route('proyects.index')
                        ->with('success','El Proyecto se ha Actualizado');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyect  $proyect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyect $proyect)
    {
        $proyect->delete();
    
        return redirect()->route('proyects.index')
                        ->with('success','El Proyecto se ha borrado');
    }
}