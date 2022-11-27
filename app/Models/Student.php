<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = ['name', 'age', 'gender', 'id_teacher'];
    public $timestamps = false;

    /**
     * getAllStudentDetails.
     */
    public function getAllStudentDetails(): array
    {
        return Student::select(
            'student.id as id',
            'student.name as name',
            'age',
            'id_teacher',
            'gender',
            't.name as teacher_name'
        )
            ->join('teacher as t', 'student.id_teacher', '=', 't.id')->get()->all() ?? [];
    }

    /**
     * getAllStudents
     */
    public function getAllStudents(): array
    {
        return Student::select('student.id as id', 'student.name as name')->get()->all() ?? [];
    }
}
