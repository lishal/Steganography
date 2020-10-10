@extends('user.layout.main')
@section('incoming_msg')

<div class="container">
           
    <div class="row">
        @foreach ($receivedMessages as $receivedMessage)
        <div class="card mb-4" style="max-width: 540px; margin-right:30px;" >
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="/uploads/encrypted_image/{{ $receivedMessage->image }}"class="card-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">From</h5>
                  <p class="card-text">{{$receivedMessage->name}}</p>
                <p class="card-text"><a href="{{url('/decryptmessage')}}/{{$receivedMessage->id}}"><button class="btn btn-primary"> Decrypt Message</button></a></p>
                </div>
              </div>
            </div>
          </div>
        @endforeach 
    </div>   
</div>

  
@endsection
