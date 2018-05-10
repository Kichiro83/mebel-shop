<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function getProfile()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view ('users.profile', ['orders'=>$orders]);
    }

    public function addUserForm(){
        return view('users.add-user');
    }
    public function getAll(){
        $users = User::all();
        return view('users.users',['users'=>$users]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function addUser(Request $request) {
        if($request->method() == "POST") {
            $this->validate($request,[
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'adress' => 'required',
                'password' => 'required'
            ],[
                'name.required'=>'Поле ФИО не должно быть пустым',
                'email.required'=>'Поле Email не должно быть пустым',
                'phone.required'=>'Поле Телефон не должно быть пустым',
                'adress.required'=>'Поле Адрес не должно быть пустым',
                'password.required'=>'Поле пароль не должно быть пустым',
            ]);
             User::create(['name' => $request->name,
                'email' => $request->email,
                 'phone' => $request->phone,
                 'adress' => $request->adress,
                'password' =>bcrypt($request->password)]);
            return redirect()->route('adminUsers');
        }
        return view('users.add-user');
    }
    public function editUser($id, Request $request){
        if($request->method() == "POST"){
            $this->validate($request,[
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'adress' => 'required',
                'password' => 'required'
            ],[
                'name.required'=>'Поле ФИО не должно быть пустым',
                'email.required'=>'Поле Email не должно быть пустым',
                'phone.required'=>'Поле Телефон не должно быть пустым',
                'adress.required'=>'Поле Адрес не должно быть пустым',
                'password.required'=>'Поле пароль не должно быть пустым',
            ]);
            User::find($id)->update(['name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'adress' => $request->adress,
                'password' => bcrypt($request->password)]);
            return redirect()->route('adminUsers');
        }
        $user = User::find($id);
        return view('users.edit-user',['user'=>$user]);
    }
    public function deleteUser($id){
        User::destroy($id);
        return redirect()->route('adminUsers');
    }

}
