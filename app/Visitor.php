<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
	protected $table = "visitors";

    protected $primaryKey = "id";

    protected $fillable = ['visitor_name', 'job'];

    public function visit()
    {
        return $this->hasMany('\App\Visit');
    }
}
