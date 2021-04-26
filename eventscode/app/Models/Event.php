<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $fillable =[
        'user_id',
        'event_name',
        'event_location',
        'event_date',
        'event_description',
        'covid_limit'
    ];

    //creating one to one relationship (has one)
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
