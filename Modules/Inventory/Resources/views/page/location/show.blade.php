@extends(Helper::setExtendBackend())
@section('content')
<div class="row">
    <div class="panel-body">
        <div class="panel panel-default">
            <header class="panel-heading">
                <h2 class="panel-title">{{ ucwords(str_replace('_',' ',$template)) }} : {{ $model->$key }}</h2>
            </header>

            <div class="panel-body line">
                <div class="show">
                    <table class="table table-table table-bordered table-striped table-hover mb-none">
                        <tbody>
                            <tr>
                                <td class="col-md-2">Warehouse</td>
                                <td>{{ $model->warehouse->inventory_warehouse_name ?? ''}}</td>
                            </tr>
                            @foreach($fields as $item => $value)
                            <tr>
                                <th class="col-lg-2">{{ $value }}</th>
                                <td>{{ $model->$item }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <hr>

                <table id="transaction" class="table table-no-more table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-left col-md-1">Nomer Order</th>
                            <th class="text-left col-md-1">Tanggal</th>
                            <th class="text-right col-md-1">User</th>
                            <th class="text-right col-md-4">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($model->order))
                        @foreach ($model->order->where('so_delivery_branch', Auth::user()->branch)->where('so_delivery_type', 'IN') as $item)
                        <tr>
                            <td data-title="Nomer Order">
                                {{ $item->so_delivery_order}}
                            </td>
                            <td data-title="Tanggal">
                                {{ $item->so_delivery_created_at}}
                            </td>
                            <td data-title="User" class="text-right col-lg-1">
                                {{ $item->so_delivery_created_by}}
                            </td>
                            <td data-title="Description" class="text-right col-lg-8">
                                {{ $item->so_delivery_description}}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>

            </div>

            @include($template_action)

        </div>
    </div>

</div>

@endsection