<?php namespace French\Http\Controllers;

use French\Http\Requests;
use French\Map;
use French\Object;
use French\Type;
use Illuminate\Support\Facades\View;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ObjectsController extends Controller {


    public function index()
    {
        $items =  Object::all();
        return view('admin.objects.all')->with('items', $items);
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.objects.create')->with(['types' => $types]);
    }

    public function store(Request $request)
	{
        if($request['active'] != '')
            $active = 1;
        else
            $active = 0;

        $object = Object::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'status' => $request['status'],
            'active' => $active,
            'author' => $request['author'],
            'type' => $request['type'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent_id'],
        ]);
        $map = Map::find($request['maps_id']);
        $map->object_id = $object->id;
        $map->save();

        foreach($request['options'] as $option){
            DB::table('objects_has_options')->insert(
                ['objects_id' => $object->id, 'options_id' => 2, 'meta_key' => $option['key'] ,'meta_value' => $option['value']]
            );
        }


        return redirect('/admin/objects/')->with('message', Lang::get('misc.objects.created', ['name' => $request['name']]));
	}
    public function show($id)
    {
        $types = Type::all();
        $item = Object::find($id);
        $map = $item->map;
        $maps = Map::all();
        return view('admin.objects.show')->with(['types' => $types, 'item' => $item, 'maps' => $maps]);
    }
}
