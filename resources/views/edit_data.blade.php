@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ __('Edit Data') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="../../data/update/{{$file}}" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$data[0]}}" required autocomplete="name" autofocus>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
    
                                <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$data[1]}}" required autocomplete="email">
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
    
                                <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" value="{{$data[2]}}" required autocomplete="date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telepon" class="col-md-4 col-form-label text-md-right">{{ __('No Telepon') }}</label>
    
                                <div class="col-md-6">
                                <input id="telepon" type="number" class="form-control" name="telepon" value="{{$data[3]}}" required autocomplete="telepon" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
    
                                <div class="col-md-6">
                                   <select class="form-control" name="gender" required autocomplete="gender">
                                       <option value="{{$data[4]}}" selected hidden>{{$data[4]}}</option>
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                   </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
    
                                <div class="col-md-6">
                                <img src="{{url('/foto')}}/{{$data[5]}}" width="100"> <br>
                                    <input type="hidden" name="photo" value="{{$data[5]}}">
                                    <input type="file" name="foto" class="form-control">  
                                </div>
                            </div>   
                        
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    <button type="reset" class="btn btn-warning">
                                        {{ __('Reset') }}
                                    </button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    