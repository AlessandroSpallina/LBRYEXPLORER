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

@section('icon', 'pe-7s-diamond')
@section('title', 'LBRY Transaction '.$transaction->hash)

@section('content')

<div class="row">
  <div class="col-lg-4 mb-4 mb-lg-0">

    <div class="main-card mb-3 card">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                  <div class="widget-content p-0">
                      <div class="widget-content-outer">
                          <div class="widget-content-wrapper">
                              <div class="widget-content-left">
                                  <div class="text-primary">Time Created</div>
                              </div>
                              <div class="widget-content-right">
                                  <div class="">{{ $transaction->created_at }}</div>
                              </div>
                          </div>
                      </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="widget-content p-0">
                      <div class="widget-content-outer">
                          <div class="widget-content-wrapper">
                              <div class="widget-content-left">
                                  <div class="text-primary">Block Time</div>
                              </div>
                              <div class="widget-content-right">
                                  <div class="">
                                    @if ($transaction->block_hash_id != 'MEMPOOL')
                                      {{ $transaction->created_time }}
                                    @else
                                      MEMPOOL
                                    @endif
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </li>
                @if ($transaction->block_hash_id != 'MEMPOOL')
                  <li class="list-group-item">
                    <div class="widget-content p-0">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                  <div class="text-primary">Block Height</div>
                                </div>
                                <div class="widget-content-right font-weight-bold">
                                    <a class="" href="{{ route('blocks', $transaction->block_height) }}">{{ $transaction->block_height }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="widget-content p-0">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                  <div class="text-primary">Confirmations</div>
                                </div>
                                <div class="widget-content-right font-weight-bold">
                                    <div class="">{{ $transaction->confirmations }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </li>
                @endif
                <li class="list-group-item">
                  <div class="widget-content p-0">
                      <div class="widget-content-outer">
                          <div class="widget-content-wrapper">
                              <div class="widget-content-left">
                                  <div class="text-primary">Amount</div>
                              </div>
                              <div class="widget-content-right">
                                  <div class="widget-numbers text-success">{{ $transaction->value }} LBC</div>
                              </div>
                          </div>
                      </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="widget-content p-0">
                      <div class="widget-content-outer">
                          <div class="widget-content-wrapper">
                              <div class="widget-content-left">
                                  <div class="text-primary">Fee</div>
                              </div>
                              <div class="widget-content-right">
                                  <div class="widget-numbers text-danger">x LBC</div>
                              </div>
                          </div>
                      </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="widget-content p-0">
                      <div class="widget-content-outer">
                          <div class="widget-content-wrapper">
                              <div class="widget-content-left">
                                  <div class="text-primary">Size</div>
                              </div>
                              <div class="widget-content-right">
                                  <div class="">{{ $transaction->transaction_size }} kB</div>
                              </div>
                          </div>
                      </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="widget-content p-0">
                      <div class="widget-content-outer">
                          <div class="widget-content-wrapper">
                              <div class="widget-content-left">
                                  <div class="text-primary">Inputs</div>
                              </div>
                              <div class="widget-content-right">
                                  <div class="">{{ $transaction->input_count }}</div>
                              </div>
                          </div>
                      </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="widget-content p-0">
                      <div class="widget-content-outer">
                          <div class="widget-content-wrapper">
                              <div class="widget-content-left">
                                  <div class="text-primary">Outputs</div>
                              </div>
                              <div class="widget-content-right">
                                  <div class="">{{ $transaction->output_count }}</div>
                              </div>
                          </div>
                      </div>
                  </div>
                </li>
            </ul>
        </div>
    </div>



  </div>

  <div class="col-lg-8 mb-4 mb-lg-0">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <h5 class="card-title">Details</h5>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p></div>

        <div class="col-lg-4 mb-4 mb-lg-0">
          <div class="card-shadow-info border mb-3 card card-body border-info float-left">
            <h5 class="card-title">Info Card Shadow</h5>
            With supporting text below as a natural lead-in to additional content.
          </div>
        </div>

    </div>
  </div>

</div>

@endsection
