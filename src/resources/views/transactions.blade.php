@extends('minimalUI.blank')

@push('styles')
<style>
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
</style>
@endpush

@section('icon', 'pe-7s-diamond')
@section('title', 'LBRY Transactions')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <h5 class="card-title">Mined Transactions</h5>
        <table class="mb-0 table table-hover table-striped">
          <thead>
            <tr>
              <th>Hash</th>
              <th>Block Time</th>
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
      <div class="card-footer">
          <div class="pagination center">
            {{ $transactions->links() }}
          </div>
      </div>
    </div>
  </div>
</div>

@endsection
