<?php namespace French\Http\Controllers;

use French\Type;
use French\Http\Requests;
use French\Http\Requests\CreateCityRequest;
use Illuminate\Support\Facades\View;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class TypesController extends Controller {


    public function index()
    {
        $items =  Type::all();
        return view('admin.types.all')->with('items', $items);
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(CreateCityRequest $request)
	{
        try {
            Type::create([
                'name' => $request['name'],
                'shape' => $request['shape'],
            ]);
        }
        catch(Exception $ex)
        {
            Log::error($ex->getMessage());
            return redirect('/admin/city/')->with('message', Lang::get('misc.city.notCreated', ['name' => $request['name']]));
        }
        return redirect('/admin/city/')->with('message', Lang::get('misc.city.created', ['name' => $request['name']]));
	}

    public function edit($id)
    {
        $item = Type::findOrFail($id);
        $disctrict = $item->districts;
        return view('admin.cities.edit')->with(['item' => $item, 'title' => 'Edit "'.$item->name.'" city', 'brcr' => 'Edit city', 'disctrict' => $disctrict]);
    }

    public function update(CreateCityRequest $request)
    {
        $city = Type::find($request['id']);
        if($city){
            $city->name = $request['name'];
            if(strlen($request['shape']) > 10)
                $city->name = $request['shape'];
            $city->save();
            return redirect('/admin/city/'.$request['id'].'/edit')->with('message', Lang::get('misc.city.saved', ['name' => $request['name']]));
        }else {
            return false;
        }

    }
    public function delete($id){
        $city = City::find($id);
        $name = $city->name;
        City::destroy($id);
        return redirect('/admin/city')->with('message', Lang::get('misc.city.deleted', ['name' => $name]));
    }


    public function districtEdit(Request $request){
        $district = District::find($request['pk']);
        if($district){
            $district->name = $request['value'];
            $district->save();
            return $district;
        }else{
            $district = new District;
            $district->city = $request['city'];
            $district->name = $request['name'];
            $district->shape = $request['shape'];
            $district->save();
            return $district;
        }
    }


    public function districtDelete($id)
    {
        District::destroy($id);
    }
}
