<?php

namespace App\Http\Controllers\API;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dotenv\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();

        return response()->json([
            "message" => "Student Added Successfully",
            "students" => $student,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:191',
            'course' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|min:11|max:11',
        ]);

        $student = new Student;
        $student->name = $fields["name"];
        $student->course = $fields["course"];
        $student->email = $fields["email"];
        $student->phone = $fields["phone"];
        $student->save();

        return response()->json([
            "message" => "Student Added Successfully",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            return response()->json([
                'student' => $student
            ]);
        } else {
            return response()->json([
                'message' => "No Student ID found!"
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fields = $request->validate([
            'name' => 'required|max:191',
            'course' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|min:11|max:11',
        ]);

        $student = Student::find($id);
        $student->name = $fields["name"];
        $student->course = $fields["course"];
        $student->email = $fields["email"];
        $student->phone = $fields["phone"];
        $student->update();

        return response()->json([
            "message" => "Student Updated Successfully",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            "message" => "Student Deleted Successfully",
        ]);
    }
}
