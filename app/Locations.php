<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model {

    protected $table = "locations";
    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
