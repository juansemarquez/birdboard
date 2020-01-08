@extends('layouts.app')
@section('content')
<div class="flex items-center mb-4">
      <h1 class="mr-auto">Birdboard</h1>
      <a href="/projects/create">Nuevo proyecto</a>
</div>
<div class="flex">
    @forelse ($projects as $project)
        <div class="bg-white mr-4 rounded shadow w-1/3 p-5">
            <h3 class="font-normal text-xl py-4">
                <a href="{{ $project->path() }}">{{ $project->title }}</a>
            </h3>
            <div class="text-grey">
                {{ Illuminate\Support\Str::limit($project->description) }}
            </div>    
        </div>
    @empty
        <div>Todavía no hay ningún proyecto</div>
    @endforelse
</div>  
@endsection
