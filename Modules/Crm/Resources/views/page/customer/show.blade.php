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
                                <td class="col-md-2">Category</td>
                                <td>{{ $model->category->crm_category_name ?? ''}}</td>
                            </tr>
                            @foreach($fields as $item => $value)
                            <tr>
                                <th class="col-lg-2">{{ $value }}</th>
                                <td>{{ $model->$item }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="col-ld-2">Area</td>
                                <td>
                                    {{ $model->area->rajaongkir_area_province_name ?? '' }} -
                                    {{ $model->area->rajaongkir_area_city_name ?? '' }} -
                                    {{ $model->area->rajaongkir_area_name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $model->crm_customer_address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            @include($template_action)

        </div>
    </div>

</div>

@endsection