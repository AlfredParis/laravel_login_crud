<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

	public function testone()
	{
		return view('home');

	}

	public function arr()
	{

		$client = array(
			array(
				"FirstName" => "Alfred",
				"MiddleName" => "Delval",
				"LastName" => "paris",
				"Sex" => "M",
				"Contact_Number" => "+639488409979",
				"Address" => "San Carlos City Pangalangan"
			),
			array(
				"FirstName" => "There",
				"MiddleName" => "Delval",
				"LastName" => "paris",
				"Sex" => "M",
				"Contact_Number" => "+639488409979",
				"Address" => "San Carlos City Pangalangan"
			),
			array(
				"FirstName" => "Diane",
				"MiddleName" => "Delval",
				"LastName" => "paris",
				"Sex" => "M",
				"Contact_Number" => "+639488409979",
				"Address" => "San Carlos City Pangalangan"
			),
		);



		return view('array')->with('client', $client);
	}

	public function cs()
	{
		$grades = 65;
		$client = array(
			array(
				"FirstName" => "Alfred",
				"MiddleName" => "Delval",
				"LastName" => "paris",
				"Sex" => "M",
				"Contact_Number" => "+639488409979",
				"Address" => "San Carlos City Pangalangan"
			),
		);


		return view('ControlStructures')->with('grades', $grades)->with('client', $client);
	}
	public function maintenance()
	{

		return view('maintenance');

	}
}