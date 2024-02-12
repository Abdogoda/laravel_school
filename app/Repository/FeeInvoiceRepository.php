<?php
namespace App\Repository;

use App\Interface\FeeInvoiceRepositoryInterface;
use App\Models\Fee;
use App\Models\feeInvoice;
use App\Models\Stage;
use App\Models\Student;
use App\Models\StudentAccount;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FeeInvoiceRepository implements FeeInvoiceRepositoryInterface{

 public function index(){
  $fee_invoices = FeeInvoice::all();
  $students = Student::all();
  $fees = Fee::all();
  return view('pages.fees.fee_invoices.index', compact('fee_invoices', 'students', 'fees'));
 }
 public function show($id){
  $feeInvoice = FeeInvoice::find($id);
  if($feeInvoice){
   return $feeInvoice;
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function create($id){
   if($id){
      $student_info = Student::find($id);
      if($student_info){
         $fees = Fee::all();
         return view('pages.fees.fee_invoices.add', compact('student_info', 'fees'));
      }else{
         toastr()->warning(trans('trans.no_data_available'));
         return redirect()->back();
      }
   }else{
      $students = Student::all();
      $fees = Fee::all();
      return view('pages.fees.fee_invoices.add', compact('students', 'fees'));
   }
}

 public function store($request){
   DB::beginTransaction();
   try {
      foreach ($request->list_fee_invoices as $fee_request) {
         $fee = Fee::find($fee_request['fee_id']);
         $student = Student::find($fee_request['student_id']);
         if($student && $fee){
            $fee_invoice = new FeeInvoice();
            $fee_invoice->student_id =  $student->id;
            $fee_invoice->stage_id =  $student->stage_id;
            $fee_invoice->class_id =  $student->class_id;
            $fee_invoice->fee_id =  $fee->id;
            $fee_invoice->fee_amount = $fee->cost;
            $fee_invoice->notes = $fee_request['notes'];
            $fee_invoice->save();
            
            $student_account = new StudentAccount();
            $student_account->student_id =  $student->id;
            $student_account->fee_invoice_id =  $fee_invoice->id;
            $student_account->debit =  $fee->cost;
            $student_account->save();
            
            toastr()->success(trans('trans.data_saved_successfully'));
         }else{
            toastr()->warning(trans('trans.no_data_available'));
            return redirect()->back();
         }
      }
      DB::commit();
      return redirect()->back();
   }catch (Exception $e) {
      DB::rollBack();
      return redirect()->back()->with(['error' => $e->getMessage()]);
   }
 }


 public function update($request, $fee_invoice){
   $validated = Validator::make($request->all(),[
      'student_id'=>'required'
   ]);
   DB::beginTransaction();
   try {
      $fee = Fee::find($request->fee_id);
      $student = Student::find($request->student_id);
      if($student && $fee){
         $fee_invoice->student_id =  $student->id;
         $fee_invoice->stage_id =  $student->stage_id;
         $fee_invoice->class_id =  $student->class_id;
         $fee_invoice->fee_id =  $fee->id;
         $fee_invoice->fee_amount = $fee->cost;
         $fee_invoice->notes = $request->notes;
         $fee_invoice->update();
         
         $student_account = StudentAccount::where('fee_invoice_id', $fee_invoice->id)->first();
         if($student_account){
            $student_account->student_id =  $student->id;
            $student_account->debit =  $fee_invoice->fee_amount;
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
      $feeInvoice = FeeInvoice::find($id);
      if($feeInvoice){
         $feeInvoice->delete();
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