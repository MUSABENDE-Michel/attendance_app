<?php

namespace App\Http\Controllers;

use App\Mail\SendStudentPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Students;
use App\Models\Student;
use App\Models\Department;
use App\Models\Attendence;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;




class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //select from department

    public function __construct() {
        // You might want to apply the 'auth:student' middleware only to specific methods
        // like dashboard. For general resource management, you might use other middleware.
        // $this->middleware('auth:student')
        $this->middleware('auth:student')->only('dashboard');;
    }

    public function attendance()
    {

        $user = auth()->user();
        $studentId = $user->student_id;
        $myAttendence= Attendence::where('std_id', $studentId)-> paginate('6');

      return view('Students.dashboard', compact('myAttendence'));

    }



    public function index()
    {

        $student_data =  Students::paginate(8);

        return view("Students.student", compact("student_data"));

    }

    /**
     * Show the form for creating a new resource.
     */public function create()
{
    $departments = Department::all(); // Assuming you have a Department model
    return view('Students.create', compact('departments'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "std_name" => "required",
            "std_age" => "required",
            "std_email" => "required|email",
            "std_phone" => "required",
            "std_gender" => "required",
            "std_dpt" => "required",
            "std_level" => "required"
        ]);

        // Generate random password
        $generatedPassword = Str::random(8);

        // Create student record
        $student = Students::create([
            "std_name" => $request->std_name,
            "std_age" => $request->std_age,
            "std_email" => $request->std_email,
            "std_phone" => $request->std_phone,
            "std_gender" => $request->std_gender,
            "std_dpt" => $request->std_dpt,
            "std_level" => $request->std_level
        ]);

        if (!$student) {
            return back()->with('error', 'Failed to create student.');
        }

        // Create associated user account
        $user = User::create([
            'user_type' => 'student',
            'name' => $student->std_name,  // Fixed typo
            'email' => $student->std_email,  // Fixed typo
            'password' => Hash::make($generatedPassword),
            'student_id' => $student->id,
        ]);

        // Send password to student via email
        Mail::to($user->email)->send(new SendStudentPassword($user->email, $generatedPassword));

        // Success message
        Session::flash('success', 'Student created successfully. Password sent to email.');
        return redirect()->route('Students.index');
    }



    public function update(Request $request, string $id)
    {
        $request->validate([
            'std_name' => ['required', 'string'],
            'std_age' => ['required', 'string'],
            'std_email' => ['required', 'string'],
            'std_phone' => ['required', 'string'],
            'std_gender' => ['required', 'string'],
            'std_dpt' => ['required', 'string'],
            'std_level' => ['required', 'string'],
        ]);

        $student = Students::find($id);

        if (!$student) {
            return redirect()->route('Students.index')->with('error', 'Student not found.');
        }

        // Fill new data
        $student->std_name = $request->std_name;
        $student->std_age = $request->std_age;
        $student->std_email = $request->std_email;
        $student->std_phone = $request->std_phone;
        $student->std_gender = $request->std_gender;
        $student->std_dpt = $request->std_dpt;
        $student->std_level = $request->std_level;

        $student->save();

        return redirect()->route('Students.index')->with('success', 'Student updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $Students=Students::find($id);
    //     if(!$Students){
    //             return redirect()->route("Students.student")->with("error","Student not found");

    //     }
    //     $Students->delete();
    //     return redirect()->route("Students.index");

    // }



    public function destroy(string $id)
{
    $student = Students::find($id);

    if (!$student) {
        return redirect()->route('Students.index')->with('error', 'Student not found.');
    }

    $student->delete();

    return redirect()->route('Students.index')->with('success', 'Student deleted successfully!');
}

}
