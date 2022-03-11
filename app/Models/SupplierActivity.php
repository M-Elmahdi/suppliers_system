<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierActivity extends Model
{
    use HasFactory;

    protected $table = 'supplier_activities';

    protected $fillable = [
        'activity_id', 'supplier_id'
    ];

    public function user(){
        return $this->hasMany(Supplier::class);
    }

    public function activity(){
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
