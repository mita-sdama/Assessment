@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ __('Add Data') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('create_data')}}" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"  required autocomplete="name" autofocus>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
    
                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control" name="date" required autocomplete="date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telepon" class="col-md-4 col-form-label text-md-right">{{ __('No Telepon') }}</label>
    
                                <div class="col-md-6">
                                    <input id="telepon" type="number" class="form-control" name="telepon"  required autocomplete="telepon" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
    
                                <div class="col-md-6">
                                   <select class="form-control" name="gender" required autocomplete="gender">
                                       <option value="" selected hidden>Select Gender</option>
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                   </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
    
                                <div class="col-md-6">
                                   <input type="file" name="foto" class="form-control">
                                </div>
                            </div>   
                        
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
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
    