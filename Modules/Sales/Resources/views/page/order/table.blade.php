<br>
<header class="panel-heading">
    <h2 class="panel-title text-right">Tabel Status Pengiriman</h2>
</header>
<table id="transaction" class="table table-no-more table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-left col-md-1">Tanggal</th>
            <th class="text-left col-md-2">Cabang</th>
            <th class="text-left col-md-2">Lokasi Area</th>
            <th class="text-right col-md-1">Deskripsi</th>
            <th class="text-right col-md-1">Status</th>
            <th class="text-right col-md-1">Lokasi</th>
            <th id="action" class="text-center col-md-1">Hapus</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($delivery as $item)
        <tr>
            <td data-title="Tanggal">
                {{ $item->so_delivery_date }}
            </td>
            <td data-title="Branch">
                {{ $item->location->warehouse->branch->inventory_branch_name ?? '' }}
            </td>
            <td data-title="Area">
                @php
                    $area = $item->location->warehouse->branch->area ?? null;
                @endphp
                {{ $area->rajaongkir_area_province_name ?? '' }} - {{ $area->rajaongkir_area_city_name ?? '' }} - {{ $area->rajaongkir_area_name ?? '' }}
            </td>
            <td data-title="Deskripsi">
                <p class="text-right">
                    {{ $item->so_delivery_description }}
                </p>
            </td>
            <td data-title="Status">
                <p class="text-right">
                    {{ $item->so_delivery_type == 'IN' ? 'Barang Masuk' : 'Barang Keluar' }}
                </p>
            </td>
            <td data-title="Lokasi">
                <p class="text-right">
                    {{ $item->location->inventory_location_name ?? '' }}
                </p>
            </td>
            <td data-title="Action">
                <a id="delete" value="{{ $item->so_delivery_id }}"
                    href="{{ route(config('module').'_delete', ['code' => $item->so_delivery_order, 'detail' => $item->so_delivery_id ]) }}"
                    class="btn btn-danger btn-xs btn-block delete">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>