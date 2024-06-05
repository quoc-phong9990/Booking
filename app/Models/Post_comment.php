<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_comment extends Model
{
    use HasFactory;
    protected $table = 'post_comments';
    protected $fillable = ['comment','post_id'];
}
