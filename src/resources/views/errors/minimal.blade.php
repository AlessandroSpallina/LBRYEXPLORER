<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="Check LBRY.com">
        <meta name="msapplication-tap-highlight" content="no">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 10vh;
                margin: 0;
            }

            .full-height {
                height: 80vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
        </style>
        <link href="{!! asset('css/main.css') !!}" rel="stylesheet">
    </head>
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            <div class="app-header header-shadow">
                <div class="app-header__logo">
                    <div class="logo-src font-weight-bold">L B R Y E X P L O R E R</div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu"></div>
                <div class="app-header__content"></div>
            </div>
            <div class="app-main">
                    <div class="app-sidebar sidebar-shadow">
                        <div class="app-header__logo">
                            <div class="logo-src"></div>
                            <div class="header__pane ml-auto">
                                <div>
                                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="app-header__mobile-menu">
                            <div>
                                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="app-header__menu">
                            <span>
                                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                    <span class="btn-icon-wrapper">
                                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                                    </span>
                                </button>
                            </span>
                        </div>
                        <div class="scrollbar-sidebar">
                            <div class="app-sidebar__inner">
                                <ul class="vertical-nav-menu">
                                    <li class="app-sidebar__heading"></li>
                                    <li>
                                        <a href="/" class="mm-active">
                                            <i class="metismenu-icon pe-7s-rocket"></i>
                                            Home
                                        </a>
                                    </li>
                                    <li class="app-sidebar__heading">Blockchain</li>
                                    <li>
                                        <a href="{{ route('blocks') }}">
                                            <i class="metismenu-icon pe-7s-star"></i>
                                            Blocks
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="metismenu-icon pe-7s-diamond"></i>
                                            Transactions
                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                          <li>
                                            <a href="{{ route('transactions') }}">
                                              <i class="metismenu-icon"></i>
                                              Mined
                                            </a>
                                          </li>
                                          <li>
                                            <a href="{{ route('transactions_mempool') }}">
                                              <i class="metismenu-icon"></i>
                                              Mempool
                                            </a>
                                          </li>
                                        </ul>
                                    </li>
                                    <li class="app-sidebar__heading">Claimtrie</li>
                                    <li>
                                        <a href="{{ route('claims') }}">
                                            <i class="metismenu-icon pe-7s-airplay"></i>
                                            Claims
                                        </a>
                                    </li>
                                    <li class="app-sidebar__heading">Search</li>
                                    <li>
                                      <form method="GET" action="/search">
                                        @csrf
                                        <div class="input-group">
                                          <input name="q" type="text" class="form-control form-control-sm" placeholder="block/address/hash/claims">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary btn-sm"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                      </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="app-main__outer">
                        <div class="app-main__inner">
                            <div class="flex-center position-ref full-height">
                                <div class="code">
                                    @yield('code')
                                </div>

                                <div class="message" style="padding: 10px;">
                                    @yield('message')
                                </div>
                            </div>
                        </div>
                        <div class="app-wrapper-footer">
                            <div class="app-footer">
                                <div class="app-footer__inner">
                                    <div class="app-footer-left">
                                        <ul class="nav">
                                            <li class="nav-item">
                                                <a href="https://lbry.com" class="nav-link">
                                                    Get LBRY
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="https://lbry.tech" class="nav-link">
                                                    LBRY Tech
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="app-footer-right">
                                        <ul class="nav">
                                            <li class="nav-item">
                                                <a href="https://github.com/AlessandroSpallina/LBRYexplorer/issues" class="nav-link">
                                                    Found a bug? Open an issue!
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <div class="navbar-text text-muted">Page took {{ number_format((microtime(true) - LARAVEL_START), 3) }} s</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
        <script type="text/javascript" src="{!! asset('js/main.js') !!}"></script>
      </body>



</html>
