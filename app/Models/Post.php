<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'posts';

    // PRIMARY key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    // relation from posts to users, makes certain queries and elements available
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
