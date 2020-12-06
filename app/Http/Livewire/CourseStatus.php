<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;

class CourseStatus extends Component
{
    public $course, $current;

    public function mount(Course $course)
    {
        $this->course = $course;

        foreach ($course->lessons as $lesson) 
        {
            if(!$lesson->completed)
            {
                $this->current = $lesson;
                break;
            }
        }

        //if the course is finish get a last class in the list
        if(!$this->current)
        {
            $this->current = $course->lessons->last();
        }
    }

    public function render()
    {
        return view('livewire.course-status');
    }


    //Methods

    public function changeLesson(Lesson $lesson)
    {
        $this->current  = $lesson; 
    }

    public function getIndexProperty()
    {
        return $this->index    = $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function completed()
    {
        if($this->current->completed)
        {
            //Delete record
            $this->current->users()->detach(auth()->user()->id);
        }
        else
        {
            //Add record
            $this->current->users()->attach(auth()->user()->id);
        }

        //Update value of current and course
        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    //Computed properties

    public function getPreviousProperty()
    {
        if($this->index == 0)
        {
            return null;
        }
        else
        {
            return $this->course->lessons[$this->index - 1];
        }
    }

    public function getNextProperty()
    {
        if($this->index == $this->course->lessons->count() - 1)
        {
            return null;
        }
        else
        {
            return $this->course->lessons[$this->index + 1];
        }
    }

    public function getAdvanceProperty()
    {
        $i = 0;

        foreach ($this->course->lessons as $lesson)
        {
            if($lesson->completed)
            {
                $i++;
            }
        }

        $advance = ($i * 100)/($this->course->lessons->count());

        return round($advance, 2);
    }
}
