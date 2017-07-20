@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            @if(count($errors->all())>0)
                <div class="alert alert-danger text-center">
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

            <div class="col-md-7 col-xs-12 text-center">
                <div class="card">
                    <div class="card-header text-left" data-background-color="blue">
                        <h4 class="title">Edit profil</h4>
                        <p class="category">Complete your profil</p>
                    </div>
                    <div class="card-content ">
                        @if(Session::has('changesSaved'))
                            <div id="alert" class="alert alert-success text-center text-info">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                </button>
                                {{Session::get('changesSaved')}}
                            </div>
                        @endif
                        {!! Form::open(["url"=>"admin/users/".auth()->user()->id."/edit",'method'=>'PATCH']) !!}
                        {!! csrf_field() !!}

                        <div class="row">
                            <br> <br>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">First name</label>
                                    <input required="true" name="first_name" type="text"
                                           value="{{auth()->user()->first_name}}"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Name</label>
                                    <input required="true" name="name" type="text"
                                           class="form-control" value="{{auth()->user()->name}}">
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="row">
                            <br> <br>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Username</label>
                                    <input required="true" name="username" type="text"
                                           class="form-control" value="{{auth()->user()->username}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">e-mail</label>
                                    <input required="true" name="email" type="email"
                                           class="form-control" value="{{auth()->user()->email}}">
                                </div>
                            </div>

                        </div>


                        <button type="submit" class="btn btn-info  text-center">Save</button>
                        {!! Form::close() !!}

                    </div>
                </div>
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Edit your profil</h4>
                        <p class="category">Change your password</p>
                    </div>
                    <div class="card-content text-left">
                        @if(Session::has('successPassword'))
                            <div id="alert" class="alert alert-success text-center text-info">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                </button>
                                {{Session::get('successPassword')}}
                            </div>
                        @endif
                        @if(Session::has('failedPassword'))
                            <div id="alert" class="alert alert-danger text-center text-info">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                </button>
                                {{Session::get('failedPassword')}}
                            </div>
                        @endif

                        {!! Form::open(["url"=>"admin/users/password"]) !!}
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Old password</label>
                                    <input required="true" name="password" type="password"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">New password</label>
                                    <input required="true" name="new_password" type="password"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Confirm your password</label>
                                    <input required="true" name="new_password_confirmation" type="password"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info text-center">Save</button>

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-4 col-xs-12 text-center">
                <div class="card">
                    <div class="card-header text-left" data-background-color="blue">
                        <h4 class="title">Edit your profil</h4>
                        <p class="category">change your profil picture </p>
                    </div>
                    <div class="card-content ">
                        {!! Form::open(["url"=>"admin/users/change_avatar",'files'=>'true','method'=>'POST']) !!}
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="picture-container">
                                    <div class="picture">
                                        <img id="blah" src="{{asset('avatar'.auth()->user()->avatar)}}"
                                             class="picture-src" title=""/>
                                        <input name="img" type="file" id="imgInp">
                                    </div>
                                    <h6>Choose a picture</h6>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-round text-center">Save</button>

                        {!! Form::close() !!}
                    </div>
                </div>



            </div>
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
    <link href="{{asset('css/bootstrap-datepicker.css')}}" rel="stylesheet"/>
@endsection


