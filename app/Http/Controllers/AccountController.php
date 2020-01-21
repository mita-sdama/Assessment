<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    public function index(){
        //mengambil data users
        $account = DB::table('users')->get();
        
        //mengirim data user ke view
        return view('account',['users'=> $account]);
    }

    //method add 
    public function add(){
        //memanggil view add
        return view('add_account');
    }

    public function create(Request $request){
        //insert data
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        return redirect('/account');

    }

    //method edit
    public function edit($id){
        //mengambil data pegawai berdasarkan id 
        $account = DB::table('users')->where('id',$id)->get();
        //passing data user
        return view('edit_account',['users' => $account]);
        
    }

    public function update(Request $request){
        //update data

        if($request->password == ""){
            DB::table('users')->where('id',$request->id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }else{
            DB::table('users')->where('id',$request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }
        return redirect('/account');

    }

    //method delete
    public function delete($id){
        //menghapus data
        DB::table('users')->where('id',$id)->delete();

        return redirect('/account');
    }
}
