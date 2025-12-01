@extends('layouts.app')
@section('title', 'Task detail: ' . $task->title)
@section('content')
    <h2>Task: {{$task->title}}{{$task->completed ? '     ✓' : ''}}</h2>
    <h3>Info: {{$task->description}}</h3>
    @isset($task->long_description)
        <p>Description: {{$task->long_description}}</p>
    @endisset
    <p>Created at: {{$task->created_at}}</p>
    <p>Updated at: {{$task->updated_at}}</p>


    <a class='btn' href='{{ route('tasks.index') }}'>Return</a>
@endsection