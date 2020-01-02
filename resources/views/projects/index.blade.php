@extends('layouts.app')
@section('content')
<div class="flex items-center mb-4">
      <h1 class="mr-auto">Birdboard</h1>
      <a href="/projects/create">Nuevo proyecto</a>
</div>
<ul>
    @forelse ($projects as $project)
        <li><a href="{{ $project->path() }}">{{ $project->title }}</a></li>
    @empty
        <li>Todavía no hay ningún proyecto</li>
    @endforelse
</ul>  
@endsection
