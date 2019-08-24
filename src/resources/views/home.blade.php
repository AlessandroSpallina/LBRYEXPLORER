@extends('minimalUI.blank')

@push('styles')
<style>
  .my-custom-scrollbar {
    position: relative;
    height: 350px;
    overflow: auto;
  }

  .table-wrapper-scroll-y {
    display: block;
  }
</style>
@endpush

@section('icon', 'pe-7s-rocket')
@section('title', 'Welcome, this is the LBRY BlockExplorer')
@section('description', 'LBRY is a secure, open, and community-run digital marketplace.')

@section('content')
<div class="container mb-4">
  <form method="GET" action="/search">
    @csrf
    <div class="input-group">
      <input name="q" type="text" class="form-control form-control-lg" placeholder="Search block / address / hash / claim name">
        <div class="input-group-append">
            <button class="btn btn-primary">Search</button>
        </div>
    </div>
  </form>
</div>

<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-plum-plate">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Block Height</div>
                    <div class="widget-subheading">Number of mined blocks</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>{{ $blocks[0]->height }}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Difficulty</div>
                    <div class="widget-subheading">To find a hash below a given target</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>{{ number_format($blocks[0]->difficulty) }}</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-premium-dark">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Network Hashrate</div>
                    <div class="widget-subheading">*what hashrate is*</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>392766.87 GH/s</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="app">
  <charts></charts>
</div>

<div class="row">
  <div class="col-lg-6 mb-4 mb-lg-0">
    <div class="main-card mb-3 card">
        <div class="card-body table-wrapper-scroll-y my-custom-scrollbar">
          <h5 class="card-title">Latest Blocks</h5>
            <table class="mb-0 table table-hover">
                <thead>
                <tr>
                    <th>Height</th>
                    <th>Age</th>
                    <th>Transactions</th>
                    <th>Size</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($blocks as $block)
                    <tr>
                      <td scope="row"><a href="{{ route('blocks', $block->height) }}">{{ $block->height }}</a></td>
                      <td>{{ $block->age }} minutes ago</td>
                      <td>{{ $block->transactions }} txs</td>
                      <td>{{ $block->block_size }} kB</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
          <a class="mb-2 mr-2 btn btn-outline-primary btn-sm btn-block" href="{{ route('blocks') }}">See all blocks</a>
        </div>
    </div>
  </div>
  <div class="col-lg-6 mb-4 mb-lg-0">
    <div class="main-card mb-3 card">
        <div class="card-body table-wrapper-scroll-y my-custom-scrollbar">
          <h5 class="card-title">Latest Transactions</h5>
            <table class="mb-0 table table-hover">
                <thead>
                <tr>
                    <th>Hash</th>
                    <th>Age</th>
                    <th>Value</th>
                    <th>Fee</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($transactions as $transaction)
                    <tr>
                      <td scope="row"><a href="{{ route('transactions', $transaction->hash) }}">{{ substr($transaction->hash, 0, 7) }}..</a></td>
                      <td>{{ $transaction->age }} minutes ago</td>
                      <td>{{ $transaction->value }} LBC</td>
                      <td>{{ $transaction->fee }} LBC</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
          <a class="mb-2 mr-2 btn btn-outline-primary btn-sm btn-block" href="{{ route('transactions') }}">See all transactions</a>
        </div>
    </div>
  </div>
</div>
@endsection

@push('script')
  <script src="{{ asset('js/app.js') }}" defer></script>
@endpush
