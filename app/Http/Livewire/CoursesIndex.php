<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;

    public function paginationView()
    {
        return 'pagination-links';
    }

    public $category_id=1;
    public $level_id =2;

    public function render()
    {
        $categories = Category::all();
        $levels = level::all();
        $courses = Course::where('status',3)
                          ->category($this->category_id)
                          ->level($this->level_id)
                          ->latest('id')->paginate(4);
        return view('livewire.courses-index',[
            'courses' =>$courses,
            'categories' =>$categories,
            'levels' =>$levels
        ]);
    }

    public function iniciar()
    {
        $this->reset();
    }


}
