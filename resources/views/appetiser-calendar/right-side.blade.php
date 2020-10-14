<div class="row mb-3">
    <div class="col-4">
        <a class="btn btn-success rounded-0 btn-last-month" href="?date={{date('Y-m-d',strtotime($data['date'].'-1 month'))}}">Previous</a>
    </div>
    <div class="col-4 p-2 text-center">
        <label class="appetiser-month">{{$data['monthYear']}}</label>
    </div>
    <div class="col-4 text-right">
        <a class="btn btn-success rounded-0 btn-next-month" href="?date={{date('Y-m-d',strtotime($data['date'].'+1 month'))}}">Next</a>
    </div>
    <hr>
</div>

<div class="row mb-1" style="overflow-y: scroll; height: 70vh">
    @for ($day = 1; $day <= $data['daysHave']; $day++)
        @php
            $repDay = strtolower(date('D', strtotime($data['year'].'-'.$data['month'].'-'.$day)));
        @endphp
        <div class="col-1">
            <div class="row">
                <h6>
                    <div class="col-12">
                        <b>{{$day}}</b>
                    </div>
                    <div class="col-12 mt-2">
                       {{ucfirst($repDay)}}
                    </div>
                </h6>
            </div>
        </div>
        <div class="col-11">
            <div class="row">
                @foreach ($data['event'] as $keyEvent => $valueEvent)
                        @php
                            $dayValue = $day < 10 ? '0'.$day : $day
                        @endphp
                        @if ((date('d', strtotime($valueEvent['event_date_from'])) <= $day) 
                                && 
                            ($day <= date('d', strtotime($valueEvent['event_date_to']))))
                            
                            @if ($valueEvent['representationDay']->$repDay == 'yes')
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body bg-primary p-1">
                                            <span class="p-2 rounded text-light">{{$valueEvent['event_name']}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                @endforeach
            </div>
        </div>
        <div class="col-12">
            <hr class="mt-1">
        </div>
    @endfor
</div>