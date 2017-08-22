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
                Your Files:
                @if (count($files) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>File</th>
                            <th>Date Created</th>
                            <th>Last Modified</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                        <tr>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                </div>
                <hr/>
                <div class="panel-body">
                    Upload A new file:
                    {!! Form::open(['url' => '/files', 'files' => true]) !!}
                        {!! Form::label('name', 'File Name:'); !!}
                        {!! Form::text('name', '', ['class' => 'form-control']);!!}
                        {!! Form::file('file');!!}
                        {!! Form::submit('Send!',['name' => 'add', 'class' => 'btn btn-primary']);!!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
