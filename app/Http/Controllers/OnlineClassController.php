<?php

namespace App\Http\Controllers;

use App\Interface\OnlineClassRepositoryInterface;
use Illuminate\Http\Request;

class OnlineClassController extends Controller{
    
    public $online_class;

    public function __construct(OnlineClassRepositoryInterface $online_class){
        $this->online_class = $online_class;
    }

    
    public function index(){
        return $this->online_class->index();
    }

    public function show(string $id){
        return $this->online_class->show($id);
    }

    public function create(){
        return $this->online_class->create();
    }

    public function store(Request $request){
        return $this->online_class->store($request);
    }

    
    public function edit(string $id){
        return $this->online_class->edit($id);
    }

    public function update(Request $request, string $id){
        return $this->online_class->update($request, $id);
    }

    public function destroy(string $id){
        return $this->online_class->destroy($id);
    }
}