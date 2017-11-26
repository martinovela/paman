@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table>
                        <thead>
                            <tr>
                                <th> id</th>
                                <th> name</th>
                                <th> email  </th>
                                <th> phone number</th>
                                <th> enable </th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($users as $user)
                              <tr>
                                  <td> {{$user->id}} </td>
                                  <td> {{$user->name}} </td>
                                  <td> {{$user->email}} </td>
                                  <td> {{$user->user_phone}} </td>
                                  <td> {{$user->user_enable}} </td>
                              </tr>
                             @endforeach
                       </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
