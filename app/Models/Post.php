<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'title', 'excerpt', 'body', 'image_path', 'is_published', 'min_to_read'
    ];
    // protected $table = 'posts'; // Uncomment if your table name is 'users'
    // protected $primaryKey = 'title'; // Uncomment if your primary key is 'title'
    // protected $timestamps = true; // Leave as it is or set to false if not needed
    // protected $dateFormat = 'U'; // Uncomment and set if you want custom date format
    // protected $connection = 'sqlite'; // Uncomment if your connection is 'sqlite'
    // protected $attributes = [
    //     'is_published' => true // Uncomment and fix typo if you want default attributes
    // ];

 
}

