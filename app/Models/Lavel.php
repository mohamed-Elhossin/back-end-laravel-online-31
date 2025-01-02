<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lavel extends Model
{
    use HasFactory;
    protected $table = "lavels";
    protected $fillable = ['title', 'description'];


    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
