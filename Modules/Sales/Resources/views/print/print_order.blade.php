<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        body {
            margin: 10px;
        }

        table#border {
            border: 0.5px solid grey;
        }

        .print-only {
            display: none !important
        }

        * {
            background: transparent !important;
            color: black !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            text-shadow: none !important;
            -webkit-filter: none !important;
            filter: none !important;
            -ms-filter: none !important
        }

        *,
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        a,
        a:visited {
            text-decoration: underline
        }

        a[href]:after {
            content: "
(" attr(href) ")"}abbr[title]:after{content:"(" attr(title) ")"}.ir
a:after, a[href^="javascript:"]:after, a[href^="#"]:after {
                content: ""
            }

            pre,
            blockquote {
                border: 1px solid #999;
                page-break-inside: avoid
            }

            thead {
                display: table-header-group
            }

            tr,
            img {
                page-break-inside: avoid
            }

            img {
                max-width: 100% !important;
                vertical-align: middle;
                max-height: 100% !important
            }

            table {
                border-collapse: collapse
            }

            th,
            td {
                border: solid 1px #333;
                padding: 0.25em 8px;
                vertical-align: top
            }

            dl {
                margin: 0
            }

            dd {
                margin: 0
            }

            @page {
                margin: 1.25cm 0.5cm
            }

            p,
            h2,
            h3 {
                orphans: 3;
                widows: 3
            }

            h2,
            h3 {
                page-break-after: avoid
            }

            .hide-on-print {
                display: none !important
            }

            .print-only {
                display: block !important
            }

            .hide-for-print {
                display: none !important
            }

            .show-for-print {
                display: inherit !important
            }

            .break-page-after {
                page-break-after: always;
                page-break-inside: avoid
            }

            html {
                overflow-x: visible
            }

            body {
                font-size: 12px;
                line-height: 1.5;

                font-family: "Lucida
Grande", "Lucida Sans Unicode", "Lucida Sans", Arial, sans-serif;padding:0}h1,h2,h3,h4,h5,h6{font-weight:normal}h1 a,h2
a, h3 a, h4 a, h5 a, h6 a {
                    font-weight: inherit
                }

                h2 {
                    font-size: 2em;
                    line-height: 1.5;
                    margin-bottom: 0.75em
                }

                h3 {
                    font-size: 1.5em;
                    line-height: 1;
                    margin-top: 2em;
                    margin-bottom: 1em
                }

                h4 {
                    font-size: 1.25em;
                    line-height: 2.4
                }

                h5 {
                    font-weight: bold;
                    margin-top: 2.25em;
                    margin-bottom: 0.75em
                }

                h6 {
                    text-transform: uppercase;
                    margin-top: 2.25em;
                    margin-bottom: 0.75em
                }

                #page {
                    width: 100%;
                    position: relative
                }

                .bukalapak-transaction-slip {
                    padding: 8px 9px;
                    border: solid 1px #000;
                    margin-bottom: 18px;
                    width: 100%;
                    position: relative
                }

                .bukalapak-transaction-slip--brand {
                    height: 27px;
                    display: block;
                    float: left
                }

                .bukalapak-transaction-slip--heading {
                    margin-top: 0;
                    display: block;
                    float: right;
                    line-height: 1;
                    font-size: 18px
                }

                .bukalapak-transaction-slip--courier {
                    margin-top: -5px;
                    display: block;
                    float: right;
                    font-size: 14px;
                    position: relative;
                    width: 100%;
                    text-align: right
                }

                .bukalapak-transaction-slip-buyer {
                    margin-top: 9px;
                    margin-bottom: 9px;
                    padding-right: 18px;
                    clear: both;
                    float: left;
                    width: 62%;
                    border-right: dotted 1px #000
                }

                .bukalapak-transaction-slip-buyer--heading {
                    font-weight: bold;
                    margin-top: 0
                }

                .bukalapak-transaction-slip-buyer--label {
                    display: block;
                    float: left;
                    clear: both;
                    width: 25%
                }

                .bukalapak-transaction-slip-buyer--label:after {
                    content: ":"
                }

                .bukalapak-transaction-slip-buyer--name,
                .bukalapak-transaction-slip-buyer--phone {
                    font-weight: bold
                }

                .bukalapak-transaction-slip-buyer--address {
                    display: block;
                    float: left;
                    font-weight: bold;
                    width: 75%;
                    white-space: -moz-pre-wrap !important;
                    white-space: -pre-wrap;
                    white-space: -o-pre-wrap;
                    white-space: pre-wrap;
                    white-space: normal
                }

                .bukalapak-transaction-slip-seller {
                    display: block;
                    float: left;
                    width: 38%;
                    margin-top: 9px;
                    margin-bottom: 9px;
                    padding-left: 18px
                }

                .bukalapak-transaction-slip-seller--heading {
                    font-weight: bold;
                    margin-top: 0em
                }

                .bukalapak-transaction-slip-seller--lapak,
                .bukalapak-transaction-slip-seller--name {
                    white-space: nowrap
                }

                .bukalapak-transaction-slip--footer {
                    display: block;
                    width: 100%;
                    clear: both;
                    margin-top: 18px;
                    border-top: solid 1px #000;
                    padding-top: 5px;
                    font-size: 9px
                }

                .bukalapak-transaction-product {
                    clear: both;
                    position: relative;
                    width: 100%
                }

                .bukalapak-transaction-product-item {
                    width: 80%
                }

                .bukalapak-transaction-product-quantity {
                    width: 20%
                }

                .address p {
                    margin-top: 0px;
                    margin-bottom: 0px;
                }

                #description {
                    line-height: 0.9px !important;
                }
    </style>

    <title>Document</title>
</head>


<body>
    <div id='page'>
        <div>
            <img style="margin-top:-20px;height:80px;margin-left:-10px;"
                src="{{ Helper::print('logo/'.config('website.logo')) }}" alt="">
            <div style="position: absolute;top:-50px; right: 0;text-align: right">
                <h1 style="margin-bottom:0px;margin-right:-13px;">
                    <span>
                        NO. Resi
                        <span
                            style='color: #{{ config('website.color') }} !important'>{{ $master->sales_order_rajaongkir_waybill }}</span>
                    </span>
                </h1>

                <span style="position: absolute;top:70px; right: -3;text-align: right">
                    Tanggal Cetak : {{ date('d M Y H:i') }}
                </span>
                <table border="1" style="position: absolute;top:90px;right:-3px;width:200px;">
                    <tr>
                        <td style="width: 30%;text-align:right">Kategori</td>
                        <td>{{ $master->category->sales_category_name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td style="width: 30%;text-align:right">Pembayaran</td>
                        <td>{{ $master->top->finance_top_name ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="description" style='margin-top: -20px; margin-bottom: 20px;'>
            {!! config('website.address') !!}
            <span style="position:absolute;top:55px;">
                Cabang : {{ $master->branch->inventory_branch_name ?? ''}}
            </span>
        </div>
        <div>
            <table border='0' cellpadding='5' cellspacing='0' id='templateList' width='100%'>
                <tr>
                    <td colspan='8' style='background: #{{ config('website.color') }} !important'>

                    </td>
                </tr>
                <tr>
                    <td align='left' colspan='8' valign='middle'>
                        <p style="text-align:center;font-size:25px;font-weight:bold;margin:0px;">TANDA TERIMA TITIPAN
                        </p>
                    </td>
                </tr>

                <tr>
                    <th colspan='8' style='background: #{{ config('website.color') }} !important'></th>
                </tr>
                <tr>
                    <td align='center' colspan='4' style='background-color: #e0e0e0 !important;width:50%' valign='top'>
                        <strong>Pengirim</strong>
                    </td>
                    <td align='center' colspan='4' style='background-color: #e0e0e0 !important' valign='top'>
                        <strong>Penerima</strong>
                    </td>
                </tr>
                <tr>
                    <td align='left' colspan='1' valign='top'>
                        Nama
                    </td>
                    <td align='left' colspan='3' valign='top'>
                        {{ $master->sales_order_rajaongkir_from_name ?? '' }}
                    </td>
                    <td align='left' colspan='1' valign='top'>
                        Nama
                    </td>
                    <td align='left' colspan='3' valign='top'>
                        {{ $master->sales_order_rajaongkir_to_name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <td align='left' colspan='1' valign='top'>
                        Telp
                    </td>
                    <td align='left' colspan='3' valign='top'>
                        {{ $master->sales_order_rajaongkir_from_phone ?? '' }}
                    </td>
                    <td align='left' colspan='1' valign='top'>
                        Telp
                    </td>
                    <td align='left' colspan='3' valign='top'>
                        {{ $master->sales_order_rajaongkir_to_phone ?? '' }}
                    </td>
                </tr>
                <tr>
                    <td align='left' colspan='1' valign='top'>
                        Kota Asal
                    </td>
                    <td align='left' colspan='3' valign='top'>
                        {{ $master->from->rajaongkir_area_province_name ?? '' }} -
                        {{ $master->from->rajaongkir_area_city_name ?? '' }} -
                        {{ $master->from->rajaongkir_area_name ?? '' }}
                        Kode Pos {{ $master->from->rajaongkir_area_postcode ?? '' }}
                    </td>
                    <td align='left' colspan='1' valign='top'>
                        Tujuan
                    </td>
                    <td align='left' colspan='3' valign='top'>
                        {{ $master->to->rajaongkir_area_province_name ?? '' }} -
                        {{ $master->to->rajaongkir_area_city_name ?? '' }} -
                        {{ $master->to->rajaongkir_area_name ?? '' }}
                        Kode Pos {{ $master->to->rajaongkir_area_postcode ?? '' }}
                    </td>
                </tr>
                <tr>
                    <td align='left' colspan='1' valign='top'>
                        Alamat
                    </td>

                    <td align='left' colspan='3' valign='top'>
                        <span class="address">
                            {{ $master->sales_order_rajaongkir_from_address ?? '' }}
                        </span>
                    </td>
                    <td align='left' colspan='1' valign='top'>
                        Alamat
                    </td>
                    <td align='left' colspan='3' valign='top'>
                        {{ $master->sales_order_rajaongkir_to_address ?? '' }}
                    </td>
                </tr>
                <tr>
                    <td align='left' colspan='1' valign='top'>
                        <p>Catatan</p>
                    </td>
                    <td align='left' colspan='7' valign='top'>
                        <p>{{ $master->sales_order_rajaongkir_notes }}</p>
                        <p>{{ $master->sales_order_description }}</p>
                    </td>
                </tr>
                <tr>
                    <th colspan='8' style='background: #{{ config('website.color') }} !important'></th>
                </tr>
                <tr>
                    <td align='left' colspan='4' style='background-color: #e0e0e0 !important' valign='top'>
                        <strong>Keterangan</strong>
                    </td>
                    <td align='center' colspan='1' style='background-color: #e0e0e0 !important' valign='top'>
                        <strong>Koli</strong>
                    </td>
                    <td align='right' colspan='1' style='background-color: #e0e0e0 !important' valign='top'>
                        <strong>Harga</strong>
                    </td>
                    <td align='right' colspan='1' style='background-color: #e0e0e0 !important' valign='top'>
                        <strong>Tambahan</strong>
                    </td>
                    <td align='right' colspan='1' style='background-color: #e0e0e0 !important' valign='top'>
                        <strong>Total</strong>
                    </td>
                </tr>

                <tr>
                    <td align="left" colspan='4' valign="middle" width="60% !important"
                        style="border-collapse:collapse;border-spacing:0;font-family:Arial,sans-serif;color:#555;line-height:1.5;border-bottom-color:#cccccc;border-bottom-width:1px;border-bottom-style:solid;margin:0;padding:5px 10px"
                        bgcolor="#FFFFFF">
                        Paket : {{ $master->paket->rajaongkir_paket_name }} - Estimasi (
                        {{ $master->paket->rajaongkir_paket_estimasi }} hari )
                    </td>
                    <td align="center" valign="middle" width="10%"
                        style="border-collapse:collapse;border-spacing:0;font-family:Arial,sans-serif;color:#555;line-height:1.5;border-bottom-color:#cccccc;border-bottom-width:1px;border-bottom-style:solid;margin:0;padding:5px 10px"
                        bgcolor="#FFFFFF">
                        {{ $master->sales_order_rajaongkir_colli }}
                    </td>
                    <td align="right" valign="middle" width="15%"
                        style="border-collapse:collapse;border-spacing:0;font-family:Arial,sans-serif;color:#555;line-height:1.5;border-bottom-color:#cccccc;border-bottom-width:1px;border-bottom-style:solid;margin:0;padding:5px 10px"
                        bgcolor="#FFFFFF">
                        {{ number_format( $master->sales_order_rajaongkir_cost_value / $master->sales_order_rajaongkir_colli ,0,",",".")}}
                    </td>
                    <td align="right" valign="middle" width="15%"
                        style="border-collapse:collapse;border-spacing:0;font-family:Arial,sans-serif;color:#555;line-height:1.5;border-bottom-color:#cccccc;border-bottom-width:1px;border-bottom-style:solid;margin:0;padding:5px 10px"
                        bgcolor="#FFFFFF">
                        {{ number_format($master->sales_order_rajaongkir_cost_additional,0,",",".") }}
                    </td>
                    <td align="right" valign="middle" width="25%"
                        style="border-collapse:collapse;border-spacing:0;font-family:Arial,sans-serif;color:#555;line-height:1.5;border-bottom-color:#cccccc;border-bottom-width:1px;border-bottom-style:solid;margin:0;"
                        bgcolor="#FFFFFF">
                        <span>
                            {{ number_format($master->sales_order_rajaongkir_cost_total,0,",",".") }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <th colspan='8' style='background: #{{ config('website.color') }} !important'></th>
                </tr>
                @if (!empty($master->sales_order_marketing_promo_description))
                <tr>
                    <td align="left" colspan="7" valign="top"
                        style="border-collapse:collapse;border-spacing:0;font-family:Arial,sans-serif;color:#555;line-height:1.5;border-bottom-color:#cccccc;border-bottom-width:1px;border-bottom-style:solid;margin:0;padding:5px 10px"
                        bgcolor="#f0f0f0">
                        <span
                            style="font-family:Arial,sans-serif;color:#555;line-height:1.5;font-size:13px;margin:0;padding:0">
                            Discount : {{ $master->sales_order_marketing_promo_description ?? '' }}
                        </span>
                    </td>
                    <td align="right" valign="top" colspan="1"
                        style="border-collapse:collapse;border-spacing:0;font-family:Arial,sans-serif;color:#555;line-height:1.5;border-bottom-color:#cccccc;border-bottom-width:1px;border-bottom-style:solid;margin:0;padding:5px 10px"
                        bgcolor="#f0f0f0">
                        <span
                            style="text-align: right;font-family:Arial,sans-serif;color:#555;line-height:1.5;font-size:13px;margin:0;padding:0">-{{ number_format($master->sales_order_marketing_promo_value,0,",",".") }}</span>
                    </td>
                </tr>
                @endif
                <tr>
                    <th colspan="7"
                        style="text-align: left;border-bottom-style:none;color:#ffffff;padding-left:10px;padding-right:10px"
                        bgcolor="#{{ config('website.color') }}">
                        <h2
                            style="font-family:Arial,sans-serif;color:#ffffff;line-height:1.5;font-size:13px;margin:0;padding:5px 0">
                            Total Tagihan
                        </h2>
                    </th>
                    <th colspan="1"
                        style="text-align: right;border-bottom-style:none;color:#ffffff;padding-left:10px;padding-right:10px"
                        bgcolor="#{{ config('website.color') }}">
                        <h2
                            style="text-align: right;font-family:Arial,sans-serif;color:#ffffff;line-height:1.5;font-size:13px;margin:0;padding:5px 0">
                            {{ number_format($master->sales_order_total,0,",",".") }}
                        </h2>
                    </th>
                </tr>
                <tr>
                    <th colspan='8' style='background: #{{ config('website.color') }} !important'></th>
                </tr>
            </table>
        </div>

</body>

</html>