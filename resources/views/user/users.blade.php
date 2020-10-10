   <div class="headind_srch">
      <div class="recent_heading">
        <h4>All Users</h4>
      </div>
      <div class="srch_bar">
        <div class="stylish-input-group">
          <a href="{{url('/inbox')}}"><button class="btn btn-primary">Inbox</button></a>
        </div>
      </div>
    </div>
    
        <div class="inbox_chat">
          @foreach ($users as $user)
          @if($user->id!=$current_user->id) 
            <a href="{{ url('/individualuser') }}/{{ $user->id }}">
                <div class="chat_people" style="margin:10px;">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" style="margin: 5px;"> </div>
                <div class="chat_ib">

                    <h2 style="color: black; margin:5px;">{{$user->name }}</h2>
                    <p>Tap to send message</p>
                </div>
                </div>
            </a>
          @endif
          @endforeach
        
        </div>        
   