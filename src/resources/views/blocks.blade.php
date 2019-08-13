@extends('minimalUI.blank')

@push('styles')
<style>
  @media screen and (min-width: 1400px) {
    .pagination.center,
    .pagination.center ul {
      float: left;
      position: relative;
    }
    .pagination.center {
      left: 50%;
    }
    .pagination.center ul {
      left: -50%;
    }
  }
  .my-custom-scrollbar {
    position: relative;
    overflow: auto;
  }
  .table-wrapper-scroll-y {
    display: block;
  }
</style>
@endpush

@section('icon', 'pe-7s-star')
@section('title', 'LBRY Blocks')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="main-card mb-3 card">
      <div class="card-body table-wrapper-scroll-y my-custom-scrollbar">
        <h5 class="card-title">Mined Blocks</h5>
        <table class="mb-0 table table-hover table-striped">
          <thead>
            <tr>
              <th>Height</th>
              <th>Block Time</th>
              <th>Transactions</th>
              <th>Size</th>
              <th>Nonce</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($blocks as $block)
              <tr>
                <th scope="row"><a href="{{ route('blocks', $block->height) }}">{{ $block->height }}</a></th>
                <td>{{ $block->block_time }}</td>
                <td>{{ $block->transactions }} txs</td>
                <td>{{ $block->block_size }} kB</td>
                <td>{{ $block->nonce }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer table-wrapper-scroll-y my-custom-scrollbar">
          <div class="pagination center">
            {{ $blocks->links() }}
          </div>
      </div>
    </div>
  </div>
</div>

@endsection
