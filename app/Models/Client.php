<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'document', 'address', 'number', 'complement',
        'zipcode', 'city', 'email', 'birth', 'district'
    ];
}
