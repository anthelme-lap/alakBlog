@extends('../../layouts/app')

@section('content-user')
<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="blog__sidebar">
            <div class="blog__sidebar__search">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button type="submit"><span class="icon_search"></span></button>
                </form>
            </div>
            <div class="blog__sidebar__item">
                <h4>Catégories</h4>
                <ul>
                    {{-- @foreach ($categorie as $item) --}}
                        {{-- @if ($categorie->articles->count() > 0) --}}
                            {{-- <li><a href="#">{{$item->name}} ({{$item->articles->count()}})</a></li> --}}
                        {{-- @endif --}}
                    {{-- @endforeach --}}
                </ul>
            </div>
            <div class="blog__sidebar__item">
                <h4>Recent News</h4>
                <div class="blog__sidebar__recent">
                    <a href="#" class="blog__sidebar__recent__item">
                        <div class="blog__sidebar__recent__item__pic">
                            <img src="{{asset('user/img/blog/sidebar/sr-1.jpg')}}" alt="">
                        </div>
                        <div class="blog__sidebar__recent__item__text">
                            <h6>09 Kinds Of Vegetables<br /> Protect The Liver</h6>
                            <span>MAR 05, 2019</span>
                        </div>
                    </a>
                    <a href="#" class="blog__sidebar__recent__item">
                        <div class="blog__sidebar__recent__item__pic">
                            <img src="{{asset('user/img/blog/sidebar/sr-2.jpg')}}" alt="">
                        </div>
                        <div class="blog__sidebar__recent__item__text">
                            <h6>Tips You To Balance<br /> Nutrition Meal Day</h6>
                            <span>MAR 05, 2019</span>
                        </div>
                    </a>
                    <a href="#" class="blog__sidebar__recent__item">
                        <div class="blog__sidebar__recent__item__pic">
                            <img src="{{asset('user/img/blog/sidebar/sr-3.jpg')}}" alt="">
                        </div>
                        <div class="blog__sidebar__recent__item__text">
                            <h6>4 Principles Help You Lose <br />Weight With Vegetables</h6>
                            <span>MAR 05, 2019</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="blog__sidebar__item">
                <h4>Search By</h4>
                <div class="blog__sidebar__item__tags">
                    <a href="#">Apple</a>
                    <a href="#">Beauty</a>
                    <a href="#">Vegetables</a>
                    <a href="#">Fruit</a>
                    <a href="#">Healthy Food</a>
                    <a href="#">Lifestyle</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="row">
            @if ($categorie)
                @foreach ($categorie->articles as $article)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="../../images/{{$article->image}}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{$article->created_at->format('d/m/y')}}</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="{{route('detail.article', $article->id)}}">{{$article->titre}}</a></h5>
                                <p >{{Str::limit($article->description, 100,'')}}</p>
                                <a href="{{route('detail.article', $article->id)}}" class="blog__btn">Lire plus <span class="arrow_right"></span></a>
                            </div>
                        </div> 
                    </div>
                @endforeach
            
            
                <div class="col-lg-12">
                    <div>
                        {{-- {{$categorie->articles->links()}} --}}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection