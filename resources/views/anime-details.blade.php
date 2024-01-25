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
                            <p>{!! strip_tags($anime['description']) !!}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Type:</span> {{ $anime['type'] }}</li>
                                            <li><span>Date aired:</span>
                                                {{ formatDate($anime['startDate']) }} to {{ formatDate($anime['endDate']) }}
                                            </li>
                                            <li><span>Genre:</span>
                                                @foreach ($anime['genres'] as $key => $genre)
                                                    {{ $genre }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
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
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a class="follow-btn"><i class="fa fa-heart-o"></i> Like & Save</a>
                                <a class="follow-btn"><i class="fa fa-heart"></i> Like & Save</a>
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
                                <h5>Popular now</h5>
                            </div>
                            @foreach ($popular['Page']['media'] as $pop) 
                                    <div class="product__sidebar__view__item set-bg" data-setbg={{ $pop['coverImage']['large'] }}>
                                        @if (isset($pop['episodes']))
                                            <div class="ep">{{ $pop['episodes'] }}</div>
                                        @else
                                            <div class="ep">-</div>
                                        @endif  
                                        <div class="view"><i class="fa fa-eye"></i> {{ $pop['popularity'] }}</div>
                                        <h5><a href="{{ route('anime.details', ['id' => $pop['idMal']]) }}">{{ $pop['title']['romaji'] }}</a></h5>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection