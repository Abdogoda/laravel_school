<?php
namespace App\Interface;

interface PromotionRepositoryInterface {

 public function index();

 public function show($id);

 public function create();

 public function store($request);

 public function update($request, $promotion);

 public function destroy($id);
}