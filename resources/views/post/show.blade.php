@extends('layouts.app')

@section('title', 'Post')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                {{ $post->title }} | {{ $post->created_at->format('d/m/Y') }} 
                
                <a href="{{ route('chris.posts.create') }}" style="float: right">Ajouter un commentaire</a>
            </div>

            <div class="card-body">
                {{ $post->post }} 
            </div>

            <div class="col-md-8" style="margin-top: 20px; margin-bottom: 20px">
                <form action="{{ route('chris.comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-group">
                        <label for="comment">Votre Commentaire</label>
                        <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('name') }}" required autocomplete="comment" autofocus id="comment" value="" rows="3"></textarea>
                        @error('comment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">Valider</button>
                </form>
            </div>
        </div>
        <div style="margin-top: 20px">
            <h4>Commentaires</h4>
            @forelse ($post->comments as $comment)
            <div style="display: flex; justify-content:space-between; margin-bottom: 10px">
                <div style="background: rgb(157, 208, 231); margin-left:20px; padding: 5px 10px 5px 10px; border-radius:5px"> 
                    {{ $comment->comment }}
                </div>
            </div>
                
            @empty
                <p>Il n'y a pas encore de commentaire</p>
            @endforelse
            
        </div>
    </div>
</div>
    
@endsection