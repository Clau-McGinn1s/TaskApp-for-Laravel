@extends('layouts.app')
@section('title', 'Task list')
@section('content')
    @forelse ($tasks as $task)
        <div>
            <a href='{{route('tasks.show', ['id' => $task->id])}}'><h3>{{$task->title}}</h3></a>
            <p>{{$task->description}}</p>
        </div>
    @empty
        <h2>no tasks</h2>
    @endforelse
@endsection
