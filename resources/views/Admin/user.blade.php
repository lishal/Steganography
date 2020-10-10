@extends('Admin.layouts.main')

@section('content')
@include('validation.messages')
    <h1>User List</h1>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
            </tr>
            </thead>
            <tbody>
                @if (count($users) > 0)
                  @foreach ($users as $user)
                    <tr class="info">
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @if($user->status=="1")
                            <td>Active</td>
                        @else
                            <td>Inactive</td>
                        @endif
                        <td>
                            <a href="{{ url('/deleteuser') }}/{{ $user->id }}" onclick="return confirmDelete()" class="ibtn btn-icon"> <i class="fas fa-trash" rel="tootltip" title="Delete" style="margin-left: 2vh;"></i> </a>
                        </td>
    
                    </tr>
                  @endforeach
                  @else
                    <tr>
                      <td>No Record Found!</td>
                    </tr>
                @endif
                
              </tbody>
        </table>
    </div>
@endsection