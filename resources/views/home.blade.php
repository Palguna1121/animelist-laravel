@extends('layouts.main')

@section('title', 'Home')

@section('content')
  <section class="hero">
      <div class="container">
        <div class="hero__slider owl-carousel">
          @foreach($heroData['data'] as $hero)
            <div class="hero__items set-bg" data-setbg="{{ $hero['images']['jpg']['large_image_url'] }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label">{{ $hero['type'] }}</div>
                            <h2>{{ $hero['title'] }}</h2>
                            <p>{{ substr($hero['synopsis'], 0, 100) }}...</p>
                            <a href="{{ route('anime.details', ['id' => $hero['mal_id']]) }}"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
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
                  <h4>Trending Now Season</h4>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="btn__all">
                  <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                </div>
              </div>
            </div>

            <div class="row">
              @foreach($seasonNowData['data'] as $seasonNow)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg hero__items" data-setbg="{{ $seasonNow['images']['jpg']['image_url'] }}">
                          @if (isset($seasonNow['episodes']))
                            <div class="ep">{{ $seasonNow['episodes'] }}</div>
                          @else
                            <div class="ep">-</div>
                          @endif  
                            <div class="comment"><i class="fa fa-comments"></i> {{ $seasonNow['rank'] }}</div>
                            <div class="view"><i class="fa fa-eye"></i> {{ $seasonNow['popularity'] }}</div>
                        </div>
                        <div class="product__item__text">
                            <ul>
                                <li>{{ $seasonNow['status'] }}</li>
                                <li>{{ $seasonNow['type'] }}</li>
                            </ul>
                            <h5><a href="{{ route('anime.details', ['id' => $seasonNow['mal_id']]) }}">{{ $seasonNow['title'] }}</a></h5>
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
                  <h4>Upcoming Anime</h4>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="btn__all">
                  <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                </div>
              </div>
            </div>
            
            <div class="row">
              @foreach($seasonUpcomingData['data'] as $seasonUpcoming)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ $seasonUpcoming['images']['jpg']['image_url'] }}">
                          @if (isset($seasonUpcoming['episodes']))
                          <div class="ep">{{ $seasonUpcoming['episodes'] }}</div>
                        @else
                          <div class="ep">-</div>
                        @endif 
                            <div class="comment"><i class="fa fa-comments"></i> {{ $seasonUpcoming['rank'] }}</div>
                            <div class="view"><i class="fa fa-eye"></i> {{ $seasonUpcoming['popularity'] }}</div>
                        </div>
                        <div class="product__item__text">
                            <ul>
                                <li>{{ $seasonUpcoming['status'] }}</li>
                                <li>{{ $seasonUpcoming['type'] }}</li>
                            </ul>
                            <h5><a href="{{ route('anime.details', ['id' => $seasonUpcoming['mal_id']]) }}">{{ $seasonUpcoming['title'] }}</a></h5>
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

              <div class="filter__gallery" data-api-url="{{ env('API_URL') }}">
                @foreach($heroData['data'] as $item)
                    <div class="product__sidebar__view__item set-bg mix" data-setbg="{{ $item['images']['jpg']['large_image_url'] }}">
                        @if (isset($item['episodes']))
                            <div class="ep">{{ $item['episodes'] }}</div>
                        @else
                            <div class="ep">-</div>
                        @endif 
                        <div class="view"><i class="fa fa-eye"></i> {{ $item['members'] }}</div>
                        <h5><a href="{{ route('anime.details', ['id' => $item['mal_id']]) }}">{{ $item['title'] }}</a></h5>
                    </div>
                @endforeach
              </div>
            </div>


            <div class="product__sidebar__comment">
              <div class="section-title">
                <h5>New Comment</h5>
              </div>

                @foreach ($reproducedData as $reproduce)
                  <div class="product__sidebar__comment__item">
                    <div class="product__sidebar__comment__item__pic">
                      <img src={{ $reproduce['images']['webp']['image_url'] }} alt="" width="100px" />
                    </div>
                    <div class="product__sidebar__comment__item__text">
                      <ul>
                        <li>Active</li>
                        <li>Movie</li>
                      </ul>
                      <h5><a href="{{ route('anime.details', ['id' => $reproduce['mal_id']]) }}">{{ $reproduce['title'] }}</a></h5>
                      <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                    </div>
                  </div>
                @endforeach


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection