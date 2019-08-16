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

@section('icon', 'pe-7s-diamond')
@section('title', 'LBRY Transactions')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="main-card mb-3 card">
      <div class="card-body table-wrapper-scroll-y my-custom-scrollbar">
        <h5 class="card-title">Mined Transactions</h5>
        <table class="mb-0 table table-hover table-striped">
          <thead>
            <tr>
              <th>Hash</th>
              <th>Timestamp</th>
              <th>Value</th>
              <th>Inputs</th>
              <th>Outputs</th>
              <th>Size</th>
              <th>Fee</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transactions as $transaction)
              <tr>
                <th scope="row"><a href="{{ route('transactions', $transaction->hash) }}">{{ substr($transaction->hash, 0, 10) }}..</a></th>
                <td>{{ $transaction->transaction_time }}</td>
                <td>{{ $transaction->value }} LBC</td>
                <td>{{ $transaction->input_count }}</td>
                <td>{{ $transaction->output_count }}</td>
                <td>{{ $transaction->transaction_size }} kB</td>
                <td>{{ $transaction->fee }} LBC</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer table-wrapper-scroll-y my-custom-scrollbar">
          <div class="pagination center">
            {{ $transactions->links() }}
          </div>
      </div>
    </div>
  </div>
</div>

@endsection
