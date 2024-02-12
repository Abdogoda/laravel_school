<?php

namespace App\Http\Controllers;

use App\Interface\GraduatedRepositoryInterface;
use App\Models\Student;
use Illuminate\Http\Request;

class GraduatedController extends Controller{

    public $graduated;

    public function __construct(GraduatedRepositoryInterface $graduated){
        $this->graduated = $graduated;
    }

    public function index(){
        return $this->graduated->index();
    }

    public function create(){
        return $this->graduated->create();
    }

    public function store(Request $request){
        return $this->graduated->store($request);
    }

    public function show(string $id){
        return $this->graduated->show($id);
    }

    public function edit(string $id){
        // 
    }

    public function update(Request $request, Student $graduated){
        return $this->graduated->update($request, $graduated);
    }

    public function destroy(string $id){
        return $this->graduated->destroy($id);
    }
}