<div>
    <div class="card card-statistics mb-30">
        <div class="card-body">
            <div class="card-title">{{$questions[$counter]->text}}</div>
            @foreach ($questions[$counter]->answers as $answer)
                <div class="custom-control custom-radio mb-2">
                    <input type="radio" name="answer" class="custom-control-input" id="answer-{{$answer->id}}">
                    <label for="answer-{{$answer->id}}" class="custom-control-label" wire:click="nexQuestion({{$answer->id}})">{{$answer->text}}</label>
                </div>
                
            @endforeach
        </div>
    </div>
</div>