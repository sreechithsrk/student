<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teacher';
    protected $fillable = ['id', 'name', 'variant_value'];
    public $timestamps = false;

    /**
     * get all acive teacher 
     * 
     * @return array
     */
    public function getTeachers(): array
    {
        return Teacher::select('id', 'name')->where('is_active', 1)->get()->all() ?? [];
    }
}
