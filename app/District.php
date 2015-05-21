<?php namespace French;

use Illuminate\Database\Eloquent\Model;

class District extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'districts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'shape'];

    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo('French\City', 'city');
    }

    public function districts()
    {
        return $this->hasOne('French\Map', 'maps');
    }
}