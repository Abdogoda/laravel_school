<?php

namespace App\Http\Controllers;

use App\Interface\PromotionRepositoryInterface;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller{

    public $promotion;

    public function __construct(PromotionRepositoryInterface $promotion){
        $this->promotion = $promotion;
    }

    public function index(){
        return $this->promotion->index();
    }

    public function create(){
        return $this->promotion->create();
    }

    public function store(Request $request){
        return $this->promotion->store($request);
    }

    public function show(string $id){
        return $this->promotion->show($id);
    }

    public function edit(string $id){
        // 
    }

    public function update(Request $request, Promotion $promotion){
        return $this->promotion->update($request, $promotion);
    }

    public function destroy(string $id){
        return $this->promotion->destroy($id);
    }
}