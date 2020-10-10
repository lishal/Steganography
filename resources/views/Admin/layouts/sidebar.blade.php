<div class="sidebar">
    <a href="{{url('/userlist')}}" class="@if(Request::is('userlist')) {{ 'active' }} @endif">Users</a>
    
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
      <input type="hidden" name="redirect" id="redirect">
  </form>
    <a id="logoutBtn" href="{{url('/logout')}}" method="POST">Logout</a>
    
 
  </div>
  