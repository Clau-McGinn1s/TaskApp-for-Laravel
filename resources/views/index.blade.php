@extends('layouts.app')
@section('title', 'Task list')
@section('content')
    @forelse ($tasks as $task)
        <div class='mb-5'>
            <a href='{{route('tasks.show', ['task' => $task])}}'><h3>{{$task->title}}{{$task->completed ? '     ✓' : ''}}</h3></a>
            <p>{{$task->description}}</p>
        </div>
    @empty
        <h2>no tasks</h2>
    @endforelse

    <a class='btn pt-16 text-1xl' href='tasks/create'>Add New Task</a>
    @if ($tasks->count())
        <div class='pt-16'>
            {{ $tasks->links() }}
        </div>
    @endif
@endsection
