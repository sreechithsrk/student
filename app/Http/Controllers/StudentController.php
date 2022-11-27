<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** model */

use App\Models\Student;
use App\Models\StudentMark;
use App\Models\Teacher;

use Exception;

/** facade */

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    private $teacher;
    private $student;
    private $studentMark;

    public function __construct(Teacher $teacher, Student $student, StudentMark $studentMark)
    {
        $this->teacher = $teacher;
        $this->student = $student;
        $this->studentMark = $studentMark;
    }

    /**
     * index page with all students
     */
    public function index()
    {
        $students = $this->student->getAllStudentDetails();

        return view('index', ['students' => $students]);
    }

    /**
     * load form for create/update student
     * 
     * @param null|integer $id
     */
    public function create(?int $id = null)
    {
        $teachers = $this->teacher->getTeachers();
        $student = !empty($id) ? Student::find($id) : [];

        return view('form', ['student' => $student ?? [], 'teachers' => $teachers]);
    }

    /**
     * removeStudent
     * 
     * @param int $id
     */
    public function removeStudent(int $id)
    {
        DB::beginTransaction();
        try {
            StudentMark::where('id_student', $id)->delete();
            Student::where('id', $id)->delete();
            DB::commit();

            return redirect()->route('student.index')->with('success', 'Removed Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * create/update student
     * 
     * @param Request $request
     */
    public function createOrUpdateStudent(Request $request)
    {
        $id = $request->get('id') ?? null;
        $studentData = [
            'name' => $request->get('name'),
            'age' => $request->get('age'),
            'gender' => $request->get('gender'),
            'id_teacher' => $request->get('id_teacher'),
        ];

        if (!empty($id)) {
            if (Student::where('id', $id)->update($studentData)) {
                return back()->with('success', 'Student Details Updated Successfully!');
            }
        } else {
            if (Student::create($studentData)) {
                return redirect()->route('student.index')->with('success', 'Student Created Successfully!');
            }
        }
        return back()->with('error', 'something went wrong');
    }

    /**
     * index page with all students
     */
    public function markList()
    {
        $studentMarks = $this->studentMark->getAllStudentMarkDetails();

        return view('mark.index', ['studentMarks' => $studentMarks]);
    }

    /**
     * load form for create/update student
     * 
     * @param null|integer $id
     */
    public function addMark(?int $id = null)
    {
        $students = $this->student->getAllStudents();
        $terms = DB::table('term')->get()->all();
        $marks = !empty($id) ? StudentMark::find($id) : [];

        return view('mark.form', ['students' => $students, 'terms' => $terms, 'marks' => $marks ?? []]);
    }

    /**
     * add/update Mark
     * 
     * @param Request $request
     */
    public function AddOrUpdateMark(Request $request)
    {
        $id = $request->get('id') ?? null;
        $data = [
            'id_student' => $request->get('id_student'),
            'id_term' => $request->get('id_term'),
            'maths' => $request->get('maths'),
            'science' => $request->get('science'),
            'history' => $request->get('history'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if (!empty($id)) {
            if (StudentMark::where('id', $id)->update($data)) {
                return back()->with('success', 'Mark Updated Successfully!');
            }
        } else {
            if (StudentMark::create($data)) {
                return redirect()->route('mark.index')->with('success', 'Mark Added Successfully!');
            }
        }
        return back()->with('error', 'something went wrong');
    }

    /**
     * removeStudent
     * 
     * @param int $id
     */
    public function removeMark(int $id)
    {
        if (StudentMark::where('id', $id)->delete()) {
            return redirect()->route('mark.index')->with('success', 'Removed Successfully!');
        }
        return back()->with('error', 'something went wrong');
    }
}
