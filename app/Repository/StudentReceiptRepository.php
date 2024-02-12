<?php
namespace App\Repository;

use App\Interface\StudentReceiptRepositoryInterface;
use App\Models\Fee;
use App\Models\FundAccount;
use App\Models\StudentReceipt;
use App\Models\Student;
use App\Models\StudentAccount;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentReceiptRepository implements StudentReceiptRepositoryInterface{

 public function index(){
  $receipts = StudentReceipt::all();
  $students = Student::all();
  return view('pages.fees.receipts.index', compact('receipts', 'students'));
 }
 public function show($id){
  $StudentReceipt = StudentReceipt::find($id);
  if($StudentReceipt){
   return $StudentReceipt;
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function create($id){
   if($id){
      $student_info = Student::find($id);
      if($student_info){
         return view('pages.fees.receipts.add', compact('student_info'));
      }else{
         toastr()->warning(trans('trans.no_data_available'));
         return redirect()->back();
      }
   }else{
      $students = Student::all();
      return view('pages.fees.receipts.add', compact('students'));
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
         $receipt = new StudentReceipt();
         $receipt->student_id =  $student->id;
         $receipt->debit = $request->cost;
         $receipt->description = $request->notes;
         $receipt->save();
         
         $fund_account = new FundAccount();
         $fund_account->receipt_id =  $receipt->id;
         $fund_account->debit =  $request->cost;
         $receipt->description = $request->notes;
         $fund_account->save();
         
         $student_account = new StudentAccount();
         $student_account->student_id =  $student->id;
         $student_account->receipt_id =  $receipt->id;
         $student_account->credit =  $request->cost;
         $receipt->description = $request->notes;
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
      $receipt = StudentReceipt::find($id);
      if($receipt){
         $receipt->student_id =  $request->student_id;
         $receipt->debit = $request->cost;
         $receipt->description = $request->notes;
         $receipt->update();
         
         $fund_account = FundAccount::where('receipt_id',$receipt->id)->first();
         if($fund_account){
            $fund_account->receipt_id =  $receipt->id;
            $fund_account->debit =  $request->cost;
            $receipt->description = $request->notes;
            $fund_account->update();
         }
         
         $student_account = StudentAccount::where('receipt_id',$receipt->id)->first();
         if($student_account){
            $student_account->student_id =  $request->student_id;
            $student_account->receipt_id =  $receipt->id;
            $student_account->credit =  $request->cost;
            $receipt->description = $request->notes;
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
      $StudentReceipt = StudentReceipt::find($id);
      if($StudentReceipt){
         $StudentReceipt->delete();
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