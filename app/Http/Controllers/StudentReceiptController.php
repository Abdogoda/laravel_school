<?php

namespace App\Http\Controllers;

use App\Interface\StudentReceiptRepositoryInterface;
use App\Models\StudentReceipt;
use Illuminate\Http\Request;

class StudentReceiptController extends Controller
{
    public $receipt;

    public function __construct(StudentReceiptRepositoryInterface $receipt){
        $this->receipt = $receipt;
    }


    public function index(){
        return $this->receipt->index();
    }

    public function create(){
        return $this->receipt->create(null);
    }

    public function add_student_receipt($id){
        return $this->receipt->create($id);
    }

    public function store(Request $request){
        return $this->receipt->store($request);
    }

    public function show(string $id){
        return $this->receipt->show($id);
    }

    public function edit(string $id){
        //
    }

    public function update(Request $request, string $id){
        return $this->receipt->update($request, $id);
    }

    public function destroy(string $id){
        return $this->receipt->destroy($id);
    }
}