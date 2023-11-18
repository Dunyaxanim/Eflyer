<!-- header top section start -->
         <!-- logo section start -->
         
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           @foreach($customMenu as $key => $value)
                              <li><a href="{{ $value['link'] }}">{{ $value['name'] }}</a></li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="index.html"><img src="{{asset('project/front/images/logo.png') }}"></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="index.html">Home</a>
                     <a href="fashion.html">Fashion</a>
                     <a href="electronic.html">Electronic</a>
                     <a href="jewellery.html">Jewellery</a>
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="{{asset('project/front/images/toggle-icon.png') }}"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('public.allCategories')
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if($category !== null)
                        @foreach($category as $key => $value)
                           <a class="dropdown-item" href="#">{{ $value['name'] }}</a>
                        @endforeach
                        @endif
                     </div>
                  </div>
                  <div class="main">
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="@lang('public.searchBlog')">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                     <div class="lang_box ">
                        <a href="locale/en" title="Language" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                           <i class="fa fa-angle-down" aria-hidden="true">@lang('public.language')</i>
                        </a>
                        <div class="dropdown-menu">
                           <a href="locale/tr" class="dropdown-item">@lang('public.turkish')</a>
                           <a href="locale/en" class="dropdown-item">@lang('public.english')</a>
                        </div>
                     </div>
                     <div class="login_menu">
                        <ul>
                           <li><a href="#">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">@lang('public.basket')</span></a>
                           </li>
                           <li><a href="#">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">@lang('public.cart')</span></a>
                           </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item ml-4 text-dark ">
                                    <a  href="{{ route('login') }}" class="text-dark p-1">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register')) 
                                <li class="nav-item text-dark ">
                                    <a href="{{ route('register') }}" class="text-dark p-1 ">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                           <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 {{ Auth::user()->name }}
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                 <a class="dropdown-item" type="button">@lang('public.profil')</a>
                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                 </form>
                              </div>
                           </div>
                        @endguest
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->