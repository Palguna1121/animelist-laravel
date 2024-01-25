@extends('layouts.main')

@section('title', $category)

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
                    {{-- Tampilkan tombol previous jika halaman saat ini bukan halaman pertama --}}
                    @if($animeData['Page']['pageInfo']['currentPage'] > 1)
                        <a href="{{ route('animelist', ['category' => $category, 'page' => 1]) }}"><i class="fa fa-angle-double-left"></i></a>
                        <a href="{{ route('animelist', ['category' => $category, 'page' => $animeData['Page']['pageInfo']['currentPage'] - 1]) }}"><i class="fa fa-angle-left"></i></a>
                    @endif
                
                    {{-- Tampilkan lima halaman sebelum dan sesudah halaman saat ini --}}
                    @for($i = max(1, $animeData['Page']['pageInfo']['currentPage'] - 2); $i <= min($animeData['Page']['pageInfo']['lastPage'], $animeData['Page']['pageInfo']['currentPage'] + 2); $i++)
                        <a href="{{ route('animelist', ['category' => $category, 'page' => $i]) }}" class="{{ $i == $animeData['Page']['pageInfo']['currentPage'] ? 'current-page' : '' }}">{{ $i }}</a>
                    @endfor
                
                    {{-- Tampilkan tombol next jika halaman saat ini bukan halaman terakhir --}}
                    @if($animeData['Page']['pageInfo']['currentPage'] < $animeData['Page']['pageInfo']['lastPage'])
                        <a href="{{ route('animelist', ['category' => $category, 'page' => $animeData['Page']['pageInfo']['currentPage'] + 1]) }}"><i class="fa fa-angle-right"></i></a>
                    @endif
                </div>

            </div>

            
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                        <div class="section-title">
                            <h5>Top Views</h5>
                        </div>
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
</section>

@endsection