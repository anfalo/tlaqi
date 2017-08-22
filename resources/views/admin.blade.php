@extends('layouts.app')

@section('content')
@if (count($errors) > 0)
        <div class="alert alert-danger map-alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                Uploaded Files:
                @if (count($files) > 0)
                {!! Form::open(['url' => '/files', 'files' => true, 'class' => 'form-inline']) !!}
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>File</th>
                            <th>Date Created</th>
                            <th>Last Modified</th>
                            <th>Owner</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                        <tr>
                            <td>{!! Form::checkbox('files1[]', $file->id);!!}</td>
                            <td>
                                {{$file->name}}
                            </td>
                            <td>
                                <a href="{{$file->file}}">Download</a>
                            </td>
                            <td>
                                {{$file->created_at}}
                            </td>
                            <td>
                                {{$file->updated_at}}
                            </td>
                            <td>
                                {{$file->user->name}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @php
                    $values = array();
                    foreach ($users as $user) {
                        $values[$user->id] = $user->name;
                    }
                @endphp
                {!! Form::select('user_id', $values, null, ['class' => 'form-control'])!!}  

                {!! Form::submit('Forward',['name' => 'forward', 'class' => 'btn btn-primary']);!!}
                {!! Form::close() !!}
                @endif
                </div>
                <hr>
                <div class="panel-body">
                     Current Users:
                    @if (count($users) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                    <td>
                                        {{ $user->name}}
                                    </td>
                                    <td>
                                        {{ $user->email}}
                                    </td>
                                    <td>
                                        {{ $user->created_at}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
