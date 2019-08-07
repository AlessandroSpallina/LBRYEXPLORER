@extends('minimalUI.blank')

@push('styles')
<style>
  .my-custom-scrollbar {
    position: relative;
    height: 445px;
    overflow: auto;
  }

  .table-wrapper-scroll-y {
    display: block;
  }

</style>
@endpush

@section('icon', 'pe-7s-star')
@section('title', 'LBRY Block #'.$block->height)



@section('content')

<div class="row">
  <div class="col-lg-5 mb-4 mb-lg-0">
    <div class="main-card mb-3 card">
      <div class="card-header">Overview</div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6 mb-2">
              <div class="text-primary">Block Size</div>
                {{ $block->block_size }} kB
            </div>
            <div class="col-lg-6 mb-2">
              <div class="text-primary">Block Time</div>
                {{ $block->block_time }} UTC
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-2">
              <div class="text-primary">Bits</div>
                {{ $block->bits }}
            </div>
            <div class="col-lg-6 mb-2">
              <div class="text-primary">Confirmations</div>
                {{ $block->confirmations }}
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-2">
              <div class="text-primary">Difficulty</div>
                {{ $block->difficulty }}
            </div>
            <div class="col-lg-6 mb-2">
              <div class="text-primary">Nonce</div>
                {{ $block->nonce }}
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="text-primary">Chainwork</div>
                {{ $block->chainwork }}
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="text-primary">Merkle Root</div>
                {{ $block->merkle_root }}
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="text-primary">Name Claim Root</div>
                {{ $block->name_claim_root }}
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mb-2">
              <div class="text-primary">Version</div>
                {{ $block->version }}
            </div>
          </div>
        </div>
    </div>
  </div>
  <div class="col-lg-7 mb-4 mb-lg-0">
    <div class="main-card mb-3 card">
        <div class="card-body table-wrapper-scroll-y my-custom-scrollbar">
          <h5 class="card-title">Block Transactions</h5>
            <table class="mb-0 table table-hover">
                <thead>
                <tr>
                    <th>Hash</th>
                    <th>Inputs</th>
                    <th>Outputs</th>
                    <th>Value</th>
                    <th>Size</th>
                    <th>Fee</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($transactions as $transaction)
                    <tr>
                      <td scope="row"><a href="{{ route('transactions', $transaction->hash) }}">{{ substr($transaction->hash, 0, 10) }}..</a></td>
                      <td>{{ $transaction->input_count }}</td>
                      <td>{{ $transaction->output_count }}</td>
                      <td>{{ $transaction->value }} LBC</td>
                      <td>{{ $transaction->transaction_size }} kB</td>
                      <td>{{ $transaction->fee }} LBC</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
  </div>



@endsection
