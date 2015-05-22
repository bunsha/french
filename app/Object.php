<?php namespace French;

use Illuminate\Database\Eloquent\Model;

class Object extends Model{

	protected $table = 'objects';
	protected $fillable = ['title', 'content', 'status', 'active', 'author', 'type', 'maps_id', 'maps_city', 'maps_district', 'slug', 'parent_id'];


    public function options()
    {
        return $this->belongsToMany('French\Option', 'objects_has_options');
    }

    public function map()
    {
        return $this->hasOne('French\Map', 'object_id');
    }
}