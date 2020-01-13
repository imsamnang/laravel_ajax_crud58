<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{

		public function preview()
		{
			$students = Student::all();
			return view('print.printstudent')->with('students', $students);
		}
		public function prnpriview()
		{
			$students = Student::all();
			return view('print.students')->with('students', $students);
		}
			
    public function index()
    {
			$students = Student::orderby('id','DESC')->get();
			return view('student.index',compact('students'));
    }

		public function get()
    {
			$students = Student::orderby('id','DESC')->get();
			return view('student.getDatatable',compact('students'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
			if($request->button_action=='insert'){
				$student = new Student();
				$student->nis = $request->nis;
				$student->name = $request->name;
				$student->class = $request->class;
				$photo = $request->file('photo');
				$student->photo = $photo->getClientOriginalName();
				$photo->move(public_path('Upload/Student/'),$photo->getClientOriginalName());
				$student->save();
			}
			if($request->button_action=='update'){
				$student = Student::findOrFail($request->student_id);
				$old_image = $student->photo;
				$student->nis = $request->nis;
				$student->name = $request->name;
				$student->class = $request->class;
				$photo = $request->file('photo');
				if($photo){
					File::delete(public_path('Upload/Student/'.$old_image));
					$student->photo = $photo->getClientOriginalName();
					$photo->move(public_path('Upload/Student/'),$photo->getClientOriginalName());
				} else {
					$student->photo = $old_image;
				}
				$student->save();
			}
    }

    public function show(Student $student)
    {
      //
    }

    public function edit(Request $request)
    {
			$student = Student::findOrFail($request->id);
			echo json_encode($student);
    }

    public function update(Request $request, $id)
    {
			$student = Student::findOrFail($id);
			$student->nis = $request->nis;
			$student->name = $request->nis;
			$student->class = $request->nis;
			$photo = $request->file('photo');
			$student->photo = $photo->getClientOriginalName();
			$photo->move(public_path('Upload/Student/'),$photo->getClientOriginalName());
			$student->save();
			return redirect(route('students.index'));
    }

    public function destroy(Request $request)
    {
			$student = Student::findOrFail($request->id);
			File::delete(public_path('Upload/Student/').$student->photo);
			if($student->delete())
			{
				echo 'Data Deleted';
			}
    }
}
