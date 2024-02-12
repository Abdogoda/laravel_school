<?php
namespace App\Interface;

interface StudentRepositoryInterface {

 public function index();

 public function show($id);

 public function edit($id);

 public function create();

 public function store($request);

 public function update($request, $student);

 public function destroy($id);
}