@extends('minimalUI.blank')

@section('icon', 'pe-7s-wallet')
@section('title', 'LBRY address '.$address->address)

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
                        <div class="widget-numbers">{{ $address->balance }} LBC</div>
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
                        <div class="widget-numbers">${{ $address->balance * 0.015 }}</div>
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
                        <div class="widget-subheading"></div>
                      </div>
                      <div class="widget-content-right">
                        <div class="widget-numbers text-success"> {{  }} </div>
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
                        <div class="widget-subheading"></div>
                      </div>
                      <div class="widget-content-right">
                        <div class="widget-numbers text-success">$ x.x (@ $y.y/LBC) </div>
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
            @foreach ($transactions as $transaction)
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
