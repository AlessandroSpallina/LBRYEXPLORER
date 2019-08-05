@extends('minimalUI.blank')

@section('icon', 'pe-7s-gift')
@section('title', 'Welcome, this is the LBRY BlockExplorer')
@section('description', 'LBRY is a secure, open, and community-run digital marketplace.')



@section('content')
<div class="row">
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Block Height</div>
                    <div class="widget-subheading">Number of mined blocks</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>600k</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Difficulty</div>
                    <div class="widget-subheading">*what diff is*</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>903711020722.66</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
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
@endsection
