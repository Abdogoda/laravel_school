<?php
namespace App\Interface;

interface GardianRepositoryInterface {

 public function index();

 public function show($id);

 public function create();

 public function store($request);

 public function update($request, $gardian);

 public function destroy($id);
}