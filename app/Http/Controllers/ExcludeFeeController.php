<?php

namespace App\Http\Controllers;

use App\Interface\ExcludeFeeRepositoryInterface;
use Illuminate\Http\Request;

class ExcludeFeeController extends Controller{

    public $exclude_fee;

    public function __construct(ExcludeFeeRepositoryInterface $exclude_fee){
        $this->exclude_fee = $exclude_fee;
    }


    public function index(){
        return $this->exclude_fee->index();
    }

    public function create(){
        return $this->exclude_fee->create(null);
    }

    public function add_exclude_fee($id){
        return $this->exclude_fee->create($id);
    }

    public function store(Request $request){
        return $this->exclude_fee->store($request);
    }

    public function show(string $id){
        return $this->exclude_fee->show($id);
    }

    public function edit(string $id){
        //
    }

    public function update(Request $request, string $id){
        return $this->exclude_fee->update($request, $id);
    }

    public function destroy(string $id){
        return $this->exclude_fee->destroy($id);
    }
}