@extends('layouts.main')

@section('title','Details')

@section('content')
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{ $anime['coverImage']['extraLarge'] }}">
                            <div class="comment"><i class="fa fa-comments"></i> {{ $anime['favourites'] }}</div>
                            <div class="view"><i class="fa fa-eye"></i> {{ $anime['popularity'] }}</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $anime['title']['romaji'] }}</h3>
                                <span>{{ $anime['title']['native'] }}, {{ $anime['title']['english'] }}</span>
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                <span>{{ $anime['meanScore'] }}/100</span>
                            </div>
                            <p>{{ $anime['description'] }}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span> {{ $anime['type'] }}</li>
                                            <li><span>Date aired:</span>
                                                {{ formatDate($anime['startDate']) }} to {{ formatDate($anime['endDate']) }}
                                            </li>
                                            <li><span>Genre:</span>
                                                @foreach ($anime['genres'] as $genre)
                                                    {{ $genre }}
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Duration:</span> {{ $anime['duration'] }} min/ep</li>
                                            <li><span>Views:</span> {{ $anime['popularity'] }}</li>
                                            <li><span>Studios:</span>
                                                @foreach ($anime['studios']['nodes'] as  $namestudio)
                                                    {{ $namestudio['name'] }}
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
                                <a href="#" class="watch-btn"><span>Watch Now</span> <i
                                    class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="anime__details__review">
                            <div class="section-title">
                                <h5>Reviews</h5>
                            </div>
                            @foreach ($anime['reviews']['nodes'] as $index => $user)
                                @if ($index < 8)
                                    <div class="anime__review__item">
                                        <div class="anime__review__item__pic">
                                            <img src="{{ $user['user']['avatar']['large'] }}" alt="gambar pokoknya ini">
                                        </div>
                                        <div class="anime__review__item__text">
                                            <h6>{{ $user['user']['name'] }} - <span>Long time ago</span></h6>
                                            <p>{{ substr($user['body'], 0, 150) }}</p>
                                        </div>
                                    </div>
                                @else
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <div class="anime__details__form">
                            <div class="section-title">
                                <h5>Your Comment</h5>
                            </div>
                            <form action="#">
                                <textarea placeholder="Your Comment"></textarea>
                                <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="anime__details__sidebar">
                            <div class="section-title">
                                <h5>you might like...</h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-1.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Boruto: Naruto next generations</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-2.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-3.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-4.jpg">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection