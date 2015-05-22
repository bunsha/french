<?php namespace French\Http\Controllers;

use French\Http\Requests;
use French\Map;
use French\Object;
use French\Option;
use French\Type;
use Illuminate\Support\Facades\View;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class OptionsController extends Controller {


    public function index()
    {
        $items =  Option::all();
        return view('admin.objects.all')->with('items', $items);
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.objects.create')->with(['types' => $types]);
    }

    public function store(Request $request)
	{

	}
    public function show($id)
    {

    }
    public function getByObject(){

    }
}
