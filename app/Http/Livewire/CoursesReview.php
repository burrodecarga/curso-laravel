<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class CoursesReview extends Component
{
    public $course_id,$comment;
    public $rating = 5;

    public function mount(Course $course){
  $this->course_id = $course->id;
    }

    public function render()
    {
        $course = Course::find($this->course_id);
        return view('livewire.courses-review',compact('course'));
    }

    public function store(){

        $rules = ['comment'=>'required'];
        $this->validate($rules);
        $course = Course::find($this->course_id);
        $course->reviews()->create([
            'comment' =>$this->comment,
            'rating' =>$this->rating,
            'user_id' =>auth()->user()->id
        ]);

        $this->reset('comment');
    }
}
