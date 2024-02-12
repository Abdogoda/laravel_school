<?php
namespace App\Repository;

use App\Interface\ExcludeFeeRepositoryInterface;
use App\Models\FundAccount;
use App\Models\ExcludeFee;
use App\Models\Student;
use App\Models\StudentAccount;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExcludeFeeRepository implements ExcludeFeeRepositoryInterface{

 public function index(){
  $exclude_fees = ExcludeFee::all();
  $students = Student::all();
  return view('pages.fees.exclude_fees.index', compact('exclude_fees', 'students'));
 }
 public function show($id){
  $exclude_fee = ExcludeFee::find($id);
  if($exclude_fee){
   return $exclude_fee;
  }else{
   toastr()->success(trans('trans.no_data_available'));
   return redirect()->back();
  }
 }

 public function create($id){
   if($id){
      $student_info = Student::find($id);
      if($student_info){
         return view('pages.fees.exclude_fees.add', compact('student_info'));
      }else{
         toastr()->warning(trans('trans.no_data_available'));
         return redirect()->back();
      }
   }else{
      $students = Student::all();
      return view('pages.fees.exclude_fees.add', compact('students'));
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
         $exclude_fee = new ExcludeFee();
         $exclude_fee->student_id =  $student->id;
         $exclude_fee->amount = $request->cost;
         $exclude_fee->description = $request->notes;
         $exclude_fee->save();
         
         $student_account = new StudentAccount();
         $student_account->student_id =  $student->id;
         $student_account->exclude_fee_id =  $exclude_fee->id;
         $student_account->credit =  $request->cost;
         $exclude_fee->description = $request->notes;
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
      $exclude_fee = ExcludeFee::find($id);
      if($exclude_fee){
         $exclude_fee->student_id =  $request->student_id;
         $exclude_fee->amount = $request->cost;
         $exclude_fee->description = $request->notes;
         $exclude_fee->update();
         
         $student_account = StudentAccount::where('exclude_fee_id',$exclude_fee->id)->first();
         if($student_account){
            $student_account->student_id =  $request->student_id;
            $student_account->exclude_fee_id =  $exclude_fee->id;
            $student_account->credit =  $request->cost;
            $exclude_fee->description = $request->notes;
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
      $exclude_fee = ExcludeFee::find($id);
      if($exclude_fee){
         $exclude_fee->delete();
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