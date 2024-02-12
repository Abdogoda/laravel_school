<?php
namespace App\Interface;

interface GraduatedRepositoryInterface {

 public function index();

 public function show($id);

 public function create();

 public function store($request);

 public function update($request, $graduated);

 public function destroy($id);
}