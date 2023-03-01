@extends('../../layouts/admin')

@section('content-admin')
    <div class="page-header">
        <h3 class="page-title"> Catégorie </h3>
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
                        <th> Nom</th>
                        <th> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($categories as $categorie)
                       
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td> {{$categorie->name}} </td>
                            <td> 
                                <div class="d-flex">
                                    <a href="{{route('edit.category', $categorie->id)}}" style="margin-right: 10px" class="btn btn-info">Edit</a>
                                    <form action="{{route('delete.category', $categorie->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                                
                            </td>
                    @empty
                            <td> 
                                <p>Aucun article</p>
                            </td>
                            
                        </tr>
                    @endforelse
                        
                    </tbody>
                </table>
                <div class="mt-1">{{$categories->links()}}</div>
            </div>
            </div>
        </div>
        </div>

        
    </div>
@endsection