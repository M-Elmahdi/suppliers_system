<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attatchment extends Model
{
    use HasFactory;

    protected $table = 'attachments';

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
