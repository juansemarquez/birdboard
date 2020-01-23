@extends('layouts.app')
@section('content')
      <h1>Birdboard</h1>

    
        <div class="card mb-3">
            <h2>{{ $project->title }}</h2>
            <p>{{ $project->description}}</p>
        </div>

    
@foreach ($project->tasks as $task)
    <div class="card mb-3">
        {{$task->body}}
    </div>
@endforeach
    <div class="card mb-3">
        <form action="{{$project->path()}}/tasks" method="post">
            @csrf
            <input name="body" placeholder="Agregar tarea...">
        </form>
<p><a href="/projects">Volver</a></p>
@endsection
