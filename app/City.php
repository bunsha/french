<?php namespace French;

use Illuminate\Database\Eloquent\Model;

class City extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cities';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'shape'];

    public $timestamps = false;

    public function maps()
    {
        return $this->hasMany('French\Map', 'city');
    }

    public function districts()
    {
        return $this->hasMany('French\District', 'city');
    }
}
