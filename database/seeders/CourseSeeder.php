<?php

namespace Database\Seeders;

use App\Models\Audience;
use App\Models\Course;
use App\Models\Description;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Requirement;
use App\Models\Section;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $courses = Course::factory(10)->create();
      foreach($courses as $c){
          Image::factory(1)->create([
              'imageable_id' =>$c->id,
              'imageable_type' =>'App\Models\Course'
          ]);
          Requirement::factory(4)->create([
              'course_id' =>$c->id
          ]);
          Goal::factory(4)->create([
            'course_id' =>$c->id
        ]);

       $sections= Section::factory(4)->create([
            'course_id' =>$c->id
        ]);

        Audience::factory(4)->create([
            'course_id' =>$c->id
        ]);

        foreach($sections as $s){
            $lessons = Lesson::factory(5)->create([
                'section_id' => $s->id
            ]); }

         foreach($lessons as $l){
             Description::factory()->create([
                 'lesson_id' =>$l->id
             ]);
         }

       }


    }
}
