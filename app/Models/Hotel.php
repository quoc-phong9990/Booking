<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'hotels';
    protected $fillable = [
           'name',
           'room',
           'price',
           'promotion',
           'description',
           'services',
           'status',
           'owner_id',
           'province_id',
           'district_id',
           'ward_id',
           'address',
           'rate',

    ];
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'hotel_service');
    }
}
