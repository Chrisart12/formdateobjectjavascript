@extends('layouts.app')

@section('title', 'Creer - article')
@section('content')
<div class="row justify-content-center">
   
    <div class="col-md-6">
        <div class="alert alert-success message_success" role="alert" id="message_success">
            L'article a été créé avec succès.
        </div>
        <div class="card">
            <div class="card-header">
                {{ __('Créer un article') }} 
                
                <a href="{{ route('chris.posts.index') }}" style="float: right">Liste des articles</a>
            </div>

            <div class="card-body">
                <form action="{{ route('chris.posts.store') }}" method="POST" id="form_post" enctype="multipart/form-data">
                    @csrf
                    <div class="post_alert_infos" id="post_alert_infos">
                        Les champs titre et article sont obligatoires
                    </div>
                    
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" name="title" id="title" value="" placeholder="Titre">
                        
                        <span class="text-danger error_text title_error" role="alert" ></span>
                    
                    </div>
                    <div class="form-group">
                        <label for="post">Article</label>
                        <textarea class="form-control" name="post" id="post" value="" rows="3"></textarea>
                    
                        <span class="text-danger error_text post_error" role="alert"></span>
                    
                    </div>
                    <div class="form-group">
                        <label for="image">Ajouter une illustration</label>
                        <input type="file" class="form-control-file" id="image" name="image" value="" >

                        <span class="text-danger error_text image_error" role="alert" ></span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="send_post">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection