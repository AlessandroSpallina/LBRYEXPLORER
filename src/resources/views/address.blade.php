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

@section('icon', 'pe-7s-wallet')
@section('title', 'LBRY Address '.$address->address)

@section('content')

<div class="row">
  <div class="col-lg-12 mb-4 mb-lg-0">
    <div class="main-card mb-3 card">
      <div class="no-gutters row">
        <div class="col-md-3">
          <div class="pt-0 pb-0 card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="widget-content p-0">
                  <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                      <div class="widget-content-left">
                        <div class="widget-heading">Balance</div>
                      </div>
                      <div class="widget-content-right">
                        <div class="widget-numbers">{{ $address->balance }}</div>
                        <div class="widget-subheading">LBC</div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="pt-0 pb-0 card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="widget-content p-0">
                  <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                      <div class="widget-content-left">
                        <div class="widget-heading">Value</div>
                      </div>
                      <div class="widget-content-right">
                        <div class="widget-numbers">$ {{ $address->balance * 0.015 }}</div>
                        <div class="widget-subheading">@ $0.015/LBC</div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="pt-0 pb-0 card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="widget-content p-0">
                  <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                      <div class="widget-content-left">
                        <div class="widget-heading">Received</div>
                      </div>
                      <div class="widget-content-right">
                        <div class="widget-numbers">{{ $address->total_received }}</div>
                        <div class="widget-subheading">LBC</div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="pt-0 pb-0 card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="widget-content p-0">
                  <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                      <div class="widget-content-left">
                        <div class="widget-heading">Sent</div>
                      </div>
                      <div class="widget-content-right">
                        <div class="widget-numbers">{{ $address->total_sent }}</div>
                        <div class="widget-subheading">LBC</div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="main-card mb-3 card">
      <div class="card-body table-wrapper-scroll-y my-custom-scrollbar">
        <h5 class="card-title">Transactions</h5>
        <table class="mb-0 table table-hover table-striped">
          <thead>
            <tr>
              <th>Height</th>
              <th>Transaction Hash</th>
              <th>Timestamp</th>
              <th>Inputs</th>
              <th>Outputs</th>
              <th>Size</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transactions as $transaction)
              <tr>
                <th scope="row"><a href="{{ route('blocks', $transaction->height) }}">{{ $transaction->height }}</a></th>
                <td><a href="{{ route('transactions', $transaction->hash) }}">{{ substr($transaction->hash, 0, 15) }}..</a></td>
                <td>{{ $transaction->transaction_time }} UTC</td>
                <td>{{ $transaction->input_count }}</td>
                <td>{{ $transaction->output_count }}</td>
                <td>{{ $transaction->transaction_size }} kB</td>
                @if ($transaction->credit_amount > 0)
                  <td class="text-success font-weight-bold">+{{ $transaction->credit_amount }} LBC</td>
                @else
                  <td class="text-danger font-weight-bold">-{{ $transaction->debit_amount }} LBC</td>
                @endif
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
