@extends('layouts.app')

@section('content')
<div class="content">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">Click de Usuarios</h3>
      </div>
      <div class="block-content">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-vcenter">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Usuario</th>
                <th class="text-center">Plan</th>
                <th class="text-center">Click</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($events as $item)
                <tr>
                    <td class="text-center">
                        {{ $item->id }}
                    </td>

                    <td class="text-center">
                        {{ $item->user->name }}
                    </td>

                    <td class="text-center">
                        {{ $item->plan->name }}
                    </td>

                    <td class="text-center">
                        {{ Carbon\Carbon::parse($item->click)->diffForHumans() }}
                    </td>

                    <td class="text-center">
                        {{ $item->date }}
                    </td>

                    <td class="text-center">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
                            <i class="fa fa-check"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- END Full Table -->
  </div>
@endsection



