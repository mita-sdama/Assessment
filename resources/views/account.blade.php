@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ __('Account') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('add_account') }}" class="btn btn-primary">  {{ __('+Add') }}</a>
                    <p></p>
                    <table class="table table-bordered">
                        <tr>
                            <th> No </th>
                            <th> Nama </th>
                            <th> Email </th>
                            <th> Action </th>
                        </tr>
                        <?php $no=0; ?>
                        @foreach ($users as $u)
                        <?php $no++ ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>
                            <a href="/account/edit/{{$u->id}}" class="btn btn-warning">  {{ __('Edit') }} </a>
                            <a href="/account/delete/{{$u->id}}" class="btn btn-danger">  {{ __('Delete') }}</a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
