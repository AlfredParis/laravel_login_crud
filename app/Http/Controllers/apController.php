<?php

namespace App\Http\Controllers;

use App\Models\ap_user_accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Crypt;


class apController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {




        $ap_query = Session::get('ap_query');

        if (isset($ap_query)) {

            return redirect('/client')->with('qwe', $ap_query);

        } else {

            $messages = [
                "email.required" => "Email is required",
                "email.email" => "Email is not valid",
                "email.exists" => "Email doesn't exists",
                "password.required" => "Password is required",
                "password.min" => "Password must be at least 6 characters"
            ];

            $validator = Validator::make($request->all(), [
                'ap_username' => 'required|min:4|exists:users,email',
                'ap_password' => 'required|min:6'
            ], $messages);


            $ap_username = $request->input('ap_username');
            $ap_password = $request->input('ap_password');

            $ap_us = ap_user_accounts::where("ap_username", $ap_username)->value("ap_username");

            if (isset($ap_us)) {
                $password = ap_user_accounts::where("ap_username", $ap_us)->value("ap_password");
                $decrypt = decrypt($password);

                if ($ap_password == $decrypt) {
                    $ap_query = ap_user_accounts::where("ap_username", $ap_username)->value("ap_fullname");
                    Session::put('ap_query', $ap_query);
                    return redirect('/client')->with('alert', 'Log in Successfully!');
                } else {
                    Session::forget('ap_query');
                    return view('aplogin')->with('message', 'wrong password');

                }
            } else {
                Session::forget('ap_query');
                return view('aplogin')->with('message', 'UserName is required');
            }


        }




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ap_query = Session::get('ap_query');
        return view('apregister')->with('ap_query', $ap_query);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "ap_username" => "required|min:2|max:20",
                "ap_fullname" => "required|min:8|max:50",
                "ap_password" => "required|min:8|max:100",
                "ap_accountType" => "required",
            ]
        );
        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();
        }
        Log::alert("User has been added!");

        $user = new ap_user_accounts;
        $user->ap_username = $request->input("ap_username");
        $user->ap_fullname = $request->input("ap_fullname");
        $user->ap_password = encrypt($request->input("ap_password"));
        $user->ap_accountType = $request->input("ap_accountType");
        $user->save();

        return redirect()->route('ap.index')->with('alert', 'user succesfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if ($ap_query == "") {
        //     return redirect()->route('/ap.index');
        // } else {
        //     return redirect()->route('/client')->with('alert', 'Client succesfully log inned as!');
        // }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $User = ap_user_accounts::find($id);
        return view('EditUser')->with('Users', $User);
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
        $validator = Validator::make(
            $request->all(),
            [
                "ap_username" => "required|min:2|max:20",
                "ap_fullname" => "required|min:2|max:50",
                "ap_password" => "required|min:2|max:20",
                "ap_accountType" => "required"
            ]
        );

        if ($validator->fails()) {
            // return redirect("client.create")->withErrors($request)->withInput();
            return back()->withErrors($validator)->withInput();
        }

        Log::alert("User has been Edited!");

        $user = ap_user_accounts::find($id);
        $user->ap_username = $request->ap_username;
        $user->ap_fullname = $request->ap_fullname;
        $user->ap_password = encrypt($request->ap_password);
        $user->ap_accountType = $request->ap_accountType;
        $user->save();
        return redirect()->route('ap.index')->with('alert', 'User updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::alert("User has been Deleted!");

        $delete = ap_user_accounts::find($id);
        $delete->delete();
        return redirect()->route('ap.index')->with('alert', 'User Deleted Successfully!');
    }
}