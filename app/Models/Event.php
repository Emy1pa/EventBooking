<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'location',
        'AvailablePlaces',
        'ReservationType' ,
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
