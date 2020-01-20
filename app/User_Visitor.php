<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Visitor extends Model
{
    protected $table = "user_visit";

    protected $primaryKey = "id";

    protected $fillable = ["user_id", "visit_id"];

    public function visit()
    {
        return $this->belongsTo('\App\Visit','visit_id');
    }

    public function user()
    {
        return $this->belongsTo('\App\User','user_id');
    }
}
