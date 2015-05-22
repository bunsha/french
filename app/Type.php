<?php namespace French;

use Illuminate\Database\Eloquent\Model;

class Type extends Model{

	protected $table = 'types';

	protected $fillable = ['name'];

    public $timestamps = false;


    public function objects()
    {
        return $this->hasMany('French\Object', 'type');
    }

}
