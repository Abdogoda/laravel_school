<?php
namespace App\Interface;

interface FeeRepositoryInterface {

 public function index();

 public function show($id);

 public function create();

 public function store($request);

 public function update($request, $fee);

 public function destroy($id);
}