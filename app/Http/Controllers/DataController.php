<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class DataController extends Controller
{
    //add
    public function index(){
        return view('add_data');
    }

    private function upload($file){
    	$foto = $file->getClientOriginalName();
	    $goto = 'foto';
	    $file->move($goto,$file->getClientOriginalName());
	    return $foto;
    }

    public function create(Request $request){
        date_default_timezone_set("Asia/Bangkok");
        $filename = $request->input('name').'-'.date('dmYHis').'.txt';
        $name = $request->input('name');
        $email = $request->input('email');
        $date = $request->input('date');
        $telepon = $request->input('telepon');
        $gender = $request->input('gender');
        $foto = 'foto.jpg';

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $foto = $this->upload($file);
        }
        
        Storage::disk('local')->put('detail/'.$filename, $name.','.$email.','.$date.','.$telepon.','.$gender.','.$foto);

        return view('success');

    }

    public function edit($filename){
        $file = Storage::disk('local')->get('detail/'.$filename);
        $array = explode(",", $file);
        return view('edit_data',['data'=>$array,'file'=>$filename]);
    }

    public function update($filename, Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $date = $request->input('date');
        $telepon = $request->input('telepon');
        $gender = $request->input('gender');
        $foto = $request->input('photo');

        if($request->hasFile('foto')){
    		$this->delete($filename,$foto);
    		$file = $request->file('foto');
	    	$foto = $this->upload($file);
        }
        
        Storage::disk('local')->put('detail/'.$filename, $name.','.$email.','.$date.','.$telepon.','.$gender.','.$foto);

        return redirect('home');

    }

    public function delete($filename, $foto){
        if($foto != 'foto.jpg'){
            File::delete('foto/'.$foto);
        }
        Storage::disk('local')->delete('detail/'.$filename);
        return redirect('home');
    }

}
