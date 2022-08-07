<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Classroom;
use App\Models\Student;
use App\Services\TextService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
	public function index(Request $request)
	{
		$search = $request->search ?? null;
		$students = Student::when(!is_null($search), function($query) use($search){
				$query->search($search);
			})
			->get();

		return view('index', compact('students'));
	}

	public function create()
	{
        $classroom = Classroom::all();
		return view('create', compact('classroom'));
	}

	public function store(StudentRequest $request)
	{
		$student = new Student;
		$student->name = $request->name;
        $student->birth_at = $request->birth_at;
        $student->age = $request->age;
        $student->classroom_id = $request->classroom_id;
		$student->save();

		return redirect()->route('student.index');
	}

	public function show(Student $student)
	{
		return view('show', compact('student'));
	}

	public function edit(Student $student)
	{
		$classroom = Classroom::all();
		return view('edit', compact('student', 'classroom'));
	}

	public function update(StudentRequest $request, Student $student)
	{
		$student->name = $request->name;
        $student->birth_at = $request->birth_at;
        $student->age = $request->age;
        $student->classroom_id = $request->classroom_id;
		$student->save();

		return redirect()->route('student.index');
	}

	public function destroy(Student $student)
	{
		$student->delete();

		return redirect()->route('student.index');
	}
}