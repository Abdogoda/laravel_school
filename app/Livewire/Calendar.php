<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class Calendar extends Component
{
    public $events = '';
        public $ddd = 'fadsdasf';
    
        public function getevent(){       
            $events = Event::select('id','title','start')->get();
            return  json_encode($events);
        }
    
        public function addevent($event){
            $title = $event['title'];
            $start = $event['start'];
            
            $ev = new Event();
            $ev->title = $title;
            $ev->start = $start;
            $ev->save();
            toastr()->success('Event added successfully');
        }
    
        public function clicked($d){
            dd($d);
        }
    
        public function eventDrop($event, $oldEvent){
            $eventdata = Event::find($event['id']);
            $eventdata->start = $event['start'];
            $eventdata->save();
        }
    
        public function render(){       
            $events = Event::select('id','title','start')->get();
            $this->events = json_encode($events);
            return view('livewire.calendar');
        }
    }