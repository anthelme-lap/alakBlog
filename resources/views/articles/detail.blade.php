@extends('../../layouts/app')

@section('content-user')

{{-- @if ($article) --}}

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="../images/{{$article->image}}" width="1100" height="400" alt="">
                        <p>Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet
                            dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit
                            aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur
                            sed, convallis at tellus. Sed porttitor lectus nibh. Donec sollicitudin molestie malesuada.
                            Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus.
                            Donec rutrum congue leo eget malesuada. Curabitur non nulla sit amet nisl tempus convallis
                            quis ac lectus. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada
                            feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.</p>
                        <h3>
                            The corner window forms a place within a place that is a resting point within the large
                            space.
                        </h3>
                        <div class="card">
                            <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>The corner window forms a place within a place that is a resting point within the large
                                space.</p>
                                <footer class="blockquote-footer">Footer <cite title="Source title">Source title</cite></footer>
                            </blockquote>
                            </div>
                        </div>
                        <p>
                            The study area is located at the back with a view of the vast nature. Together with the other
                            buildings, a congruent story has been managed in which the whole has a reinforcing effect on
                            the components. The use of materials seeks connection to the main house, the adjacent
                            stables
                        </p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="{{asset('user/img/blog/details/details-author.jpg')}}" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>{{$article->user->name}}</h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories:</span> {{$article->category->name}}</li>
                                        <li><span>Tags:</span> All, Trending, Cooking, Healthy Food, Life Style</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                    
                                </div>
                                <button class="btn btn-primary mt-3">Commenter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Section commentaire --}}
    <div class="comments-list">
        @foreach ($article->comments as $comment)
        {{-- @dump($comment->user->name) --}}
        <div class="media mt-1">
            <img class="mr-3" src="https://via.placeholder.com/50" alt="">
            <div class="media-body">
                <h5 class="mt-0">{{$comment->user->name}}</h5>
                <p>{{$comment->content}}</p>
                <button href="#" class="btn btn-primary btn-sm reply-button mb-2" value="{{$comment->id}}">Répondre</button>
                <div class="reply-form">
                    <form action="" method="" >
                        @csrf
                        <div class="form-group">
                            <label for="reply-textarea">Votre réponse</label>
                            <textarea name="" class="form-control" name="content"  id="reply-textarea" rows="3"></textarea>
                        </div>
                        <button class="btn btn-primary btn-sm">Poster</button>
                    </form>
                </div>
                {{-- reponse aux commentaires --}}
                {{-- <div class="media mt-3">
                    <img class="mr-3" src="https://via.placeholder.com/50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Jane Doe</h5>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est molestiae temporibus repellat suscipit autem eum, cum debitis magnam odit incidunt, necessitatibus deleniti tempore enim facere ex consequatur, consectetur esse at.</p>
                        <a href="" class="btn btn-primary btn-sm reply-button">Répondre</a>
                        <div class="reply-form">
                            <form action="">
                                <div class="form-group">
                                    <label for="reply-textarea">Votre réponse</label>
                                    <textarea name="" class="form-control" id="reply-textarea" rows="3"></textarea>
                                </div>
                                <button class="btn btn-primary btn-sm">Poster</button>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        @endforeach
    </div>
   {{-- section commebtaire end --}}
      
    <!-- Blog Details Section End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Laisser un commentaire</h2>
                    </div>
                </div>
            </div>
            <form action="{{route('article.comment')}}" method="post" id="form_comment">
                @csrf
               
                <div class="row">
                    <input type="hidden" name="parent">
                    <input type="hidden" name="article_id" value="{{$article->id}}"  placeholder="Votre Nom">
                    <div class="col-lg-12 text-center">
                        <textarea name="content" placeholder="Votre Message"></textarea>
                    </div>
                    <div class=" col-lg-12 text-center">
                        <button type="submit" class="site-btn">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->

    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($article_by_category as $article)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="../../images/{{$article->image}}">
                            {{-- <h5><a href="#">Fresh Fruit</a></h5> --}}
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> Publié le {{$article->created_at->format('d/m/y')}} </li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="{{route('detail.article', $article->id)}}">{{$article->titre}}</a></h5>
                            <p> {{Str::limit($article->description, 50, '...')}} </p>
                        </div>
                    </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </section>
{{-- 
    <script>
        var form_comment = document.querySelector('#form_comment')
         form_comment.addEventListener('submit', function(event){
            event.preventDefault();
        })
    </script> --}}

{{-- @endif --}}
@endsection