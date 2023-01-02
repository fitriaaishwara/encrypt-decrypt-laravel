<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory, Uuid;

    protected $table = 'home';
    protected $primaryKey = 'id';
    protected $fillable = ['image'];


}
