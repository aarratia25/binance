@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        @foreach ($planes as $item)
            <div class="col-md-6 col-xl-4">
                <div class="block block-rounded {{ helper()->activePlan($item->id) ? 'active-plan' : '' }}">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <a href="{{ route('plan', $item->id) }}">
                                {{ $item->name }}
                            </a>
                        </h3>
                    </div>
                    <div class="block-content">
                        <p>Desde ${{ $item->price }} Hasta ${{ $item->price_max }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
