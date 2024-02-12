<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Interface\TeacherRepositoryInterface;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller{
    
    public $teacher;

    public function __construct(TeacherRepositoryInterface $teacher){
        $this->teacher = $teacher;
    }

    public function index(){
        return $this->teacher->index();
    }

    public function create(){
        return $this->teacher->create();
    }

    public function store(StoreTeacherRequest $request){
        return $this->teacher->store($request);
    }

    public function show(string $id){
        return $this->teacher->show($id);
    }

    public function edit(string $id){
        //
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher){
        return $this->teacher->update($request, $teacher);
    }

    public function destroy(string $id){
        return $this->teacher->destroy($id);
    }
}