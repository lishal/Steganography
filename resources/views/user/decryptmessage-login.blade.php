@extends('user.layout.main')
@section('incoming_msg')
<a href="{{url('/inbox')}}"><button class="btn btn-primary">BACK</button></a>

<div class="container">
    
    <div class="row">

        <div class="card mb-4" style="max-width: 540px; margin-right:30px;" >
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="/uploads/encrypted_image/{{ $receivedMessages->image }}"class="card-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">From</h5>
                  <p class="card-text">{{$receivedMessages->name}}</p>
                  <p class="card-text">Message: {{$receivedMessages->message}}</p>
            
                </div>
              </div>
            </div>
        </div>
    </div>   
</div>

  
@endsection
