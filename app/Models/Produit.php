<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Produit extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'produit';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Name',
        'date',
        'image',
        'type',
        'Description',
        'Price',
        'Sold',
        'Quantity',
    ];

}
