<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    public function index()
    {
        $json['data']=User::all();
        $json['kode']=200;

        return response()->json($json);
    }
    public function update(User $user,Request $req)
    {
        $user->nama=$req->nama;
        $user->role=$req->role;
        $user->save();

        $json['pesan']="data berhasil diupdate";
        $json['kode']=200;

        return response()->json($json);
    }
    public function delete(User $user)
    {
        if($user->id==Auth::user()->id){
            $json['pesan']='Maaf anda tidak dapat menghapus akun anda sendiri';
            $json['kode']=203;
        }else{
            $user->delete();

            $json['pesan']='Anda berhasil menghapus akun anda';
            $json['kode']=200;
        }

        return response()->json($json);
    }
    public function store(Request $req)
    {
        $user=new User;
        $user->username=$req->username;
        $user->nama=$req->nama;
        $user->password=bcrypt($req->password);
        $user->role=$req->role;
        $user->save();

        $json['pesan']="Data Username sudah ditambah";
        $json['kode']=200;

        return response()->json($json);
    }
    public function show(User $user)
    {
        $json['kode']=200;
        $json['data']=$user;

        return response()->json($json);

    }
    public function cek_username($username)
    {
        $count=User::where('username',$username)->count();

        if($count==1){
            $json['data']=User::where('username',$username)->first();
            $json['kode']=204;
        }else{
            $json['kode']=200;
        }
        return response()->json($json);
    }
    public function reset_password(User $user)
    {
         $user->password=bcrypt('kopienak');
         $user->save();

         $json['pesan']='password berhasil direset menjadi kopienak';
         $json['kode']=200;

         return response()->json($json);
    }


}
