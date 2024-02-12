<?php

namespace App\Http\Controllers;

use App\Interface\FeeInvoiceRepositoryInterface;
use App\Models\FeeInvoice;
use Illuminate\Http\Request;

class FeeInvoiceController extends Controller{

    public $fee_invoice;

    public function __construct(FeeInvoiceRepositoryInterface $fee_invoice){
        $this->fee_invoice = $fee_invoice;
    }


    public function index(){
        return $this->fee_invoice->index();
    }

    public function create(){
        return $this->fee_invoice->create(null);
    }

    public function add_student_fee_invoice($id){
        return $this->fee_invoice->create($id);
    }

    public function store(Request $request){
        return $this->fee_invoice->store($request);
    }

    public function show(string $id){
        return $this->fee_invoice->show($id);
    }

    public function edit(string $id){
        //
    }

    public function update(Request $request, FeeInvoice $fee_invoice){
        return $this->fee_invoice->update($request, $fee_invoice);
    }

    public function destroy(string $id){
        return $this->fee_invoice->destroy($id);
    }
}