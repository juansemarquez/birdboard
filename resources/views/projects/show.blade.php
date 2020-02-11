@extends('layouts.app')
@section('content')
      <h1>Birdboard</h1>

    
        <div class="card mb-3">
            <h2>{{ $project->title }}</h2>
            <p>{{ $project->description}}</p>
        </div>

    
@foreach ($project->tasks as $task)
    <div class="card mb-3">
        <form action="{{ $task->path() }}" method="post">
            @method('patch')
            @csrf
            <div class="flex">
                <input name="body" value="{{$task->body}}" class="w-full {{ $task->completed ? 'text-grey' : '' }}">
                <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
            </div>
            
        </form>
    </div>
@endforeach
    <div class="card mb-3">
        <form action="{{$project->path()}}/tasks" method="post">
            @csrf
            <input name="body" placeholder="Agregar tarea..." class="w-full">
        </form>
<p><a href="/projects">Volver</a></p>
@endsection
