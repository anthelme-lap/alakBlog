@extends('../../layouts/admin')

@section('content-admin')
    <div class="page-header">
        <h3 class="page-title"> Articles </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
        </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Liste Article</h4>
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th> # </th>
                            <th> Titre</th>
                            <th> Catégorie</th>
                            <th> Image </th>
                            <th> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @auth
                                @foreach ($articles as $article)
                                    @if (Auth::user() == $article->user)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td> {{$article->titre}} </td>
                                            <td> {{$article->category->name}} </td>
                                            <td> 
                                                <img src="../../images/{{$article->image}}" width="40" alt="">
                                            </td>
                                            <td> 
                                                <div class="d-flex">
                                                    <a href="{{route('edit.article', $article->id)}}" style="margin-right: 10px" class="btn btn-info">Edit</a>
                                                    <form action="{{route('delete.article', $article->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                    </form>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    @endif    
                                @endforeach 
                                
                            @endauth
                        </tbody>
                    </table>
                    <div class="mt-1">{{$articles->links()}}</div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection