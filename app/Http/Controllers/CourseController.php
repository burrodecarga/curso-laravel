<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Requirement;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index');
    }

    public function show(Course $course)
    {
        $this->authorize('published',$course);
        
        $similar = Course::where('category_id',$course->category_id)
        ->where('category_id','!=',$course->id)
        ->where('status',3)
        ->latest('id')
        ->get()->take(5);
        return view('courses.show',compact('course','similar'));
    }

    public function enrolled(Course $course)
    {
        $course->students()->attach(auth()->user()->id);
        return redirect()->back();
    }


}
