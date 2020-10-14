<div class="row">
    <form id="add-event">
        @csrf
        <div class="col-12">
            <div class="form-group">
                <label for="eventName">Event:</label>
                <input type="text" name="eventName" id="eventName" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="dateFrom">From:</label>
                        <input type="date" name="dateFrom" id="dateFrom" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="dateTo">To:</label>
                        <input type="date" name="dateTo" id="dateTo" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row text-center mt-3">
                <div class="col-12">
                    @foreach ($checkbox as $key => $value)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="{{$value}}" name="{{$value}}">
                            <label class="form-check-label" for="{{$value}}">{{$key}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" form="add-event" class="btn btn-primary btn-sm btn-block mt-4">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
