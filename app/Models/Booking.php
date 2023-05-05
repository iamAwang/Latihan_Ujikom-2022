<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table='bookings';
    protected $fillable=['name','date','film_id','user_id','amount'];

    public function film(){
        return $this->belongsTo(Film::class);
    }
}
