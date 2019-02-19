 <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="site-branding d-flex align-items-center">
                            {{--   @if(settings()->logo)
                            <a class="d-block" href="{{ route('frontend.index') }}" rel="home">
                                <img class="d-block" src="{{route('frontend.index')}}/img/site_logo/{{settings()->logo}}" alt="logo">
                            </a>
                            @else --}}
                             {{ link_to_route('frontend.index',app_name(), [], ['class' => 'navbar-brand']) }}
                           {{--  @endif --}}

                        </div><!-- .site-branding -->

                        <nav class="site-navigation d-flex justify-content-end align-items-center">
                            <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                <li class="current-menu-item"><a href="index.html">Home</a></li>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                @if ($logged_in_user)
                                <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard')) }}</li>
                                @endif
                                @if (! $logged_in_user)
                    <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}</li>

                    @if (config('access.users.registration'))
                        <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }}</li>
                    @endif
                @else
                        <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ $logged_in_user->name }} <span class="caret"></span>
                        </a>
                            @permission('view-backend')
                                <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                            @endauth
                            <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account')) }}</li>
                            <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                    </li>
                @endif
                            </ul>
                        </nav><!-- .site-navigation -->
                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .nav-bar -->