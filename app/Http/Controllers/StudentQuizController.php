<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class StudentQuizController extends Controller{

    public function index(){
        $quizzes = Quiz::where('section_id', auth()->user()->section_id)->orderBy('id', 'DESC')->get();
        return view('pages.students.dashboard.quizzes.index', compact('quizzes'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    public function show(string $id){
        $quiz = Quiz::find($id);
        $student_id = auth()->user()->id;
        return view('pages.students.dashboard.quizzes.show', compact('quiz', 'student_id'));
    }

    public function edit(string $id){
        //
    }

    public function update(Request $request, string $id){
        //
    }

    public function destroy(string $id){
        //
    }
}