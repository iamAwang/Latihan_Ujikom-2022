@extends('layouts.app')
{{-- @if(Auth::user()->id == 1) --}}
{{-- @section('penonton') --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <button type="button" class="btn btn-primary" style="float:right"><a href="{{route('indexBooking')}}" style="color:white; text-decoration:none">Booking</a></button>
                    @if(Auth::user()->id == '1')
                    <button type="button" class="btn btn-danger" style="float:right"><a href="{{route('indexFilm')}}" style="color:white; text-decoration:none">Film</a></button>
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @endsection --}}
{{-- @endif --}}
