@extends('../../layouts/admin')


@section('content-admin')
    <div class="page-header">
        <h3 class="page-title"> Form elements </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form elements</li>
        </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Ajouter Article</h4>
            <form class="forms-sample" method="POST" action="{{route('store.article')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')

                @include('../alerts/alert_message')
                <div class="form-group">
                    <label for="exampleInputPassword4">Titre</label>
                    <input type="text" name="titre" class="form-control @error('titre') is-invalid @enderror" id="exampleInputPassword4" placeholder="Titre">
                    @error('titre') 
                        <span class="invalid-feedback">{{$message}}</span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label>Catégorie</label>
                    <select class="js-example-basic-single" class="@error('category_id') is-invalid @enderror" name="category_id" style="width:100%">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id') 
                        <span class="invalid-feedback">{{$message}}</span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="file-upload-default @error('image') is-invalid @enderror">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                           <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>
                    @error('image') 
                        <span class="invalid-feedback">{{$message}}</span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control" name="description" id="exampleTextarea1" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Valider</button>
                
            </form>
            </div>
        </div>
        </div>
        
        
    
    </div>
@endsection