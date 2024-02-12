<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGardianRequest;
use App\Http\Requests\UpdateGardianRequest;
use App\Interface\GardianRepositoryInterface;
use App\Models\Gardian;
use Illuminate\Http\Request;

class GardianController extends Controller{

    public $gardian;

    public function __construct(GardianRepositoryInterface $gardian){
        $this->gardian = $gardian;
    }


    public function index(){
        return $this->gardian->index();
    }

    public function create(){
        return $this->gardian->create();
    }

    public function store(StoreGardianRequest $request){
        return $this->gardian->store($request);
    }

    public function show(string $id){
        return $this->gardian->show($id);
    }

    public function edit(string $id){
        //
    }

    public function update(UpdateGardianRequest $request, Gardian $gardian){
        return $this->gardian->update($request, $gardian);
    }

    public function destroy(string $id){
        return $this->gardian->destroy($id);
    }
}