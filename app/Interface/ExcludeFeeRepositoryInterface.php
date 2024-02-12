<?php
namespace App\Interface;

interface ExcludeFeeRepositoryInterface {

 public function index();

 public function show($id);

 public function create($id);

 public function store($request);

 public function update($request, $id);

 public function destroy($id);
}