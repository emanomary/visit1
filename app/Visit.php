<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
	protected $table = "visits";

    protected $primaryKey = "id";

    protected $fillable = [
        'visitor_id', 'visit_goal','visit_date','start_time', 'end_time'
    ];

    //relation between visits and user
    /*public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }*/

    public function visitor()
    {
        return $this->belongsTo('App\Visitor', 'visitor_id');
    }

    public function user_visit()
    {
        return $this->hasMany('\App\User_Visitor','visit_id');
    }

}
