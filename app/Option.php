<?php namespace French;

use Illuminate\Database\Eloquent\Model;

class Option extends Model{

	protected $table = 'options';
	protected $fillable = ['name', 'value', 'type', 'order'];
    public $timestamps = false;

    public function objects()
    {
        return $this->belongsToMany('French\Object', 'objects_has_options');
    }
}