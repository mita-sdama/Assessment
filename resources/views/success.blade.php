@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ __('Data') }}</div>

                <div class="card-body" style="padding:100px;text-align:center;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h2> Terima Kasih telah Mengisi Form <br> ^_^ </h2>
                        <a href="{{route('home')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
