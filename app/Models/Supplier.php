<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'phone_number',
        'supplier_employers',
        'address',
        'website_uri',
        'supplier_email',
        'supplier_note',
        'supplier_rating',
        'supplier_users',
        'supplier_rating_id'
    ];

    public function supplier_activities(){
        return $this->belongsToMany(Activity::class, 'supplier_activities', 'supplier_id');
    }

    public function rating(){
        return $this->belongsTo(SupplierRating::class, 'supplier_rating_id');
    }
}
