<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourComment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tour_comments';
    protected $fillable = [
        'comments',
        'tour_id',
        'user_id'
    ];
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
