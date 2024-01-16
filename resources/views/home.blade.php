@extends('layouts.main')

@section('title', 'Home')

@section('content')
  <section class="hero">
      <div class="container">
        <div class="hero__slider owl-carousel">
          @foreach($trending['Page']['media'] as $hero)
            @if (isset($hero['bannerImage']))
              <div class="hero__items set-bg" data-setbg="{{ $hero['bannerImage'] }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">{{ $hero['type'] }}</div>
                            <h2>{{ substr($hero['title']['romaji'], 0, 20) }}...</h2>
                            <p>{{ substr($hero['description'], 0, 100) }}...</p>
                            <a href="{{ route('anime.details', ['id' => $hero['idMal']]) }}"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
            @else
              <div class="hero__items set-bg" data-setbg="{{ $nullbg }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">{{ $hero['type'] }}</div>
                            <h2>{{ substr($hero['title']['romaji'], 0, 20) }}</h2>
                            <p>{{ substr($hero['description'], 0, 100) }}...</p>
                            <a href="{{ route('anime.details', ['id' => $hero['idMal']]) }}"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </section>

  <section class="product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="trending__product">
            <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="section-title">
                  <h4>Popular Anime</h4>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="btn__all">
                  <a href="{{ route('show.all', ['category' => 'popular']) }}" class="primary-btn">View All <span class="arrow_right"></span></a>
                </div>
              </div>
            </div>

            <div class="row">
              @foreach($popular['Page']['media'] as $pop)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg hero__items" data-setbg="{{ $pop['coverImage']['large'] }}">
                          @if (isset($pop['episodes']))
                            <div class="ep">{{ $pop['episodes'] }}</div>
                          @else
                            <div class="ep">-</div>
                          @endif  
                            <div class="comment"><i class="fa fa-comments"></i> {{ $pop['favourites'] }}</div>
                            <div class="view"><i class="fa fa-eye"></i> {{ $pop['popularity'] }}</div>
                        </div>
                        <div class="product__item__text">
                            <ul>
                                <li>{{ $pop['status'] }}</li>
                                <li>{{ $pop['type'] }}</li>
                            </ul>
                            <h5><a href="{{ route('anime.details', ['id' => $pop['idMal']]) }}">{{ $pop['title']['romaji'] }}</a></h5>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>

          </div>
          <div class="popular__product">
            <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="section-title">
                  <h4>Favourites Anime</h4>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="btn__all">
                  <a href="{{ route('show.all', ['category' => 'favourites']) }}" class="primary-btn">View All <span class="arrow_right"></span></a>
                </div>
              </div>
            </div>
            
            <div class="row">
              @foreach($fav['Page']['media'] as $favo)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ $favo['coverImage']['large'] }}">
                          @if (isset($favo['episodes']))
                          <div class="ep">{{ $favo['episodes'] }}</div>
                        @else
                          <div class="ep">-</div>
                        @endif 
                            <div class="comment"><i class="fa fa-comments"></i> {{ $favo['favourites'] }}</div>
                            <div class="view"><i class="fa fa-eye"></i> {{ $favo['popularity'] }}</div>
                        </div>
                        <div class="product__item__text">
                            <ul>
                                <li>{{ $favo['status'] }}</li>
                                <li>{{ $favo['type'] }}</li>
                            </ul>
                            <h5><a href="{{ route('anime.details', ['id' => $favo['idMal']]) }}">{{ $favo['title']['romaji'] }}</a></h5>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>

          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-8">
          <div class="product__sidebar">

            <div class="product__sidebar__view">
              <div class="section-title">
                <h5>Top Views</h5>
              </div>
              {{-- <ul class="filter__controls">
                  <li class="active" data-filter="all">All</li>
                  <li data-filter="Finished Airing">Complete</li>
                  <li data-filter="Currently Airing">Ongoing</li>
              </ul> --}}

              <div class="filter__gallery">
                @foreach($trending['Page']['media'] as $index => $item)
                  @if ($index < 5)
                      @if (isset($item['bannerImage']))
                      <div class="product__sidebar__view__item set-bg mix" data-setbg="{{ $item['bannerImage'] }}">
                          @if (isset($item['episodes']))
                              <div class="ep">{{ $item['episodes'] }}</div>
                          @else
                              <div class="ep">-</div>
                          @endif 
                          <div class="view"><i class="fa fa-eye"></i> {{ $item['favourites'] }}</div>
                          <h5><a href="{{ route('anime.details', ['id' => $item['idMal']]) }}">{{ $item['title']['romaji'] }}</a></h5>
                        </div>
                      @else
                        <div class="product__sidebar__view__item set-bg mix" data-setbg="{{ $nullbg }}">
                          @if (isset($item['episodes']))
                              <div class="ep">{{ $item['episodes'] }}</div>
                          @else
                              <div class="ep">-</div>
                          @endif 
                          <div class="view"><i class="fa fa-eye"></i> {{ $item['favourites'] }}</div>
                          <h5><a href="{{ route('anime.details', ['id' => $item['idMal']]) }}">{{ $item['title']['romaji'] }}</a></h5>
                        </div>
                      @endif
                  @else
                    @break
                  @endif
                @endforeach
              </div>
            </div>


            <div class="product__sidebar__comment">
              <div class="section-title">
                <h5>Trending Anime</h5>
              </div>

                @foreach ($top100['Page']['media'] as $top)
                  <div class="product__sidebar__comment__item">
                    <a href="{{ route('anime.details', ['id' => $top['idMal']]) }}">
                      <div class="product__sidebar__comment__item__pic">
                        <img src={{ $top['coverImage']['medium'] }} alt="" width="100px" />
                      </div>
                      <div class="product__sidebar__comment__item__text">
                        <ul>
                          <li>{{ $top['status'] }}</li>
                          <li>{{ $top['type'] }}</li>
                        </ul>
                        <h5 class="text-white">{{ $top['title']['romaji'] }}</h5>
                        <span><i class="fa fa-eye"></i> {{ $top['popularity'] }} Viewes</span>
                      </div>
                    </a>
                  </div>
                @endforeach


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection