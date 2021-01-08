<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\UserRole;
use App\User;


class UserController extends Controller
{
	    public function list_user($id_user=null){
    	$detail_user = null;
    	if(isset($id_user)){
    		$detail_user = User::where('id', '=', $id_user)->first();
    	}

    	$user_roles = UserRole::all();
    	$users = User::all();
    	
    	return view('users.index', compact('user_roles', 'users', 'detail_user'));
    }

    public function save(Request $req){

    	$username = $req->input('username');
    	$role = $req->input('id_role');
    	$is_update= $req->input('is_update');
    	if(isset($is_update)){
	    	
	    	$query = User::where('id', '=', $req->input('id_user'))->first();
	    	$query->username = $username;
	    	$query->id_role = $role;
	    	$query->save();

	    	alert()->success('User berhasil diupdate', 'Successfully');
	    }else{
	    	// $username = $req->input('username');
	    	 $validator = Validator::make($req->all(),[
	                'username' => 'required',
	                'password' => 'required',
	                'ulangi_password' => 'required|same:password',
	                'id_role' => 'required'
	            ]);

	        if($validator->fails()){
	            return back()->withInput()->withErrors($validator);
	        }

	    	// $username = $req->input('username');
	    	$password = $req->input('password');
	    	$ulangiPassword = $req->input('ulangi_password');
	    	

	    	$newUser = new User();
	    	$newUser->username = $username;
	    	$newUser->password = Hash::make($password);
	    	$newUser->id_role = $role;
	    	$newUser->save();

	    	alert()->success('User berhasil ditambahkan', 'Successfully');

	    }

    	
    	return redirect('/user');
    }

    public function update_password(Request $req){
    	$query = User::where('id', '=', $req->input('id_user'))->first();
	    	$query->password = Hash::make($req->input('new_password'));
	    	$query->save();

	    alert()->success('Password berhasil diupdate', 'Successfully');
	    return redirect('/user');
    }

// hapus sementara
public function hapus($id_user)
{
    	$delete = User::find($id_user);
    	$delete->delete();

    	alert()->succes('User berhasil Dihapus', 'Successfully');
 
    	return redirect('/user');
}

    public function authenticate(Request $req){
        $credentials = $req->only('username', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('/dashboard');
        }

        return back()->withInput($req->except('password'))->withErrors(['Username atau Password Salah! ']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
