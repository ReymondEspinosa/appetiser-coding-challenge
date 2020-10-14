@extends('main')

@section('title', 'Calendar')

@push('style')
    <link rel="stylesheet" href="{{asset('css/calendar.css')}}">
@endpush

@section('content')
    <div class="row mt-5 m-2">
        <div class="col-3">
            @include('appetiser-calendar.left-side')
        </div>
        <div class="col-9">
            @include('appetiser-calendar.right-side')
        </div>
    </div>
@endsection

@push('script')
    <script src="{{asset('js/appetiser-calendar.js')}}"></script>
@endpush