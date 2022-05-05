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
        body{
            font-size: 12px;
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
            border: 1px solid #ffffff;
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
            border: 1px dotted #414141;
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
    </style>
</head>
<body>
    <div class="contenu">
        <table>
            <tbody>
                <tr>
                    <td width="2%">
                    </td>
                    <td width="15%">
                        <img src="<?php echo public_path('images/logo.png')?>" class="logo" alt="">
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered" style="margin: 1% 5% 0">
            <thead>
                <tr>
                    <th>TRANSPORTEUR NAMBININTSOA</th>
                </tr>
            </thead>
        </table>
        
    </div>
</body>
</html>