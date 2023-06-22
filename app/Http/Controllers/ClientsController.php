<?php

namespace App\Http\Controllers;

use App\Models\ap_user_accounts;

use App\Http\Controllers\apController;
use Illuminate\Http\Request;
//enter this model that you crated after nong --resource
use App\Models\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Validator;
use Closure;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //variable name tapos model name tapos yung 

        $list = Client::paginate(2);
        $ap_ua = ap_user_accounts::paginate(2);

        $ap_query = Session::get('ap_query');
        return view('ManageClient')->with('lists', $list)->with('userAcc', $ap_ua)->with('qwe', $ap_query);


    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AddClient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     "FirstName" => "required|min:2|max:20",
        //     "MiddleName" => "required|min:2|max:20",
        //     "LastName" => "required|min:2|max:20",
        //     "Sex" => "required|min:2|max:20",
        //     "Contact_Number" => "required|min:2|max:20",
        //     "Address" => "required|min:2|max:20",

        // ]);

        $validator = Validator::make(
            $request->all(),
            [
                "FirstName" => "required|min:2|max:20",
                "MiddleName" => "required|min:2|max:20",
                "LastName" => "required|min:2|max:20",
                "Sex" => "required|min:2|max:20",
                "Contact_Number" => "required|min:2|max:11",
                "Address" => "required|min:2|max:40"
            ]
        );

        if ($validator->fails()) {
            // return redirect("client.create")->withErrors($request)->withInput();
            return back()->withErrors($validator)->withInput();
        }
        Log::alert("Client has been added!");

        $Client = new Client;
        $Client->FirstName = $request->input("FirstName");
        $Client->MiddleName = $request->input("MiddleName");
        $Client->LastName = $request->input("LastName");
        $Client->Sex = $request->input("Sex");
        $Client->Contact_Number = $request->input("Contact_Number");
        $Client->Address = $request->input("Address");
        $Client->save();
        //alert nalang po ginamit ko sir para ma try
        return redirect()->route('client.index')->with('alert', 'Client succesfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Clients = Client::find($id);
        return view('ShowClient')->with('Client', $Clients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Clients = Client::find($id);
        return view('EditClient')->with('Client', $Clients);
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
                "FirstName" => "required|min:2|max:20",
                "MiddleName" => "required|min:2|max:20",
                "LastName" => "required|min:2|max:20",
                "Sex" => "required|min:2|max:20",
                "Contact_Number" => "required|min:2|max:11",
                "Address" => "required|min:2|max:40"
            ]
        );

        if ($validator->fails()) {
            // return redirect("client.create")->withErrors($request)->withInput();
            return back()->withErrors($validator)->withInput();
        }

        Log::alert("Client has been Edited!");

        $Clients = Client::find($id);
        $Clients->FirstName = $request->FirstName;
        $Clients->MiddleName = $request->MiddleName;
        $Clients->LastName = $request->LastName;
        $Clients->Sex = $request->Sex;
        $Clients->Contact_Number = $request->Contact_Number;
        $Clients->Address = $request->Address;
        $Clients->save();
        return redirect()->route('client.index')->with('alert', 'Client updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::alert("Client has been Deleted!");

        $delete = Client::find($id);
        $delete->delete();
        return redirect()->route('client.index')->with('alert', 'Client Deleted Successfully!');
    }
}