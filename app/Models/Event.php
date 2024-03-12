<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'location',
        'availablePlaces',
        'ReservationType' ,
        'status',
        'user_id',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function events()
    {
        return $this->hasMany(User::class);
    }
}
