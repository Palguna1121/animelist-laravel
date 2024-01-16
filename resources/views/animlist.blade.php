@extends('layouts.main')

@section('title','Animlist')

@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route('show.all', ['category' => $category]) }}">{{ $category }}</a>
                    {{-- <span>Romance</span> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="product__page__content">
                    <div class="product__page__title">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-6">
                                <div class="section-title">
                                    <h4>{{ $category }}</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="product__page__filter">
                                    <p>Order by:</p>
                                    <select>
                                        <option value="">A-Z</option>
                                        <option value="">1-10</option>
                                        <option value="">10-50</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($animeData['Page']['media'] as $item)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ $item['coverImage']['large'] }}">
                                    @if (isset($item['episodes']))
                                    <div class="ep">{{ $item['episodes'] }}</div>
                                    @else
                                    <div class="ep">-</div>
                                    @endif 
                                        <div class="comment"><i class="fa fa-comments"></i> {{ $item['favourites'] }}</div>
                                        <div class="view"><i class="fa fa-eye"></i> {{ $item['popularity'] }}</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>{{ $item['status'] }}</li>
                                            <li>{{ $item['type'] }}</li>
                                        </ul>
                                        <h5><a href="{{ route('anime.details', ['id' => $item['idMal']]) }}">{{ $item['title']['romaji'] }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="product__pagination">
                    <a href="#" class="current-page">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#"><i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                        <div class="section-title">
                            <h5>Top Views</h5>
                        </div>
                        <ul class="filter__controls">
                            <li class="active" data-filter="*">Day</li>
                            <li data-filter=".week">Week</li>
                            <li data-filter=".month">Month</li>
                            <li data-filter=".years">Years</li>
                        </ul>
                        <div class="filter__gallery">
                            <div class="product__sidebar__view__item set-bg mix day years"
                            data-setbg="img/sidebar/tv-1.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Boruto: Naruto next generations</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg mix month week"
                        data-setbg="img/sidebar/tv-2.jpg">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg mix week years"
                    data-setbg="img/sidebar/tv-3.jpg">
                    <div class="ep">18 / ?</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix years month"
                data-setbg="img/sidebar/tv-4.jpg">
                <div class="ep">18 / ?</div>
                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
            </div>
            <div class="product__sidebar__view__item set-bg mix day"
            data-setbg="img/sidebar/tv-5.jpg">
            <div class="ep">18 / ?</div>
            <div class="view"><i class="fa fa-eye"></i> 9141</div>
            <h5><a href="#">Fate stay night unlimited blade works</a></h5>
        </div>
    </div>
</div>
<div class="product__sidebar__comment">
    <div class="section-title">
        <h5>New Comment</h5>
    </div>
    <div class="product__sidebar__comment__item">
        <div class="product__sidebar__comment__item__pic">
            <img src="img/sidebar/comment-1.jpg" alt="">
        </div>
        <div class="product__sidebar__comment__item__text">
            <ul>
                <li>Active</li>
                <li>Movie</li>
            </ul>
            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
        </div>
    </div>
    <div class="product__sidebar__comment__item">
        <div class="product__sidebar__comment__item__pic">
            <img src="img/sidebar/comment-2.jpg" alt="">
        </div>
        <div class="product__sidebar__comment__item__text">
            <ul>
                <li>Active</li>
                <li>Movie</li>
            </ul>
            <h5><a href="#">Shirogane Tamashii hen Kouhan sen</a></h5>
            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
        </div>
    </div>
    <div class="product__sidebar__comment__item">
        <div class="product__sidebar__comment__item__pic">
            <img src="img/sidebar/comment-3.jpg" alt="">
        </div>
        <div class="product__sidebar__comment__item__text">
            <ul>
                <li>Active</li>
                <li>Movie</li>
            </ul>
            <h5><a href="#">Kizumonogatari III: Reiket su-hen</a></h5>
            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
        </div>
    </div>
    <div class="product__sidebar__comment__item">
        <div class="product__sidebar__comment__item__pic">
            <img src="img/sidebar/comment-4.jpg" alt="">
        </div>
        <div class="product__sidebar__comment__item__text">
            <ul>
                <li>Active</li>
                <li>Movie</li>
            </ul>
            <h5><a href="#">Monogatari Series: Second Season</a></h5>
            <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
        </div>
    </div>
</div>
</section>

@endsection