<?php

namespace App\Http\Controllers;

use App\Interface\ExamRepositoryInterface;
use Illuminate\Http\Request;

class ExamController extends Controller{
    public $exam;

    public function __construct(ExamRepositoryInterface $exam){
        $this->exam = $exam;
    }

    
    public function index(){
        return $this->exam->index();
    }

    public function show(string $id){
        return $this->exam->show($id);
    }

    public function create(){
        return $this->exam->create();
    }

    public function store(Request $request){
        return $this->exam->store($request);
    }

    
    public function edit(string $id){
        return $this->exam->edit($id);
    }

    public function update(Request $request, string $id){
        return $this->exam->update($request, $id);
    }

    public function destroy(string $id){
        return $this->exam->destroy($id);
    }
}