@extends('layouts.app')

@section('title', 'Posts')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header" style="display: flex; justify-content: space-between">
                {{ __('Liste des articles') }} 
                <div>Illustration</div>
                <a href="{{ route('chris.posts.create') }}" style="float: right">Ajouter</a>
            </div>

            <div class="card-body">
                @forelse ($posts as $post)
                <div style="display: flex; justify-content:space-between; margin-bottom: 10px">
                    <div>{{ $post->title }}</div>
                    <div>
                        <img src="{{ "C:/wamp64/www/laravel/fileData/formdateObjectJavascript/images/photo/" . $post->image->path}} " alt="" srcset="">
                        {{$post->image->path}}
                    </div>
                    {{-- <button class="btn btn-info" >Voir</button> --}}
                    <a class="btn btn-info" href="{{ route('chris.posts.show', $post->id) }}">Voir</a>
                </div>
                    
                @empty
                    <p>Il n'y a aucun article</p>
                @endforelse
            
            </div>
        </div>
    </div>
</div>
    
@endsection