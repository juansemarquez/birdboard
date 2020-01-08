@extends('layouts.app')
@section('content')
<header class="flex items-center mb-4 py-4">
      <h2 class="mr-auto">Mis proyectos</h2>
      <a href="/projects/create" class="button">
        Nuevo proyecto
      </a>
</header>
<main class="lg:flex lg:flex-wrap -mx-3">
    @forelse ($projects as $project)
      <div class="lg:w-1/3 pb-6 px-3">  
        <div class="bg-white rounded-lg shadow p-5">
            <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-light pl-4">
                <a href="{{ $project->path() }}">{{ $project->title }}</a>
            </h3>
            <div class="text-grey">
                {{ Illuminate\Support\Str::limit($project->description) }}
            </div>    
        </div>
      </div>
    @empty
        <div>Todavía no hay ningún proyecto</div>
    @endforelse
</main>  
@endsection
