<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = "foods";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'category',
        'harga',
        'gambar',
        'is_deleted',
        'created_by',
        'updated_by',
    ];
}
