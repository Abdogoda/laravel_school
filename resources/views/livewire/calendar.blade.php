<div>
    <div id='calendar-container bg-white' wire:ignore>
        <div id='calendar'></div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>

    <script>
        document.addEventListener('livewire:load', function() {
            var Calendar = FullCalendar.Calendar;
                var Draggable = FullCalendar.Draggable;
                var calendarEl = document.getElementById('calendar');
                var checkbox = document.getElementById('drop-remove');
                var data =   @this.events;
                var calendar = new Calendar(calendarEl, {
                    events: JSON.parse(data),
                    dateClick(info)  {
                        @this.clicked("Calendar")
                        var title = prompt('ادخل عنوان الحدث ');
                        var date = new Date(info.dateStr + 'T00:00:00');
                        if(title != null && title != ''){
                            calendar.addEvent({
                                title: title,
                                start: date,
                                allDay: true
                            });
                            var eventAdd = {title: title,start: date};
                            @this.addevent(eventAdd);
                        }else{
                            alert('من فضلك ادخل عنوان الحدث');
                        }
                    },
                    editable: true,
                    selectable: true,
                    displayEventTime: false,
                    droppable: true,
                    drop: function(info) {
                        if (checkbox.checked) {
                            info.draggedEl.parentNode.removeChild(info.draggedEl);
                        }
                    },
                    eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
                    loading: function(isLoading) {
                        if (!isLoading) {
                            this.getEvents().forEach(function(e){
                                if (e.source === null) {
                                    e.remove();
                                }
                            });
                        }
                    }
                });
                calendar.render();
                @this.on(`refreshCalendar`, () => {
                calendar.refetchEvents()
            });
        })
    </script>

@endpush