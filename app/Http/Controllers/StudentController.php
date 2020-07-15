<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

class StudentController extends Controller
{
    //
    public function index(){
       // $students = Students::all();
        $students = Students::paginate(3);
        return view('welcome', compact('students'));
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){
        //Validate the form
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' =>'required',
            'phone'=>'required'
        ]);
            //Create Object with Student Model
        $student = new Students;
        $student->first_name = $request->firstname;
        $student->last_name = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return redirect(route('home'))->with('successMsg', 'Student Succecssfully Added');

    }
    public function edit($id){
        $student = Students::find($id);
        return view('edit', compact('student'));
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' =>'required',
            'phone'=>'required'
        ]);
            //Create Object with Student Model
        $student = Students::find($id);
        $student->first_name = $request->firstname;
        $student->last_name = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return redirect(route('home'))->with('successMsg', 'Student Succecssfully Updated');
    }
    public function delete($id){
        Students::find($id)->delete();
        return redirect(route('home'))->with('successMsg', 'Student has been Deleted');

    }
}
