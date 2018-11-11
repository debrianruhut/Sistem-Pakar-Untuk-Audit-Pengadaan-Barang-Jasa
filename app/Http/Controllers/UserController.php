<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $role = Role::lists('nama_role','id')->toArray();
        $role = Role::all();
        return view('admin.users.create', compact('role'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:6',
            'role'=> 'required'
        ]);
        
        $request['password'] = bcrypt($request->get('password'));
        $request['avatar'] = $request->get('avatar') ? $request->get('avatar') : '/photos/user-icon.png';
        User::create($request->all());

        return redirect()->route('admin.users.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $role = Role::all();
        return view('admin.users.edit', compact('user','role'));
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
        //1. diberikan validasi terlebih dahulu 
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' .$id,
            'password' => 'nullable|string|min:6',
            'role' => 'required'
            
        ]);

        $user = User::findOrFail($id);
        //jika passsword di isi maka akan di enkripsi  tapi jika passwordnya kosong menggunakan passowrd lama 

        $request['password'] = $request->get('password') ? bcrypt ($request->get('password')) : $user->password; 
        $request['avatar'] = $request->get('avatar') ? $request->get('avatar') : '/images/user-icon.png';
        $request['role_id'] = $request->get('role') ? $request->get('role') : $user->role_id;

        //jika sudah baru update
        $user->update($request->all());

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *pas
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (! User::destroy($id)) return redirect()->back();
        return redirect()->route('admin.users.index');
    }

    public function dataTable()
    {
        $users = User::query();
        return DataTables::of($users)
        ->addColumn('user', function ($users){
            return '<img src="' . asset('images/user-icon.png') . '" height="24" width="24"> ' .
            $users->name;
        })
        ->addColumn('role', function ($users){
            return $users->role->nama_role;
        })
        ->addColumn('action', function ($users){
            return view('layouts.admin.partials._action', [
                'model' =>  $users,
                'show_url' => route ('admin.users.show', $users->id),
                'edit_url' => route('admin.users.edit', $users->id),
                'delete_url' => route('admin.users.destroy', $users->id),    
                ]);
            })
        ->rawColumns(['user', 'action'])
        ->make(true);
    }
}
