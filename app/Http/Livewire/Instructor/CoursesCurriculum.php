<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesCurriculum extends Component
{
    use AuthorizesRequests;


    public $course,$section,$name;

    protected $rules=[
        'section.name'=>'required'
    ];


    public function mount(Course $course){
        $this->authorize('dictated',$course);
        $this->course = $course;
        $this->section = new Section();
    }


    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor',['course'=>$this->course]);
    }

    public function edit(Section $section){
        $this->resetValidation();
         $this->section = $section;
    }

    public function update(){
       $this->validate($this->rules);
       $this->section->save();
       $this->section = new section();
       $this->course = Course::find($this->course->id);
       $this->render();
    }

    public function delete(Section $section){
        $section->delete();
        $this->course = Course::find($this->course->id);
        $this->render();
    }

    public function store(){
        $this->validate([
            'name' =>'required'
        ]);
       Section::create([
        'name'=>$this->name,
        'course_id' =>$this->course->id
       ]);
       $this->name = '';
       $this->course = Course::find($this->course->id);
       $this->render();
    }
}
