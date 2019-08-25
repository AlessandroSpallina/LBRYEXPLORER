<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>LBRY BlockExplorer - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Check LBRY.com">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    @stack('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet"> <!-- template import -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">  laravel import -->
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
                                    @if(Route::currentRouteName() === 'home')
                                      <a href="/" class="mm-active">
                                    @else
                                      <a href="/">
                                    @endif
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Blockchain</li>
                                <li>
                                    @if(Route::currentRouteName() === 'blocks')
                                      <a href="{{ route('blocks') }}" class="mm-active">
                                    @else
                                      <a href="{{ route('blocks') }}">
                                    @endif
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
                                          @if(Route::currentRouteName() === 'transactions')
                                            <a href="{{ route('transactions') }}" class="mm-active">
                                          @else
                                            <a href="{{ route('transactions') }}">
                                          @endif
                                              <i class="metismenu-icon"></i>
                                              Mined
                                          </a>
                                      </li>
                                      <li>
                                          @if(Route::currentRouteName() === 'transactions_mempool')
                                            <a href="{{ route('transactions_mempool') }}" class="mm-active">
                                          @else
                                            <a href="{{ route('transactions_mempool') }}">
                                          @endif
                                              <i class="metismenu-icon"></i>
                                          Mempool
                                        </a>
                                      </li>
                                    </ul>
                                </li>
                                <li class="app-sidebar__heading">Claimtrie</li>
                                <li>
                                    @if(Route::currentRouteName() === 'claims')
                                      <a href="{{ route('claims') }}" class="mm-active" onclick="return false;">
                                    @else
                                      <a href="{{ route('claims') }}" onclick="return false;">
                                    @endif
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
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="@yield('icon') icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>@yield('title')
                                        <div class="page-title-subheading">@yield('description')
                                        </div>
                                        <div class="page-title-subheading">
                                          <a href="https://lbry.com/get">
                                              Download the app!
                                          </a>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="page-title-actions">
                                    <button type="button" data-toggle="tooltip" title="@yield('tooltip')" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                        <i class="fa fa-star"></i>
                                    </button>
                                </div>-->
                              </div>
                        </div>
                        @yield('content')
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
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script> <!-- template import -->
    @stack('script')
  </body>
</html>
