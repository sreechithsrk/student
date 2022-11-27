<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;

    protected $table = 'student_mark';
    protected $fillable = ['id_student', 'id_term', 'maths', 'science', 'history'];

    /**
     * getAllStudentDetails.
     */
    public function getAllStudentMarkDetails(): array
    {
        return StudentMark::select(
            'student_mark.id as id',
            'maths',
            'science',
            'history',
            's.name as name',
            't.term',
            'gender',
            'student_mark.created_at'
        )
            ->join('student as s', 'student_mark.id_student', '=', 's.id')
            ->join('term as t', 'student_mark.id_term', '=', 't.id')
            ->get()->all() ?? [];
    }
}
