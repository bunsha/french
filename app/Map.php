<?php namespace French;

use Illuminate\Database\Eloquent\Model;

class Map extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'maps';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'lat', 'lng', 'address', 'description', 'city', 'district'];

    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo('French\City', 'city');
    }

    public function district()
    {
        return $this->belongsTo('French\District', 'district');
    }

    public function object()
    {
        return $this->belongsTo('French\Object', 'object_id');
    }
}
