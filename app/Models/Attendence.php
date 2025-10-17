<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attendence extends Model
{
    use HasFactory;
    protected $fillable = [
        "std_id",
        "user_id",
        "attendence_date",
        "attendence_status"
    ];

public function user(){
    return $this->belongsTo(User::class,"user_id","id");
}
public function student(): BelongsTo 
{
    return $this->belongsTo(Students::class, "std_id","id");
}







}
