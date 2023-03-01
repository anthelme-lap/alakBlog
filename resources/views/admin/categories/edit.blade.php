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
            <h4 class="card-title">Modifier une Catégorie</h4>
            <form class="forms-sample" method="post" action="{{route('updated.category', $categorie->id)}}">
                @csrf
                @method('put')
                @include('../alerts/alert_message')
                <div class="form-group">
                    <label for="exampleInputPassword4">Nom</label>
                    <input type="text" name="name" value="{{$categorie->name}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputPassword4" placeholder="Titre">
                    @error('name') 
                        <span class="invalid-feedback">{{$message}}</span> 
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mr-2">Valider</button>
                
            </form>
            </div>
        </div>
        </div>
        
        
    
    </div>
@endsection