<?php

namespace App\Http\Controllers\cus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class customer extends Controller
{
    public function register(Request $r){

        $name=$r->input('name');
        $email=$r->input('email');
        $pass=$r->input('password');
        DB::insert('insert into customers (name,uname,password) values (?, ?, ?)', [$name,$email,$pass]);
      // DB::insert('insert into  (id, name) values (?, ?)', [1, 'Dayle'])

       return redirect('/crud')->with('msg','Record_Inserted');

    }
    public function view(){
       $r= DB::select('select * from customers');
       return view('crud.view',['view'=>$r]);
    }
    public function select($id){
        $r= DB::select("select * from customers where id=?",[$id]);

       return view('crud.select',['view'=>$r]);
     // return $r->uname;
     //return $id;
     }
     public function update(Request $r){
        $r=DB::update('update customers set name=?,uname=?,password=? where id=?',[$r['name'],$r['email'],$r['password'],$r['id']]);
        return redirect('view')->with('msg','Record_updated');
        //return $r;
     }
     public function delete($id){
        DB::delete('delete from customers where id=?',[$id]);
        return redirect()->back()->with('msg','deleted_succex');
        //return "suss".$id;
     }



}
