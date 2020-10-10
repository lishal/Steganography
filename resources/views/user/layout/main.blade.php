<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">

</head>
<body>
<div>
@include('user.layout.navbar')
<div class="messaging">
      <div class="inbox_people">
        @include('user.users')
        </div>
        
        <div class="mesgs">
          <div class="msg_history">
            <div class="incoming_msg">
              @include('validation.messages')
              @yield('incoming_msg')
            </div>
        </div>
      </div> 
      </div>
    </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    {{-- For Logout --}}
    <script type="text/javascript">
        $('#logoutBtn').on('click', function(e){
          e.preventDefault();
          $('#logout-form').submit();
        });
      
      </script>
      
    </html>