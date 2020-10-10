<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        {{-- Bootstrap Css --}}
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        {{-- Custom CSS --}}
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    
    </head>
    <body>
        {{-- Including Sidebar --}}
        @include('Admin.layouts.sidebar')
        
        <div class="content">
            <section class="content">
                @yield('content')
            </section>
        </div>
        
    </body>
    {{-- Bootstrap Script --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    {{-- For confirm Delete --}}
    <script>
        function confirmDelete()
            {
                if(confirm('Are you sure to delete this item?') == true) {
                    return true;
                }
                else {
                    return false;
                }
            }
    </script>
    {{-- For Logout --}}
     <script type="text/javascript">
        $('#logoutBtn').on('click', function(e){
          e.preventDefault();
          $('#logout-form').submit();
        });
      
      </script>
    
</html>