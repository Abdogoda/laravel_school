<?php

namespace App\Http\Controllers;

use App\Interface\AttendanceRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller{
    public $attendance;

    public function __construct(AttendanceRepositoryInterface $attendance){
        $this->attendance = $attendance;
    }

    
    public function index(){
        return $this->attendance->index();
    }

    public function show(string $id){
        return $this->attendance->show($id);
    }

    public function create(){
        return $this->attendance->create();
    }

    public function store(Request $request){
        return $this->attendance->store($request);
    }

    
    public function edit(string $id){
        return $this->attendance->edit($id);
    }

    public function update(Request $request, string $id){
        return $this->attendance->update($request, $id);
    }

    public function destroy(string $id){
        return $this->attendance->destroy($id);
    }
}