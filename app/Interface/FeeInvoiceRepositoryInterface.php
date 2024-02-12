<?php
namespace App\Interface;

interface FeeInvoiceRepositoryInterface {

 public function index();

 public function show($id);

 public function create($id);

 public function store($request);

 public function update($request, $fee_invoice);

 public function destroy($id);
}