<header class="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-2">
          <div class="header__logo">
            <a href="/">
              <img src="img/logo.png" alt="" />
            </a>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="header__nav">
            <nav class="header__menu mobile-menu">
              <ul>
                <li class="active"><a href="/">Homepage</a></li>
                <li>
                  <a>Categories <span class="arrow_carrot-down"></span></a>
                  <ul class="dropdown">
                    <li><a href="{{ route('show.all', ['category' => 'trending']) }}">Trending</a></li>
                    <li><a href="{{ route('show.all', ['category' => 'favourites']) }}">Favourites</a></li>
                    <li><a href="{{ route('show.all', ['category' => 'popular']) }}">Popular</a></li>
                  </ul>
                </li>
                <li><a href="#">My Anime</a></li>
                <li><a href="#">Contacts</a></li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="header__right">
            <a href="#" class="search-switch"><span class="icon_search"></span></a>
            <a href="#"><span class="icon_profile"></span></a>
          </div>
        </div>
      </div>
      <div id="mobile-menu-wrap"></div>
    </div>
  </header>