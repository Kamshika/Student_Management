<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('dashboard', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;
        $student->FirstName = $request->FirstName;
        $student->LastName = $request->LastName;
        $student->Maths = $request->Maths;
        $student->Physics = $request->Physics;
        $student->Chemistry = $request->Chemistry;

        $student->save();
        return redirect('/dashboard');
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
        return view('edit')->with('student', $student);
    }

    /**
     *
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('edit')->with('student', $student);
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
        $this->validate($request,
        [
            'FirstName' => 'required',
            'LastName' => 'required',
            'Maths' => 'required',
            'Physics' => 'required',
            'Chemistry' => 'required'
        ]);
        $student = Student::find($id);
        $student->FirstName = $request->input('FirstName');
        $student->LastName = $request->input('LastName');
        $student->Maths = $request->input('Maths');
        $student->Physics = $request->input('Physics');
        $student->Chemistry = $request->input('Chemistry');
        $student->save();

        return redirect('/dashboard');
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

        return redirect('/dashboard');
    }

}
