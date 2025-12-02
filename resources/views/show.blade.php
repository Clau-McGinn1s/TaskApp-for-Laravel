@extends('layouts.app')
@section('title', 'Task detail: ' . $task->title)
@section('content')

    <div class='flex'>
        <h2 @class([' flex-grow font-bold text-xl', 'line-through' => $task->completed])>{{$task->title}}</h2>
     <form method='POST' action='{{route('tasks.toggle', ['task' => $task])}}'>
        @csrf
        @method('PUT')
        <button @class(['gap-2 text-xs bg-green-500 hover:bg-green-300', 'bg-red-500 hover:bg-red-300' => $task->completed])>Mark {{$task->completed ? 'Uncompleted' : 'Completed' }}</button>
    </form>
    </div>
    
    <h3 class='mt-8'>{{$task->description}}</h3>
    @isset($task->long_description)
        <p class='text-sm my-6'>{{$task->long_description}}</p>
    @endisset
    <div class='flex space-x-8'>
        <p class='text-xs text-blue-400'>Created: {{$task->created_at->diffForHumans()}}</p>
        <p class='text-xs text-blue-400'>Updated: {{$task->updated_at->diffForHumans()}}</p>
    </div>
    


    <nav class='flex space-x-4 pt-7'>
        <a class='btn bg-blue-500 hover:bg-blue-300 text-white' href='{{ route('tasks.index') }}'>Go back</a>
        <a class='btn grow bg-blue-500 hover:bg-blue-300 text-white' href='{{route('tasks.edit', ['task' => $task])}}'>Edit Task</a>
    
        <form method='POST' action='{{route('tasks.destroy', ['task' => $task])}}'>
            @csrf
            @method('DELETE')
            <button class='btn-delete'
            onclick='return confirm("delete task [ {{ $task->title }} ] ?")'>Delete Task</button>
        </form>
    </nav>
@endsection
