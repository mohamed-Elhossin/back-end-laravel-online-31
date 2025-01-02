<?php

namespace App\Models;

use App\Models\Lavel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    protected $fillable = ['name',    "email",    "GPA",    'lavel_id'];


    public function lavel()
    {
        return $this->belongsTo(Lavel::class);
    }
}
