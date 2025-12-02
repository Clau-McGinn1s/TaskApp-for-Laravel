<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(3)
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create');

Route::get('/tasks/{task}', function(Task $task){
    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::get('/', function(){
    return redirect()->route('tasks.index');
});

Route::delete('/tasks/{task}/delete', function(Task $task){
    $task->delete();

    return redirect()->route('tasks.index')
    ->with('success', 'Task deleted succesfully!');
})->name('tasks.destroy');

Route::get('/tasks/{task}/edit', function(Task $task){
    return view('edit', ['task' =>$task]);
})->name('tasks.edit');

Route::put('/tasks/{task}', function(TaskRequest $request, Task $task){
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task])
        ->with('success', 'Task edited succesfully!');
})->name('tasks.update');

Route::post('/tasks', function(TaskRequest $request){
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task])
        ->with('success', 'Task created succesfully!');
})->name('tasks.store');

