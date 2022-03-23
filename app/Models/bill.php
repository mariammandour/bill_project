<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_count',
        'total_bills',
        'client_id',
        'created_at',
        'updated_at'
    ];
}
