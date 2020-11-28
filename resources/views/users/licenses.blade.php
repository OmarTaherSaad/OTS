@extends('layouts.app')
@section('title','My Licenses')
@section('head')
<style>
    .fit-content {
        white-space: nowrap;
        width: 1%;
    }

</style>
@endsection
@section('content')
{{-- Licenses --}}
<div class="row">
    <div class="col-12">
        <h2>My Current Licenses</h2>
    </div>
</div>
<div class="row">
    <h4 class="d-block d-lg-none">You can move right & left inside the table to see more.</h4>
    <div class="col-12 table-responsive">
        <table class="table table-light table-bordered table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="align-middle">Product</th>
                    <th class="align-middle">Serial Number</th>
                    <th class="align-middle">Special Code for Hardware ID</th>
                    <th class="align-middle">Hardware ID</th>
                    <th class="align-middle">Expiration Date</th>
                    <th class="align-middle">Purchase Date</th>
                    <th class="align-middle">Download</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($licenses as $lic)
                <tr>
                    <td class="fit-content"><a href="{{ $lic->product->getLinkToView() }}">{{ $lic->product->name }}</a>
                    </td>
                    <td>{{ $lic->serial }}</td>
                    <td>{{ $lic->hwid_salt }}</td>
                    <td>{{ $lic->hwid }}</td>
                    <td>{{ $lic->expiry_date->toFormattedDateString() }}</td>
                    <td>{{ $lic->created_at->toFormattedDateString() }}</td>
                    <td>
                        @can('download',$lic->product)
                        <div class="btn-group" role="group" aria-label="Controls">
                            <a href="{{ $lic->product->getLinkToDownload() }}" class="btn btn-info" target="_blank">
                                <i class="fas fa-download"></i>
                                &nbsp;
                                Download</a>
                        </div>
                        @else
                        Not Downloadable.
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No Active Licenses</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-auto">
        {!! $licenses->links() !!}
    </div>
</div>
<hr>
{{-- Pending Licenses --}}
<div class="row">
    <div class="col-12">
        <h2>My Pending Licenses (Activation on your end is needed)</h2>
    </div>
</div>
<div class="row">
    <h4 class="d-block d-lg-none">You can move right & left inside the table to see more.</h4>
    <div class="col-12 table-responsive">
        <table class="table table-light table-bordered table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="align-middle">Product</th>
                    <th class="align-middle">License Period</th>
                    <th class="align-middle">License Count</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pending_licenses as $lic)
                @if(!$lic->isPaid)
                @continue
                @endif
                <tr>
                    <td class="fit-content"><a href="{{ $lic->product->getLinkToView() }}">{{ $lic->product->name }}</a>
                    </td>
                    <td>{{ $lic->period_written }}</td>
                    <td>{{ $lic->license_count }}</td>
                    <td>
                        @if($lic->product->isFrom('nanocad'))
                        Wait for activation from our end.
                        @else
                        <a href="{{ route('license.set-hwid',$lic) }}" class="btn btn-primary">Activate License</a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No Pending Licenses</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-auto">
        {!! $pending_licenses->links() !!}
    </div>
</div>

{{-- Trials --}}
<div class="row">
    <div class="col-12">
        <h2>My Trials</h2>
    </div>
</div>
<div class="row">
    <h4 class="d-block d-lg-none">You can move right & left inside the table to see more.</h4>
    <div class="col-12 table-responsive">
        <table class="table table-light table-bordered table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="align-middle">Product</th>
                    <th class="align-middle">Serial Number</th>
                    <th class="align-middle">Custom Password for Hardware ID</th>
                    <th class="align-middle">Hardware ID</th>
                    <th class="align-middle">Expiration Date</th>
                    <th class="align-middle">Start Date</th>
                    <th class="align-middle">Download</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($trials as $lic)
                <tr>
                    <td class="fit-content"><a href="{{ $lic->product->getLinkToView() }}">{{ $lic->product->name }}</a>
                    </td>
                    <td>{{ $lic->serial }}</td>
                    <td>{{ $lic->hwid_salt }}</td>
                    <td>{{ $lic->hwid }}</td>
                    <td>{{ $lic->expiry_date->toFormattedDateString() }}</td>
                    <td>{{ $lic->created_at->toFormattedDateString() }}</td>
                    <td>
                        @can('download',$lic->product)
                        <div class="btn-group" role="group" aria-label="Controls">
                            <a href="{{ $lic->product->getLinkToDownload() }}" class="btn btn-info" target="_blank">
                                <i class="fas fa-download"></i>
                                &nbsp;
                                Download</a>
                        </div>
                        @else
                        Not Downloadable.
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No Trials</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
{{-- Expired Licenses --}}
<div class="row">
    <div class="col-12">
        <h2>My Expired Licenses</h2>
    </div>
</div>
<div class="row">
    <h4 class="d-block d-lg-none">You can move right & left inside the table to see more.</h4>
    <div class="col-12 table-responsive">
        <table class="table table-light table-bordered table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th class="align-middle">Product</th>
                    <th class="align-middle">Serial Number</th>
                    <th class="align-middle">Custom Password for Hardware ID</th>
                    <th class="align-middle">Hardware ID</th>
                    <th class="align-middle">Expiration Date</th>
                    <th class="align-middle">Purchase Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($expired_licenses as $lic)
                <tr>
                    <td class="fit-content"><a href="{{ $lic->product->getLinkToView() }}">{{ $lic->product->name }}</a>
                    </td>
                    <td>{{ $lic->serial }}</td>
                    <td>{{ $lic->hwid_salt }}</td>
                    <td>{{ $lic->hwid }}</td>
                    <td>{{ $lic->expiry_date->toFormattedDateString() }}</td>
                    <td>{{ $lic->created_at->toFormattedDateString() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No Expired Licenses</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-auto">
        {!! $expired_licenses->links() !!}
    </div>
</div>
@endsection
