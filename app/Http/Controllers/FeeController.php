<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeeRequest;
use App\Interface\FeeRepositoryInterface;
use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller{
    public $fee;

    public function __construct(FeeRepositoryInterface $fee){
        $this->fee = $fee;
    }


    public function index(){
        return $this->fee->index();
    }

    public function create(){
        return $this->fee->create();
    }

    public function store(StoreFeeRequest $request){
        return $this->fee->store($request);
    }

    public function show(string $id){
        return $this->fee->show($id);
    }

    public function edit(string $id){
        //
    }

    public function update(StoreFeeRequest $request, Fee $fee){
        return $this->fee->update($request, $fee);
    }

    public function destroy(string $id){
        return $this->fee->destroy($id);
    }
}