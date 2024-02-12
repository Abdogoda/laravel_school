<?php
namespace App\Interface;

interface TeacherRepositoryInterface {

 public function index();

 public function show($id);

 public function create();

 public function store($request);

 public function update($request, $id);

 public function destroy($id);
}