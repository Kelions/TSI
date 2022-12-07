<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

use Auth;
    
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','ASC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_usuario' => 'required',
            'apellido_usuario' => 'required',
            'rut' => 'required|string|min:10|max:10|ends_with:"-1","-2","-3","-4","-5","-6","-7","-8","-9","-K"|unique:users,rut',
            'especialidad' => 'required',
            'email' => 'required|email|unique:users,email',
            'cel' => 'required|string|min:14|max:15|unique:users,cel',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','El Nuevo Usuario se ha creado Satisfactoriamente');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
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
        $this->validate($request, [
            'nombre_usuario' => 'required',
            'apellido_usuario' => 'required',
            'rut' => 'required|string|min:10|max:10|ends_with:"-1","-2","-3","-4","-5","-6","-7","-8","-9","-K"|unique:users,rut,'.$id,
            'especialidad' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'cel' => 'required|string|min:14|max:15|unique:users,cel'.$id,
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','El Usuario se ha Actualizado');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    

    public function destroy($id){

        $userID = auth()->user()->id; 
        var_dump($userID);

        if ($userID != $id) {

            User::find($id)->delete();
            return redirect()->route('users.index')
                            ->with('success','El Usuario se ha Borrado');
            # code...
        }else 
            return redirect()->route('users.index')
                ->with('danger','No puedes borrarte a ti mismo!');



}




 /*    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','El Usuario se ha Borrado');
    } */
}