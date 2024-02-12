<?php
namespace App\Interface;

interface ExamRepositoryInterface {

 public function index();

 public function show($id);
 
 public function create();
 
 public function store($request);

 public function edit($id);

 public function update($request, $id);

 public function destroy($id);
}