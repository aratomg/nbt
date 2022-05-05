<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche dotation</title>
    <style>
        @page {
            margin: 1cm 5mm 0.5mm 10mm;
        }
        .table {
            border-collapse: collapse;
            width: 100%;
            margin: 0.25rem 0 0;
            color: #000000;
        }
        
        .table th,
        .table td {
            padding: 0.5rem;
            vertical-align: middle;
        }
        
        .table thead th {
            vertical-align: middle;
        }

        .table tbody + tbody {
            border-width: 1px 0 0 1px ;
            border-style: solid;
        }

        .table-bordered tfoot{
            border: 1px solid #000000;
        }
        .table-bordered tfoot tr{
            border: 1px solid #000000;
        }

        .table-bordered tfoot tr td{

            font-size: 12px;
        }
        .table-bordered {
            border: 1px solid #000000;
        }
        .table-bordered th{
            border: 1px solid #000000;
        }
        .table-bordered .no-border th{
            border: 0px solid #000000;
        }
        .table-bordered tbody td {
            font-size: 12px;
            border: 1px solid #414141;
        }
        .text-right{
            text-align: right
        }
        .text-center{
            text-align: center
        }
        .text-left{
            text-align: left
        }
        .table-bordered thead th.no-border {
            border-color: #000000;
        }
        .title{
            font-size: 2rem
        }
        .mail{
            color: rgb(53, 53, 224);
        }
        .facture{
            font-size: 1.5rem;
            text-transform: uppercase;
        }
        hr{
            color: #000000;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="contenu">
        <table class="table table-bordered" style="margin: 1% 5% 0">
            <thead>
                <tr>
                    <th class="title">TRANSPORTEUR NAMBININTSOA</th>
                </tr>
            </thead>
        </table>
        <table class="table" style="margin: 0 5%">
            <tbody>
                <tr>
                    <td class="text-left">
                        TEL : 034 26 563 48 <br>
                        <p class="text-kely">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;032 07 220 67</p>
                        Email : <span class="mail">nambinintsoa54@yahoo.fr</span>
                    </td>
                    <td class="text-right">
                        CIF N° 0188364/DGI-F <br>
                        STAT N° 49229 31 2018 0 0084 <br>
                        NIF N° 4003184747
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table" style="margin: 1% 5% 0">
            <thead>
                <tr class="facture">
                    <th>FACTURE DES TRANSPORTS N° {{ $facture->num_fac }}</th>
                </tr>
            </thead>
        </table>
        <table class="table" style="margin: 1% 15% 0">
            <tbody>
                <tr>
                    <td colspan="2">DOIT : {{ $facture->client }}</td>
                </tr>
                <tr>
                    <td>NIF : {{ $facture->nif }}</td>
                    <td>STAT : {{ $facture->stat }}</td>
                </tr>
            </tbody>
        </table>
        <table class="table" style="margin: 1% 15% 0">
            <thead>
                <tr>
                    <td class="text-left">OBJET : TRANSPORTS DES MARCHANDISES</td>
                </tr>
            </thead>
        </table>
        
        <table class="table table-bordered" style="margin: 1% 0 0">
            <thead>
                <tr>
                    <th>N° DOS</th>
                    <th style="width: 50%"></th>
                    <th>NB</th>
                    <th>PU</th>
                    <th>MONTANT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($avoir as $item)
                <tr>
                    <td>{{ $item->bl }}</td>
                    <td>01TCX40P chargé divers colis vers ABC Toamasina cam 3976AF</td>
                    <td class="text-right">1</td>
                    <td class="text-right">{{ number_format($item->montant, 0, ',', ' ') }}</td>
                    <td class="text-right">{{ number_format($item->montant, 0, ',', ' ') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-right"></td>
                    <td class="text-left">TOTAL</td>
                    <td class="text-right">{{ number_format($facture->total, 0, ',', ' ') }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-right"></td>
                    <td class="text-left">TVA 20%</td>
                    <td class="text-right">{{ number_format($facture->tva, 0, ',', ' ') }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-right"></td>
                    <td class="text-left">TOTAL</td>
                    <td class="text-right">{{ number_format($facture->total_final, 0, ',', ' ') }}</td>
                </tr>
            </tfoot>
        </table>
        <table class="table" style="margin: 1% 0 0">
            <thead>
                <tr>
                    <td class="text-left">Arretée la présente facture à la somme de <b>{{ $facture->lettre }}</b></td>
                </tr>
            </thead>
        </table>
        <table class="table" style="margin: 1% 0 0">
            <thead>
                <tr>
                    <td class="text-right">Toamasina, le {{ utf8_decode(utf8_encode(strftime('%d %B %Y', strtotime($facture->date_fact)))) }}</td>
                </tr>
            </thead>
        </table>
        <table class="table" style="margin: 1% 15% 0">
            <thead>
                <tr>
                    <td class="text-right">Pour la société</td>
                </tr>
            </thead>
        </table>
        <table class="table" style="margin: 7% 15% 0">
            <thead>
                <tr>
                    <td class="text-right">Rasamijaona</td>
                </tr>
            </thead>
        </table>
        <table class="table" style="margin: 1% 0 0">
            <thead>
                <tr>
                    <td class="text-left">NB : Veuillez libeller le chèque au nom de :<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Transport Nambinintsoa</b>

                    </td>
                </tr>
            </thead>
        </table>
        <hr>
        <table class="table" style="margin: 1% 0% 0">
            <thead>
                <tr>
                    <td class="text-left">ADRESSE : BARIKADIMY TOAMASINA</td>
                </tr>
            </thead>
        </table>
    </div>
</body>
</html>