<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [   
    "std_name",
    "std_age", 
    "std_email", 
    "std_phone",
    "std_gender",
    "std_dpt",
    "std_level"
    ];


    public function department(): BelongsTo{
    return $this->belongsTo(Department::class,'std_dpt','id');      
    }

    public function attendance(): HasMany{
        return $this->hasMany(Attendence::class);
    }
}