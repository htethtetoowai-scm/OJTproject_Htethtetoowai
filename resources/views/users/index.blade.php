@extends('Layouts.layout')
 
@section('content')
<div class="container"> 
    <h3 style="margin-top:20px;margin-bottom:20px;text-align:center;color:#1589FF">User List</h3>
    <form action="{{ route('searchUser')}}" method="GET">
        <div class="row">
            <div class="col-2">
                <div>
                    <input class="form-control" type="text" placeholder="Name.." name="searchName" id="searchName">
                </div>
            </div>
            <div class="col-2">
                <div>
                    <input class="form-control" type="text" placeholder="Email.." name="searchEmail" id="searchEmail">
                </div>
            </div>
            <div class="col-2">
                <div>
                    <input  class="form-control" type="date" placeholder="Created to.." name="searchCreated_at" id="searchCreated_at">
                </div>
            </div>
            <div class="col-2">
                <div>
                    <input  class="form-control" type="date" placeholder="Created From.." name="searchCreated_from" id="searchCreated_from">
                </div>
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
    </form>
            <div class="col-1">
            <a class="btn btn-primary" href="{{ route('users.index') }}">Refresh</a>
            </div>
            <div class="col-1">
                <div>
                    <a class="btn btn-primary" href="{{ route('users.create') }}">Add New User</a>
                </div>
            </div>
        </div>
</div>
</br>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Created Use</th>
        <th>Birth Date</th>
        <th>Address</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        <th>Action</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->name}}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone}}</td>
        <td><?php echo app\Http\Controllers\User\UserController::getCreateUser($user->create_user_id);?></td>
        <td>{{$user->dob}}</td>
        <td>{{ $user->address }}</td>
        <td>{{ $user->created_at}}</td>
        <td>{{$user->updated_at}}</td>
        <td>
            <button type="button" id="delUser" class="btn btn-danger" data-id="{{$user->id}}"data-name="{{$user->name}}"data-email="{{$user->email}}"data-type="{{$user->type}}"
            data-phone="{{$user->phone}}"data-create_user="<?php echo app\Http\Controllers\User\UserController::getCreateUser($user->create_user_id);?>"data-address="{{$user->address}}"
            data-dob="{{$user->dob}}"data-toggle="modal" 
            data-target="#delModal"data-attr="$post->id">
            Delete  
            </button>
        </td>
    </tr>
    @endforeach
</table>
{!! $users->links() !!}
 <!-- Del Modal -->
<div class="modal" id="delModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" action="{{ route('del')}}">
            @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <input id="id" type="hidden" class="form-control" name="id" value="" readonly>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                        <div class="col-md-6">
                            <input id="type" type="text" class="form-control" name="type"value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address"value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                        <div class="col-md-6">
                            <input id="phone" type="text"  class="form-control" name="phone" value="" readonly >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>
                        <div class="col-md-6">
                            <input id="dob" type="text"  class="form-control" name="dob" value="" readonly >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="create_user" class="col-md-4 col-form-label text-md-right">{{ __('Create User') }}</label>
                        <div class="col-md-6">
                            <input id="create_user" type="text"  class="form-control" name="create_user" value="" readonly >
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary"> {{ __('Delete') }}    </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection