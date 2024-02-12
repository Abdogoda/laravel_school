<?php

namespace App\Http\Controllers;

use App\Interface\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller{

    public $question;

    public function __construct(QuestionRepositoryInterface $question){
        $this->question = $question;
    }

    
    public function index(){
        return $this->question->index();
    }

    public function show(string $id){
        return $this->question->show($id);
    }

    public function create(){
        return $this->question->create();
    }

    public function store(Request $request){
        return $this->question->store($request);
    }

    
    public function edit(string $id){
        return $this->question->edit($id);
    }

    public function update(Request $request, string $id){
        return $this->question->update($request, $id);
    }

    public function destroy(string $id){
        return $this->question->destroy($id);
    }
}