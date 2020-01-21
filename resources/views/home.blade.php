@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ __('Data') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('data')}}" class="btn btn-primary">  {{ __('+Add') }} </a>
                    <p></p>
                    <table class="table table-bordered">
                        <tr>
                            <th> No </th>
                            <th> Nama </th>
                            <th> Email </th>
                            <th> Date of Birth </th>
                            <th> No Telepon </th>
                            <th> Gender </th>
                            <th> Foto </th>
                            <th> Action </th>
                        </tr>
                        <?php 
                            $file = File::allFiles(storage_path('app/detail/'));
                            $no=1;
                            foreach ($file as $key ) {
                            $file = File::get(storage_path('app/detail/'.basename($key)));
                            $array = explode(",", $file)
                        ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$array[0]}}</td>
                            <td>{{$array[1]}}</td>
                            <td>{{$array[2]}}</td>
                            <td>{{$array[3]}}</td>
                            <td>{{$array[4]}}</td>
                            <td><img src="foto/{{$array[5]}}" height="100"></td>
                            <td>
                                <a href="/data/edit/{{basename($key)}}" class="btn btn-warning">  {{ __('Edit') }} </a>
                                <a href="/data/delete/{{basename($key)}}/{{$array[5]}}" class="btn btn-danger">  {{ __('Delete') }}</a>
                            </td>
                        </tr>
                        <?php $no++; }?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
