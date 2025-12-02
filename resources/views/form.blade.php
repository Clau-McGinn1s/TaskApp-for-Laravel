@extends('layouts.app')
@section('title', isset($task) ? 'Edit task' : 'Add task')
@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')   
        @endisset
        <div class='flex flex-col'>
            <label class='text-lg pr-16' for='title'>
                Title
            </label>
            <input class='grow p-2' text='text' name='title' id='title' value='{{$task->title ?? old('title')}}'/>
            @error('title')
                <p class='error-msg'>{{$message}}</p>
            @enderror
        </div>
         <div class='flex flex-col'>
            <label class='text-lg pr-16'  for='description'>
                Description
            </label>
            <textarea class='grow p-2' name='description' id='description' 
            rows='2' >{{$task->description ?? old('description')}}</textarea>
            @error('description')
                <p class='error-msg'>{{$message}}</p>
            @enderror
        </div>
         <div class='flex  flex-col'>
            <label class='text-lg pr-6'  for='long_description'>
                Detailed description
            </label>
            <textarea class='grow p-2' name='long_description' id='long_description' 
            rows='5'>{{$task->long_description ?? old('long_description')}}</textarea>
            @error('long_description')
                <p class='error-msg'>{{$message}}</p>
            @enderror
        </div>
        
        <div class='flex space-x-3'>
            <a class='btn  bg-blue-500 hover:bg-blue-300 text-white' href='/'>Cancel</a>
            <button class='grow  bg-blue-500 hover:bg-blue-300 text-white' type='Submit'>{{ isset($task) ? 'Edit Task' : 'Add Task'}}</button>
        </div>
    </form>
    @isset($task)
        <form method='POST' action='{{route('tasks.destroy', ['task' => $task])}}'>
            @csrf
            @method('DELETE')
            <div class='flex'>
                <button class='btn-delete mt-1 grow'
                onclick='return confirm("delete task [ {{ $task->title }} ] ?")'>Delete Task</button>
            </div>
        </form>
    @endisset
@endsection