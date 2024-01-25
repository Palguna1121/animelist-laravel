@extends('layouts.main')

@section('title', $searchTerm)

@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route('anime.search', ['searchTerm' => $searchTerm]) }}">Search</a>
                    {{-- <span>Romance</span> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product__page__content">
                    <div class="product__page__title">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-6">
                                <div class="section-title">
                                    <h4>Pencarian : {{ $searchTerm }}</h4>
                                </div>
                            </div>
                            {{-- <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="product__page__filter">
                                    <p>Order by:</p>
                                    <select>
                                        <option value="">A-Z</option>
                                        <option value="">1-10</option>
                                        <option value="">10-50</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row">
                        @if ($animeData)
                            @foreach ($animeData['Page']['media'] as $item)
                            <div class="col-lg-3 col-md-6 col-sm-6">
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
                                        <h5>
                                            @if ($item['idMal'])
                                                <a href="{{ route('anime.details', ['id' => $item['idMal']]) }}">{{ $item['title']['romaji'] }}</a>
                                            @else
                                            <a href="#">{{ $item['title']['romaji'] }}</a>
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p class="text-white">Tidak ada hasil pencarian untuk '{{ $searchTerm }}'.</p>
                        @endif
                    </div>
                </div>

                <div class="product__pagination">
                    {{-- Tampilkan tombol previous jika halaman saat ini bukan halaman pertama --}}
                    @if($animeData['Page']['pageInfo']['currentPage'] > 1)
                        <a href="{{ route('anime.search', ['searchTerm' => $searchTerm, 'page' => 1]) }}"><i class="fa fa-angle-double-left"></i></a>
                        <a href="{{ route('anime.search', ['searchTerm' => $searchTerm, 'page' => $animeData['Page']['pageInfo']['currentPage'] - 1]) }}"><i class="fa fa-angle-left"></i></a>
                    @endif

                    {{-- Tampilkan lima halaman sebelum dan sesudah halaman saat ini --}}
                    @for($i = max(1, $animeData['Page']['pageInfo']['currentPage'] - 2); $i <= min($animeData['Page']['pageInfo']['lastPage'], $animeData['Page']['pageInfo']['currentPage']); $i++)
                        <a href="{{ route('anime.search', ['searchTerm' => $searchTerm, 'page' => $i]) }}" class="{{ $i == $animeData['Page']['pageInfo']['currentPage'] ? 'current-page' : '' }}">{{ $i }}</a>
                    @endfor

                    {{-- Tampilkan tombol next jika halaman saat ini bukan halaman terakhir --}}
                    @if($animeData['Page']['pageInfo']['currentPage'] < $animeData['Page']['pageInfo']['lastPage'])
                        <a href="{{ route('anime.search', ['searchTerm' => $searchTerm, 'page' => $animeData['Page']['pageInfo']['currentPage'] + 1]) }}"><i class="fa fa-angle-right"></i></a>
                    @endif
                </div>

            </div>
    </div>
</div>
</section>

@endsection