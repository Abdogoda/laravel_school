<?php

namespace App\Http\Controllers;

use App\Interface\QuizRepositoryInterface;
use Illuminate\Http\Request;

class QuizController extends Controller{

    public $quiz;

    public function __construct(QuizRepositoryInterface $quiz){
        $this->quiz = $quiz;
    }

    
    public function index(){
        return $this->quiz->index();
    }

    public function show(string $id){
        return $this->quiz->show($id);
    }

    public function create(){
        return $this->quiz->create();
    }

    public function store(Request $request){
        return $this->quiz->store($request);
    }

    
    public function edit(string $id){
        return $this->quiz->edit($id);
    }

    public function update(Request $request, string $id){
        return $this->quiz->update($request, $id);
    }

    public function destroy(string $id){
        return $this->quiz->destroy($id);
    }
}