<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Interface\LibraryRepositoryInterface;
use Illuminate\Http\Request;

class LibraryController extends Controller{
    public $library;

    public function __construct(LibraryRepositoryInterface $library){
        $this->library = $library;
    }

    
    public function index(){
        return $this->library->index();
    }

    public function show(string $id){
        return $this->library->show($id);
    }

    public function create(){
        return $this->library->create();
    }

    public function store(StoreBookRequest $request){
        return $this->library->store($request);
    }

    
    public function edit(string $id){
        return $this->library->edit($id);
    }

    public function update(StoreBookRequest $request, string $id){
        return $this->library->update($request, $id);
    }

    public function destroy(string $id){
        return $this->library->destroy($id);
    }
}