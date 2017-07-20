@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
                <div class="col-md-11 col-xs-12">
                    <div class="panel panel-default">

                        <!-------Header of Panel---------->

                        <!-------Body of Panel---------->
                        <div class="panel-body text-center">
                            @if(count($errors->all())>0)
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                    </button>
                                    <ul class="list-unstyled">
                                        @foreach($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <button class="btn btn-info " type="button" data-toggle="modal"
                                    data-target="#addDepartment">
                                Add a new account
                            </button>
                            <!-- Sart Modal -->
                            <div class="modal fade" id="addDepartment" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="col-md-8 col-md-offset-2 col-xs-12">
                                    <div class="card">
                                        <div class="card-header" data-background-color="blue">
                                            <h4 class="title">Création of a new user</h4>
                                            <p class="category">Complete the form </p>
                                        </div>
                                        <div class="card-content text-left">
                                            {!! Form::open(["url"=>"/admin/users/store" , "method"=>"POST"]) !!}
                                            {!! csrf_field() !!}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Firstname</label>
                                                        <input value="{{old('first_name')}}" required="true"
                                                               name="first_name"
                                                               type="text"
                                                               class="form-control">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Name</label>
                                                        <input value="{{old('name')}}" required="true"
                                                               name="name"
                                                               type="text"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Username</label>
                                                        <input value="{{old('username')}}" required="true" name="username"
                                                               type="username"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">e-mail</label>
                                                        <input value="{{old('email')}}" required="true" name="email"
                                                               type="email"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Password</label>
                                                        <input value="{{old('password')}}" required="true"
                                                               name="password"
                                                               type="password"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Confirm password
                                                        </label>
                                                        <input value="{{old('password_confirmation')}}" required="true"
                                                               name="password_confirmation" type="password"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <button type="submit" class="btn btn-info ">Save</button>
                                        {!! Form::close() !!}

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!--  End Modal -->


                </div>

            @if(count($users)>0)

                <div class="col-md-11 ">
                    <div class="card">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title">Table of users</h4>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>Name</th>
                                <th>First name</th>
                                <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->email}}</td>

                                            <td>
                                                <button class="btn btn-success" data-toggle="modal"
                                                        data-target="#patch{{$user->id}}">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </button>

                                                <!-- Sart Modal -->
                                                <div class="modal fade" id="patch{{$user->id}}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="col-md-8 col-xs-12 col-md-offset-2 text-center">
                                                        <div class="card">
                                                            <div class="card-header text-left"
                                                                 data-background-color="green">
                                                                <h4 class="title">Edit your profil</h4>
                                                                <p class="category">Complete your  profil</p>
                                                            </div>
                                                            <div class="card-content ">
                                                                {!! Form::open(["url"=>"admin/users/".$user->id."/edit",'method'=>'PATCH']) !!}
                                                                {!! csrf_field() !!}


                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group label-floating">
                                                                            <label class="control-label">Firstname</label>
                                                                            <input required="true" name="first_name"
                                                                                   type="text"
                                                                                   value="{{$user->first_name}}"
                                                                                   class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group label-floating">
                                                                            <label class="control-label">Name</label>
                                                                            <input required="true" name="name"
                                                                                   type="text"
                                                                                   class="form-control"
                                                                                   value="{{$user->name}}">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group label-floating">
                                                                            <label class="control-label">Username</label>
                                                                            <input required="true" name="username"
                                                                                   type="username"
                                                                                   class="form-control"
                                                                                   value="{{$user->username}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group label-floating">
                                                                            <label class="control-label">e-mail</label>
                                                                            <input required="true" name="email"
                                                                                   type="email"
                                                                                   class="form-control"
                                                                                   value="{{$user->email}}">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <button type="button"
                                                                        class="btn btn-danger btn-simple pull-right"
                                                                        data-dismiss="modal">
                                                                    Close
                                                                </button>

                                                                <button type="submit"
                                                                        class="btn btn-success  pull-right">
                                                                   Save
                                                                </button>
                                                                {!! Form::close() !!}

                                                            </div>
                                                        </div>


                                                    </div>

                                                    <!--  End Modal -->
                                                </div>

                                            </td>
                                            <td>
                                                <button class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete{{$user->id}}"><i
                                                            class="glyphicon glyphicon-remove"></i>
                                                </button>
                                                <!-- Sart Modal -->
                                                <div class="modal fade" id="delete{{$user->id}}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-hidden="true">
                                                                    <i class="material-icons">clear</i>
                                                                </button>
                                                                <h4 class="modal-title"></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                {!! Form::open(["url"=>"admin/users/".$user->id."/delete","method"=>"DELETE"]) !!}
                                                                {!! csrf_field() !!}
                                                                Are you sure you want to delete this account ?

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger btn-simple">
                                                                    Yes
                                                                </button>
                                                                {!! Form::close() !!}
                                                                <button type="button" class="btn btn-default btn-simple"
                                                                        data-dismiss="modal">No
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  End Modal -->

                                            </td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            @else
                <div class="col-xs-12">
                    <div class="alert alert-danger text-center">
                        No available users
                    </div>
                </div>
            @endif
        </div>
        <div class="text-center">
            {{$users->render()}}
        </div>
    </div>
@endsection


@section('js')
    <script src="{{asset('js/demo.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript">
        $('.datepicker').datepicker({
            weekStart: 1,
            color: 'blue'
        });
    </script>
@endsection


@section('css')
    <link href="{{asset('css/demo.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/bootstrap-datepicker.css')}}" rel="stylesheet"/>

@endsection