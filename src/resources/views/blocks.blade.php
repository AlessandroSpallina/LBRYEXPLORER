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
              <th>Difficulty
                <span class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="Percentages indicate changes in difficulty from the previous block"></span>
              </th>
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
                <td>
                  @if ($block->difficulty_diff_percent > 0)
                    [<i class="fa fa-caret-up icon-gradient bg-success"></i> +{{ $block->difficulty_diff_percent }}%]
                  @elseif ($block->difficulty_diff_percent < 0)
                    [<i class="fa fa-caret-down icon-gradient bg-danger"></i> {{ $block->difficulty_diff_percent }}%]
                  @endif
                  {{ number_format($block->difficulty) }}
                </td>
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
