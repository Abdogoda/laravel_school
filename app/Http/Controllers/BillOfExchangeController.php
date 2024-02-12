<?php

namespace App\Http\Controllers;

use App\Interface\BillOfExchangeRepositoryInterface;
use App\Models\BillOfExchange;
use Illuminate\Http\Request;

class BillOfExchangeController extends Controller{

       public $bill_of_exchange;

    public function __construct(BillOfExchangeRepositoryInterface $bill_of_exchange){
        $this->bill_of_exchange = $bill_of_exchange;
    }


    public function index(){
        return $this->bill_of_exchange->index();
    }

    public function create(){
        return $this->bill_of_exchange->create(null);
    }

    public function add_bill_of_exchange($id){
        return $this->bill_of_exchange->create($id);
    }

    public function store(Request $request){
        return $this->bill_of_exchange->store($request);
    }

    public function show(string $id){
        return $this->bill_of_exchange->show($id);
    }

    public function edit(string $id){
        //
    }

    public function update(Request $request, string $id){
        return $this->bill_of_exchange->update($request, $id);
    }

    public function destroy(string $id){
        return $this->bill_of_exchange->destroy($id);
    }
}