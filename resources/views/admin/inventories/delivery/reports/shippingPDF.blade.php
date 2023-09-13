<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shipping Reports</title>
    <link rel="stylesheet" href="{{ asset('css/custom_pdf.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom_page.css') }}">
</head>

<body>
    <h2 class="text-center">REPORT OF BLOOD UNITS COLLECTED AND SHIPPED</h2>
    <br>
    <section class="header" style="top: -287px;">
        <table cellpadding="0" cellspacing="0" width="100%">
            < <tr>
                <td width="30%" style="vertical-align: top; 10px; position: relative">
                    <img src="{{ asset('assets/img/solproe.png') }}" alt="" class="invoce.logo">
                </td>
                <td widht="70%" class="text-left text-company" style="vertical-align: top; padding-top:10px">
                    <span style="font-size:16px">
                        <strong>Consult Date:
                            {{ clear }}
                        </strong>
                    </span>
                </td>
                </tr>
                <tr>
                    <td widht="70%" class="text-left text-company" style="vertical-align: top; padding-top:10px">
                        <span style="font-size:16px">
                            <strong>Customen:
                                {{--   {{ $deliveryreport->center->DES_CENTRE }} --}}
                            </strong>
                        </span>
                    </td>
                </tr>
        </table>
    </section>

    <section style="margin-top: 10px">
        <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
            <thead>
                <tr class="text-left px-6 py-4">
                    <th width="40%" style="font-size:10px">CREATED AT</th>
                    <th width="10%" style="font-size:10px">BOXES</th>
                    <th width="15%" style="font-size:10px">UNITIES</th>
                    <th width="30%" style="font-size:10px">THROUGH</th>
                    <th width="20%" style="font-size:10px">STATUS</th>
                    <th width="40%" style="font-size:10px">DATE RECEPTION</th>
                    <th width="30%" style="font-size:10px">NEW</th>
                    <br>
                </tr>
            </thead>
            <tbody>
                @foreach ($deliveryreports as $deliveryreport)
                    <tr class="bg-white border-b">
                        <td class="px-10 py-4  text-gray-900 whitespace-nowrap text-center"
                            style="font-size: x-small; text-align:center">
                            {{ $deliveryreport->created_at }}
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap text-center"
                            style="font-size: x-small; text-align:center">
                            {{ $deliveryreport->boxes }}
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap text-center"
                            style="font-size: x-small; text-align:center">
                            {{ $deliveryreport->unities }}
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap text-center"
                            style="font-size: x-small; text-align:center">
                            {{ $deliveryreport->delivery->des_delivery }}
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap text-center"
                            style="font-size: x-small; text-align:center">
                            {{ $deliveryreport->status->status_name }}
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap text-center"
                            style="font-size: x-small; text-align:center">
                            {{ $deliveryreport->date }}
                        </td>
                        <td class="px-6 py-4  text-gray-900 whitespace-nowrap text-center"
                            style="font-size: x-small; text-align:center">
                            {{ $deliveryreport->news }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <br>
                        <br>
                        <span><b>Totals</b></span>
                    </td>
                    <td>
                        <strong>
                            Unit{{ number_format($deliveryreport->sum('unities')) }}
                        </strong>
                    </td>
                </tr>
            </tfoot>
        </table>
    </section>
    <section class="footer">
        <table cellpadding="0" cellspacing="0" class="table-items" width="100%">
            <tr>
                <td widht="20%">
                    <span>SOLPROE - BLOODBANK</span>
                </td>
                <td widht="60%" class="text-center">
                    copyright © All rights reserved
                </td>
                <td class="text-center" widht="20%">
                    page <span class="pagenum"></span>
                </td>
            </tr>
        </table>
    </section>
</body>

</html>
