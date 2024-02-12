<?php

namespace App\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuizCreate extends Component
{
    public $quiz, $questions;
    public $counter = 0;
 
    public function mount($quiz){
        $this->quiz = $quiz;
        $this->questions = $quiz->questions;
    }
 
    public function render(){
        return view('livewire.quiz-create');
    }
}