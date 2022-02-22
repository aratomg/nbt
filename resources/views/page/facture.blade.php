@extends('template')
@section('title', 'Carte gasoil')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <Cite></Cite>
                    </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol> -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <button type="button" class="btn btn-block btn-secondary btn-flat" id="add_facture">Ajouter</button>
                    {{-- <button type="button" class="btn btn-block btn-secondary btn-flat" data-toggle="modal" data-target="#modal_add" >Ajouter</button> --}}
                    <!-- small box -->
                    <!-- <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div> -->
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <!-- <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div> -->
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <!-- <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div> -->
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <!-- <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div> -->
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <br>
            <div class="row">
                <!-- Left col -->

                <section class="col-lg-12 connectedSortable">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des Voyages Non Facturés</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <div>
                                <table id="list_voyage" class="table table-hover text-nowrap">
                                    <thead>
                                        <tr role="row">
                                            <th >

                                            </th>
                                            <th>
                                                Date voyage
                                            </th>
                                            <th >
                                                transit
                                            </th>
                                            {{-- <th >
                                                Client
                                            </th> --}}
                                            <th>
                                                Camion
                                            </th>
                                            <th>
                                                Comission
                                            </th>
                                            <th>
                                                Ref Marchandise
                                            </th>
                                            <th>
                                                Nombre
                                            </th>
                                            <th>
                                                Prix unitaire
                                            </th>
                                            <th>
                                                Montant
                                            </th>
                                            <th>
                                                Montant gasoil
                                            </th>
                                            <th>
                                                Gasoil en litre
                                            </th>
                                            <th>
                                                Piece
                                            </th>
                                            <th>
                                                Pneu
                                            </th>
                                            <th>
                                                Vatsy
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!--modal ajout -->
                    <div class="modal fade show" id="modal_add" style="display: none; padding-right: 14px;" aria-modal="true">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            {{-- <div class="modal-header">
                                <h5 class="m-0 text-dark">
                                    <Cite>Ajouter un Chauffeur</Cite>
                                </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div> --}}
                            <div class="modal-body">
                              <form id="add_facture">
                                  @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="">N° facture</label>
                                            <input type="text" name="num_fac" id="num_fac" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label for="">Type</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value=""></option>
                                            <option value="import">Import</option>
                                            <option value="export">Export</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="">Client</label>
                                            <input type="text" class="form-control" name="client" id="client">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-3">
                                        <label for="">Nif</label>
                                        <input type="text" class="form-control" name="nif" id="nif">
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="">Stat</label>
                                        <input type="text" class="form-control" name="stat" id="stat">
                                    </div>
                                </div>
                                <div class="row">
                                    <table id="list_voyage_facture" class="table table-hover text-nowrap">
                                        <thead>
                                            <tr role="row">
                                                <th>

                                                </th>
                                                <th>
                                                    Nombre
                                                </th>
                                                <th>Prix unitaire</th>
                                                <th>
                                                    Montant
                                                </th>
                                                <th>

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group row">
                                            <label for="" class="col-form-label">Toamasina</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" name="date_fact" id="date_fact" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label for="" class="col-form-label">Total</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="total" id="total" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8" >
                                        <div class="form-group row">
                                            <label for="Mode de payement">Mode de payement </label>
                                            <select name="mode" id="mode" class="form-control col-sm-3" required>
                                                <option value=""></option>
                                                <option value="comptant">Comptant</option>
                                                <option value="echeance">Echeance</option>
                                            </select>
                                        </div>
                                        <div class="form-group row" id="echeance_">
                                            <label for="" class="col-form-label">Echeance</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" name="date_echeance" id="date_echeance" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label for="" class="col-form-label">TVA</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" name="tva_client" id="tva_client" min="0" step="10" >
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="tva" id="tva">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group row">
                                            <label for="Type de payement">Type de payement</label>
                                            <select name="type_p" id="type_p" class="form-control col-sm-3" >
                                                <option value=""></option>
                                                <option value="Espece">Espece</option>
                                                <option value="Cheque">Cheque</option>
                                            </select>
                                        </div>
                                        <div id="cq">
                                            <div class="form-group row">
                                                <label for="" class="col-form-label">Date Cheque</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" name="date_cheque" id="date_cheque" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-form-label">N°</label>
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control" name="numero" id="numero" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-form-label">Montant</label>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control" name="montant" id="montant" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label for="" class="col-form-label"><b>Total</b></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="total_final" id="total_final" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fermer</button>
                              <button type="button" class="btn btn-secondary btn-flat" id="ajouter">Ajouter</button>
                            </form>
                            </div>
                        </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>

                    <!--modal modif -->
                    <div class="modal fade show" id="modal_modif" style="display: none; padding-right: 14px;" aria-modal="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            {{-- <div class="modal-header">
                                <h5 class="m-0 text-dark">
                                    <Cite>Ajouter un Chauffeur</Cite>
                                </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div> --}}
                            <div class="modal-body">
                              <form id="modif_carte">
                                  @csrf
                                  <input type="hidden" name="id_carte" id="id_carte">
                                  <div class="form-group">
                                    <label for="cin">Libelle</label>
                                    <input type="text" class="form-control" name="libelle" id="libelleMod" >
                                  </div>
                                  {{-- <div class="form-group">
                                      <label for="prenom">Capacite</label>
                                      <input type="text" class="form-control" name="capacite" id="capaciteMod" >
                                  </div> --}}
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fermer</button>
                              <button type="submit" class="btn btn-secondary btn-flat">Enregistrer</button>
                            </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">
                    <!-- /.card -->
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<style>
    .hidden{
        display: none;
    }
</style>
@endsection
@section('script')
    <script>
        var table;

        $(document).ready(function(){
            $('#echeance_').hide();
            $('#cq').hide();
            table = $('#list_voyage').dataTable({
                "order" : [],
                "ajax" : {
                    "url" : "{{ route('voyage_liste') }}",
                    "dataScr" : "data"
                },
                "columns" : [
                        {data: 'checkbox'},
                        {data: 'date_voyage'},
                        {data: 'transit'},
                        // {data: 'client'},
                        {data : 'camion'},
                        {data : 'com'},
                        {data : 'ref_marc'},
                        {data : 'nombre'},
                        {data : 'prix_unitaire'},
                        {data : 'montant'},
                        {data : 'montant_gasoil'},
                        {data : 'gasoil_litre'},
                        {data : 'piece'},
                        {data : 'pneu'},
                        {data : 'vatsy'},

                ],columnDefs: [{
                    targets: 0,
                    checkboxes: {
                        selectRow: true
                    }
                }],
                select: {
                    style: 'multi'
                },
                order: [
                    [1, 'desc']
                ]
            });
        })

    var reference = Array();
    let total = 0;
    $("#add_facture").on('click', function() {
        $("input[name=id_voyage]:checked").each(function() {
            var checked = $(this);
            var input = checked.attr('type');
            if (reference.indexOf(checked.parents('tr').find('td:eq(0)').text()) < 0) {
                $("#list_voyage_facture > tbody").append("<tr><td class=\"hidden\">"+checked.val() +"</td><td>" + checked.parents('tr').find('td:eq(5)')
                    .text() +" DU "+ checked.parents('tr').find('td:eq(1)').text() +" Cam N° "+ checked.parents('tr').find('td:eq(4)').text() +"</td><td>" + checked.parents('tr').find('td:eq(6)')
                    .text() + "</td><td>"+ checked.parents('tr').find('td:eq(7)')
                    .text() + "</td><td>"+  checked.parents('tr').find('td:eq(8)')
                    .text() + "</td><td style='text-align:center !important;'><button type=\"button\" class=\"btn btn-danger btn-flat badge-delete\" >Supprimer</button></td></tr>"
                );
                // reference.push(checked.parents('tr').find('td:eq(0)').text());
                reference.push(checked.val());
                total += +(checked.parents('tr').find('td:eq(8)').text());
            }

        });
        $('#total').val(total);
        $("#modal_add").modal('show');
    });
    $("#list_voyage_facture").on('click', '.badge-delete', function() {
        $(this).parents('tr').remove();
        total = 0;
        $("#list_voyage_facture > tbody > tr").each(function() {

            total += +($(this).find('td:eq(4)').text());

            })
            $('#total').val(total);
    });
    $("#ajouter").on('click', function() {
        var voyage =Array();
        var num_fac = $('#num_fac').val();
        var type = $('#type').val();
        var client = $('#client').val();
        var nif = $('#nif').val();
        var stat = $('#stat').val();
        var total = $('#total').val();
        var tva = $('#tva').val();
        var total_final = $('#total_final').val();
        var date_fact = $('#date_fact').val();
        var date_echeance = $('#date_echeance').val();
        var date_cheque = $('#date_cheque').val();
        var numero = $('#numero').val();
        var montant = $('#montant').val();
        $("#list_voyage_facture > tbody > tr").each(function() {
            voyage.push($(this).find('td:eq(0)').text());
        })

            $.ajax({
                url : "{{ route('add_facture') }}",
                method : 'POST',
                dataType : 'json',
                data : {
                    _token : '{{ csrf_token() }}',
                    num_fac : num_fac,
                    type : type,
                    client : client,
                    nif : nif,
                    stat : stat,
                    voyage : voyage,
                    total : total,
                    tva : tva,
                    total_final : total_final,
                    date_echeance : date_echeance,
                    date_fact : date_fact
                },
                success : function(response){
                    // $("#add_facture")[0].reset();
                    $('#modal_add').modal('hide');
                    date = new Date();
                    if ($('#mode').val() === 'comptant') {
                        $.ajax({
                            url : "{{ route('add_recouvrement') }}",
                            method : 'POST',
                            dataType : 'json',
                            data : {
                                _token : '{{ csrf_token() }}',
                                id_facture : response.id_facture,
                                date_payement : date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate(),
                                montant_payement : total_final
                            },
                            success : function(response){
                            }
                        });
                    }
                    if ($('#type_p').val() === 'Cheque') {
                        $.ajax({
                            url : "{{ route('add_chek') }}",
                            method : 'POST',
                            dataType : 'json',
                            data : {
                                _token : '{{ csrf_token() }}',
                                id_facture : response.id_facture,
                                date_chek : date_cheque,
                                montant_chek : montant,
                                numero : numero
                            },
                            success : function(response){
                            }
                        });
                    }
                    Toast.fire({
                        icon : 'success',
                        title : 'Enregistrer avec succes'
                    });
                    table.api().ajax.reload();
                }
            });

    })
    $('#tva_client').on('change', function(){
        var tva_client = $('#tva_client').val();
        var tva = total*tva_client/100;
        $('#tva').val(tva);
        $('#total_final').val(total+tva);
    });
    $('#mode').on('change', function(){
        if($('#mode').val() === 'echeance'){
            $('#echeance_').show();
        }else{
            $('#echeance_').hide();
        }
    });
    $('#type_p').on('change', function(){
        if($('#type_p').val() === 'Cheque') {
            $('#cq').show();
        }else{
            $('#cq').hide();
        }
    });
    </script>
@endsection
