<?php
namespace App\Http\Traits;

use Carbon\Carbon;
use MacsiDigital\Zoom\Facades\Zoom;

trait ZoomTrait{
   public function createMeeting($request){
      $user = Zoom::user()->first();
      $meeting = Zoom::meeting()->make([
       'topic' => $request->topic,
       'type' => 8,
       'start_time' => $request->class_date,
       'duration' => $request->duration,
       'timezone' => 'Africa/Cairo'
      ]);
      
      $meeting->settings()->make([
         'join_before_host' => true,
         'host_video' => false,
         'participant_video' => false,
         'waiting_room' => true,
         'approval_type' => 1,
         'registration_type' => 2,
         'enforce_login' => false,
         'auto_recording' => false,
      ]);
      
      return $user->meetings()->save($meeting);
   }
}