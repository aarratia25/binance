@extends('layouts.app')

@section('content')
<div class="content">
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">Transacciones</h3>
      </div>
      <div class="block-content">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-vcenter">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Plan</th>
                <th class="text-center">Usuario</th>
                <th class="text-center" style="width: 15%;">Comprobante</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $item)
                <tr>
                    <td class="text-center">
                        {{ $item->id }}
                      </td>

                    <td class="text-center">
                      #{{ $item->plan_id }}
                    </td>

                    <td class="text-center">
                        {{ $item->user->name }}
                    </td>

                    <td class="text-center">
                        <a href="{{ url('storage/screenshots', $item->screenshot) }}" target="_blank">
                            <img src="{{ url('storage/screenshots', $item->screenshot) }}" style="width: 20%">
                        </a>
                    </td>

                    <td class="text-center">
                        {{ $item->user->complete ? 'Completo' : 'Pendiente' }}
                    </td>

                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
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



