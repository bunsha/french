<?php namespace French\Http\Controllers;

use French\City;
use French\District;
use French\Map;
use French\Http\Requests;
use French\Http\Requests\CreateCityRequest;
use Illuminate\Support\Facades\View;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;


class MapsController extends Controller {


	public function index()
	{
		return view('maps.index');
	}

    public function getAll(){
        return false;
    }

    /*
     * $json['results'][0]['address_components']
     * $json['results'][0]['geometry']['location']['lng']
     */

    public function getGeocode($string){
        $string = str_replace(" ", "+", $string);
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$string";
        $response = file_get_contents($url);
        $json = json_decode($response, true);
        return $json;
    }

    public function store($string){
        $geoData = $this->getGeocode($string);
        $district = null;
        $city = null;
        $districtName = null;
        $cityName = null;
        if($geoData['status'] == "OK"){
            foreach($geoData['results'][0]['address_components'] as $item){
                if($item['types'][0] == "locality"){
                    $cityName = $item['long_name'];
                }
                if($item['types'][0] == "administrative_area_level_1"){
                    $districtName = $item['long_name'];
                }
            }
            if($cityName){
                $cityCount = City::where('name', '=', $cityName)->count();
                if ($cityCount == 0){
                    $city = City::create([
                        'name' => $cityName,
                        'shape' => null,
                    ]);
                }else{
                    $city = City::where('name', '=', $cityName)->first();
                }
                $districtCount = District::where('name', '=', $districtName)->count();
                if ($districtCount == 0){
                    $district = District::create([
                        'name' => $districtName,
                        'shape' => '',
                        'city' => $city->id
                    ]);
                }else{
                    $district = District::where('name', '=', $districtName)->first();
                }
                Map::create([
                    'name' => 'New Name',
                    'lat' => $geoData['results'][0]['geometry']['location']['lng'],
                    'lng' => $geoData['results'][0]['geometry']['location']['lng'],
                    'address' => $geoData['results'][0]['formatted_address'],
                    'descr' => 'New Descr',
                    'city' => $city->id,
                    'district' => $district->id,
                ]);
            }

        }else{
            return http_response_code(104);
        }


    }

}