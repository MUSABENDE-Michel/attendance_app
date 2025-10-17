<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Attendence ;
use Carbon\Carbon;
use App\Models\Students;
use App\Models\Student;
use App\Models\Department;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $today = Carbon::today()->toDateString();

    $todayAttendance = Attendence::with(['student.department'])
        ->where('attendence_date', $today)
        ->paginate(6); // paginated today's attendance

    $allAttendance = Attendence::with(['student.department'])
        ->paginate(6); // paginated all records

    return view('Attendances.index', compact('todayAttendance', 'allAttendance'));
        // $attendence = Attendence::paginate(5);


        // return view("Attendances.index", compact("attendence"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {

$today = Carbon::today();
$todayAttendences=Attendence::whereDate('attendence_date',$today)->pluck('std_id')->toArray();
$unattendedStudent=Students::whereNotIn('id',$todayAttendences)->get();
       return view("Attendances.create",compact("today","unattendedStudent"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "std_id"=>"required",
            "date"=>"required",
            "attendance_status"=>"required"
        ]);




        if($request->attendance_status =="absent")
        {
            $attendence_status= False;
        }
        else if($request->attendance_status == "present"){
            $attendence_status= True;
        }

        if (auth()->check()) {
            $attendence = Attendence::create([
                "std_id" => $request->std_id,
                "user_id" => auth()->user()->id,
                "attendence_date" => $request->date,
                "attendence_status" => $attendence_status,
            ]);
            // Choose where to redirect based on which button was clicked
            if ($request->input('action') === 'review') {
                return redirect()->route("attendence.index")->with('success', 'Attendance recorded successfully!');
            } else {
                return redirect()->back()->with('success', 'Attendance recorded successfully!');
            }

        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to take attendance.');
        }


        if($attendence){
            return redirect()->route("attendence.index");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendence = Attendence::find($id);
        return view("Attendances.edit", compact("attendence"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'date' => 'required',
        'attendance_status' => 'required'
    ]);

    // Convert attendance status
    $attendance_status = $request->attendance_status == "1";

    // Perform the update
    $updated = Attendence::where('id', $id)->update([

        "attendence_date" => $request->date,
        "attendence_status" => $attendance_status
    ]);

    if ($updated) {
        return redirect()->route('attendence.index')->with('success', 'Attendance updated successfully');
    } else {
        return back()->with('error', 'Failed to update attendance.');
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
