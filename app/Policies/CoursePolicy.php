<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function isEnrolled(User $user,Course $course)
    {
        if($course->students->contains($user->id)){ return true;}{return false;}
    }

    public function published(?User $user,Course $course){
        return ($course->status==3)? true:false;}


        public function dictated(User $user,Course $course){

            return ($course->user_id == $user->id)? true:false;
        }

        public function revision(User $user, Course $course){
            return ($course->status==2)? true:false;
        }

        public function value(User $user,Course $course){
            if(Review::where('user_id',auth()->user()->id)
                     ->where('user_id',$course->user_id)
                     ->count()){ return true; }else{return false;}
        }
}
