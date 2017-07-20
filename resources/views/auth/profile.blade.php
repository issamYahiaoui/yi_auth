@extends('layouts.app')


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
            <div class="col-md-8 col-xs-12 text-center">
                <div class="card">
                    <div class="card-header text-left" data-background-color="blue">
                        <h4 class="title">Editer le profil</h4>
                        <p class="category">complète votre profil</p>
                    </div>
                    <div class="card-content ">
                        {!! Form::open(["url"=>"user/".auth()->user()->id,'method'=>'PATCH']) !!}
                        {!! csrf_field() !!}


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nom</label>
                                    <input required="true" name="first_name" type="text"
                                           value="{{auth()->user()->first_name}}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Prenom</label>
                                    <input required="true" name="last_name" type="text"
                                           class="form-control" value="{{auth()->user()->last_name}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">e-mail</label>
                                    <input required="true" name="email" type="email"
                                           class="form-control" value="{{auth()->user()->email}}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label>date de naissance</label>
                                    <input name="birthday" class="datepicker form-control" type="text"
                                           value="{{auth()->user()->birthday}}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label>choisir l'etablissement</label>
                                    <select name="department" class="selectpicker form-control "
                                    >
                                        <option value=""></option>
                                        @if(count($departments)>0)
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}" @if(auth()->user()->id_department==$department->id) {{'selected'}} @endif>{{$department->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-group label-floating">
                                            <label class="control-label"> Addresse</label>
                                            <textarea name="address" class="form-control"
                                                      rows="4">{{auth()->user()->address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-info text-center">enregistrer</button>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 text-center">
                <div class="card">
                    <div class="card-header text-left" data-background-color="blue">
                        <h4 class="title">Editer le profil</h4>
                        <p class="category">changer votre photo</p>
                    </div>
                    <div class="card-content ">
                        {!! Form::open(["url"=>"/change_avatar",'files'=>'true','method'=>'POST']) !!}
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="picture-container">
                                    <div class="picture">
                                        <img id="blah" src="{{asset('avatar/default-avatar.png')}}"
                                             class="picture-src" title=""/>
                                        <input name="img" type="file" id="imgInp">
                                    </div>
                                    <h6>choisir une photo</h6>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info text-center">enregistrer</button>

                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Editer le profil</h4>
                        <p class="category">changer votre mot de passe</p>
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

                        {!! Form::open(["url"=>"password"]) !!}
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">l'ancien mot de passe</label>
                                    <input required="true" name="password" type="password"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">le nouveau mot de passe</label>
                                    <input required="true" name="new_password" type="password"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">confirmation du nouveau mot de passe</label>
                                    <input required="true" name="new_password_confirmation" type="password"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info text-center">enregistrer</button>

                    {!! Form::close() !!}
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


