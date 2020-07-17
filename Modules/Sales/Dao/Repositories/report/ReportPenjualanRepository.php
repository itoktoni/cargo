<?php

namespace Modules\Sales\Dao\Repositories\report;

use Plugin\Notes;
use Plugin\Helper;
use Illuminate\Support\Facades\DB;
use Modules\Sales\Dao\Models\Order;
use App\Dao\Interfaces\MasterInterface;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Modules\Sales\Dao\Repositories\OrderRepository;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class ReportPenjualanRepository extends Order implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting
{
    public function headings(): array
    {
        return [
            'No Order',
            'No Resi',
            'Nama Cabang',
            'Tanggal',
            'Nama Pengirim',
            'Telp Pengirim',
            'Nama Penerima',
            'Telp Penerima',
            'Koli',
            'Katagori',
            'Nama Paket',
            'Pembayaran',
            'Harga',
            'Tambahan Harga',
            'Keterangan Tambahan',
            'Nama Diskon',
            'Harga Diskon',
            'Total Order',
        ];
    }

    public function collection()
    {
        $model = new OrderRepository();
        $query = $model->dataRepository(['sales_order_id', 'sales_order_rajaongkir_waybill','inventory_branch_name','sales_order_date', 'sales_order_rajaongkir_from_name', 'sales_order_rajaongkir_from_phone', 'sales_order_rajaongkir_to_name', 'sales_order_rajaongkir_to_phone',  'sales_order_rajaongkir_colli', 'sales_category_name' ,'rajaongkir_paket_name', 'finance_top_name' ,'sales_order_rajaongkir_cost_value', 'sales_order_rajaongkir_cost_additional', 'sales_order_rajaongkir_cost_description', 'sales_order_marketing_promo_description',  'sales_order_marketing_promo_value', 'sales_order_rajaongkir_cost_total']);
        if ($from = request()->get('from')) {
            $query->where('sales_order_date', '>=', $from);
        }
        if ($to = request()->get('to')) {
            $query->where('sales_order_date', '<=', $to);
        }
        if ($branch = request()->get('branch')) {
            $query->where('sales_order_inventory_branch_id', $branch);
        }
        if ($status = request()->get('status')) {
            $query->where('sales_order_status', $status);
        }
        return $query->get();
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_DATETIME,
            'H' => NumberFormat::FORMAT_NUMBER,
            'L' => NumberFormat::FORMAT_NUMBER,
            'M' => NumberFormat::FORMAT_NUMBER,
            'O' => NumberFormat::FORMAT_NUMBER,
            'P' => NumberFormat::FORMAT_NUMBER,
            'Q' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}
