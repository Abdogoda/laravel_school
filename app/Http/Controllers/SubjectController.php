<?php

namespace App\Http\Controllers;

use App\Interface\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller{

    public $subject;

    public function __construct(SubjectRepositoryInterface $subject){
        $this->subject = $subject;
    }

    
    public function index(){
        return $this->subject->index();
    }

    public function show(string $id){
        return $this->subject->show($id);
    }

    public function create(){
        return $this->subject->create();
    }

    public function store(Request $request){
        return $this->subject->store($request);
    }

    
    public function edit(string $id){
        return $this->subject->edit($id);
    }

    public function update(Request $request, string $id){
        return $this->subject->update($request, $id);
    }

    public function destroy(string $id){
        return $this->subject->destroy($id);
    }
}