<?php
namespace App\Repository;

use App\Interface\BillOfExchangeRepositoryInterface;
use App\Models\BillOfExchange;
use App\Models\FundAccount;
use App\Models\Student;
use App\Models\StudentAccount;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BillOfExchangeRepository implements BillOfExchangeRepositoryInterface{

 public function index(){
  $bills_of_exchange = BillOfExchange::all();
  $students = Student::all();
  return view('pages.fees.bills_of_exchange.index', compact('bills_of_exchange', 'students'));
 }
 public function show($id){
  $bill_of_exchange = BillOfExchange::find($id);
  if($bill_of_exchange){
   return $bill_of_exchange;
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function create($id){
   if($id){
      $student_info = Student::find($id);
      if($student_info){
         return view('pages.fees.bills_of_exchange.add', compact('student_info'));
      }else{
         toastr()->warning(trans('trans.no_data_available'));
         return redirect()->back();
      }
   }else{
      $students = Student::all();
      return view('pages.fees.bills_of_exchange.add', compact('students'));
   }
}

 public function store($request){
   $validated = Validator::make($request->all(),[
      'student_id'=>'required'
   ]);
   DB::beginTransaction();
   try {
      $student = Student::find($request->student_id);
      if($student){
         $bill_of_exchange = new BillOfExchange();
         $bill_of_exchange->student_id =  $student->id;
         $bill_of_exchange->amount = $request->cost;
         $bill_of_exchange->description = $request->notes;
         $bill_of_exchange->save();
         
         $fund_account = new FundAccount();
         $fund_account->bill_of_exchange_id =  $bill_of_exchange->id;
         $fund_account->credit =  $request->cost;
         $bill_of_exchange->description = $request->notes;
         $fund_account->save();
         
         $student_account = new StudentAccount();
         $student_account->student_id =  $student->id;
         $student_account->bill_of_exchange_id =  $bill_of_exchange->id;
         $student_account->credit =  $request->cost;
         $bill_of_exchange->description = $request->notes;
         $student_account->save();
         toastr()->success(trans('trans.data_saved_successfully'));
         DB::commit();
         return redirect()->back();
      }else{
         toastr()->warning(trans('trans.no_data_available'));
         return redirect()->back();
      }
   }catch (Exception $e) {
      DB::rollBack();
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
 }


 public function update($request, $id){
   $validated = Validator::make($request->all(),[
      'student_id'=>'required'
   ]);
   DB::beginTransaction();
   try {
      $bill_of_exchange = BillOfExchange::find($id);
      if($bill_of_exchange){
         $bill_of_exchange->student_id =  $request->student_id;
         $bill_of_exchange->amount = $request->cost;
         $bill_of_exchange->description = $request->notes;
         $bill_of_exchange->save();
         
         $fund_account = FundAccount::where('bill_of_exchange_id',$id)->first();
         if($fund_account){
            $fund_account->credit =  $request->cost;
            $fund_account->description = $request->notes;
            $fund_account->update();
         }
         
         $student_account = StudentAccount::where('bill_of_exchange_id',$id)->first();
         if($student_account){
            $student_account->student_id =  $request->student_id;
            $student_account->credit =  $request->cost;
            $student_account->description = $request->notes;
            $student_account->update();
         }
         
         toastr()->success(trans('trans.data_updated_successfully'));
         DB::commit();
         return redirect()->back();
      }else{
         toastr()->warning(trans('trans.no_data_available'));
         return redirect()->back();
      }
   }catch (Exception $e) {
      DB::rollBack();
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
 }

 public function destroy($id){
   try {
      $bill_of_exchange = BillOfExchange::find($id);
      if($bill_of_exchange){
         $bill_of_exchange->delete();
         toastr()->success(trans('trans.data_updated_successfully'));
         return redirect()->back();
      }else{
         toastr()->error(trans('trans.no_data_available'));
         return redirect()->back();
      }
   }catch (Exception $e) {
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
 }
}