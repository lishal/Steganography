@extends('user.layout.main')
@section('incoming_msg')
<a href="{{url('/inbox')}}"><button class="btn btn-primary">BACK</button></a>
<div class="container">
    
    <div class="row">
       
        {{-- @foreach ($receivedMessages as $receivedMessage) --}}
        <div class="card mb-4" style="max-width: 540px; margin-right:30px;" >
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="/uploads/encrypted_image/{{ $receivedMessages->image }}"class="card-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">From</h5>
                  <p class="card-text">{{$receivedMessages->name}}</p>
                  @if($receivedMessages->credentials==NULL)
                  <p class="card-text">Message: {{$receivedMessages->message}}</p>
    
                  
                  @else
                <form action="{{url('/credentials')}}/{{$receivedMessages->id}}" method="post" enctype="multipart/form-data">
                    @if(count($errors)>0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"  id="error">
                                {{$error}}
                                <script>
                                    setTimeout(function() {
                                        $('#error').fadeOut("slow","swing")
                                        
                                    }, 3000);
                                </script>
                            </div>
                            
                        @endforeach
                    @endif
                    @csrf
                  <div class="form-group">
                    <label>Password Protected</label>
                    <input class="form-control @error('credentials') is-invalid @enderror" name="credentials" type="password" placeholder="Enter Password Here">
                  </div>
                  <div class="form-group bi-form-controls">
                    <div class="col-md-9 ">
                        <button type="submit" class="btn btn-success"  value="save" name="action">Submit </button>
                    </div>
                  </form>

                  @endif

                {{-- <p class="card-text"><a href="{{url('/decryptmessage')}}"><button class="btn btn-primary"> Decrypt Message</button></a></p> --}}
                </div>
              </div>
            </div>
          </div>
        {{-- @endforeach  --}}
    </div>   
</div>

  
@endsection
