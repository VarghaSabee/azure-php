<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locations;

class LocationsController extends Controller {

    const MODEL = "App\LocationsController";

//    use RESTActions;

    public function store(Request $request){
        $status = "Erorr not saved!";

        $locations = new Locations();
        $locations->deviceID = $request->input("deviceID");
        $locations->date = $request->input("date");
        $locations->longitude = $request->input("longitude");
        $locations->latitude = $request->input("latitude");
        $locations->device_name = $request->input("device_name");
        if (!$locations->save()){
            return $status;
        }
        return $status = "OK";
    }

    public function remove_all(){
        Locations::where('deviceID','blabla')->delete();
    }
    public function remove_one($deviceID = ''){
        Locations::where('deviceID',$deviceID)->delete();
    }

    public function show_one($deviceID = ''){
        $device = Locations::where('deviceID', $deviceID)->get();
        return $device;
    }
    public function show_all(){
        $devices = Locations::orderBy('deviceID', 'desc')
            ->groupBy('deviceID')
            ->get(['device_name','deviceID']);
        return $devices;
    }

    public function storeDeviceFile(){
//        return '' . storage_path();

        $line = '{"deviceID":"blabla","date":"16546486","longitude":"52.23515","latitude":"15.84845","updated_at":"2018-09-01 10:58:03","created_at":"2018-09-01 10:58:03","deleted_at ":null},' . PHP_EOL;

        $myfile = fopen(storage_path() . '/text.json', "a");
        for($i = 0; $i < 500; $i ++){
            fwrite($myfile, json_encode($line);
        }
        fclose($myfile);


        return storage_path();
    }
}
