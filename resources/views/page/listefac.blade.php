@extends('template')
@section('title', 'test')
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
                            <h3 class="card-title">Liste des Factures</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div>
                                <table id="list_facture" class="table table-hover text-nowrap">
                                    <thead>
                                        <tr role="row">
                                            <th >
                                                N°
                                            </th>
                                            <th >
                                                Date
                                            </th>
                                            <th>
                                                Client
                                            </th>
                                            <th >
                                                action
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
                    <div class="modal fade show" id="modal_modif" style="display: none; padding-right: 14px;" aria-modal="true">
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
                              <form id="modif_facture">
                                  @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="">N° facture</label>
                                            <input type="hidden" name="id_facture" id="id_facture">
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
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-block btn-secondary btn-flat" data-toggle="modal" data-target="#voyage" >Ajouter Voyage</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <table id="list_voyage_facture" class="table table-hover text-nowrap">
                                        <thead>
                                            <tr role="row">
                                                <th class="hidden">

                                                </th>
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
                                            <label for="Mode de payement">Mode de payement</label>
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
                    <div class="modal fade show" id="voyage" style="display: none; padding-right: 14px;" aria-modal="true">
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
                            <div class="modal-body table-responsive">
                                <div class="row">
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
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fermer</button>
                              <button type="button" class="btn btn-secondary btn-flat" id="ajouter_voyage">Ajouter</button>
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
        var table1;
        $(document).ready(function(){
            $('#echeance_').hide();
            table = $('#list_facture').dataTable({
                "order" : [],
                "ajax" : {
                    "url" : "{{ route('liste_facture') }}",
                    "dataScr" : "data"
                },
                "columns" : [
                    {data: 'num_fac'},
                    {data: 'date_fact'},
                    {data: 'client'},
                    {data: 'action'}
                ]
            });
            table1 = $('#list_voyage').dataTable({
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
        $('#add_carte').unbind('submit').bind('submit', function() {
        var form = new FormData(this);
            $.ajax({
                url : "{{ route('add_carte') }}",
                data : new FormData(this),
                type : "POST",
                contentType : false,
                cache : false,
                processData : false,
                dataType : 'json',
                success : function(response){
                    $("#add_carte")[0].reset();
                    $('#modal_add').modal('hide');
                    Toast.fire({
                        icon : 'success',
                        title : 'Enregistrer avec succes'
                    });
                    table.api().ajax.reload();
                }
            });
            return false;
    });
    $('#modif_carte').unbind('submit').bind('submit', function() {
        var form = new FormData(this);
            $.ajax({
                url : "{{ route('update_carte') }}",
                data : new FormData(this),
                type : "POST",
                contentType : false,
                cache : false,
                processData : false,
                dataType : 'json',
                success : function(response){
                    $("#modif_carte")[0].reset();
                    $('#modal_modif').modal('hide');
                    Toast.fire({
                        icon : 'success',
                        title : 'modifier avec succes'
                    });
                    table.api().ajax.reload();
                }
            });
            return false;
    });
    function modif(code){
        if(code){
            $.ajax({
                    url:"{{ route('get_facture') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token : '{{ csrf_token() }}',
                        id_facture : code
                    },
                    success: function(response){
                        $('#num_fac').val(response.facture[0].num_fac);
                        $('#client').val(response.facture[0].client);
                        $('#type').val(response.facture[0].type);
                        $('#nif').val(response.facture[0].nif);
                        $('#stat').val(response.facture[0].stat);
                        $('#tva_client').val(response.facture[0].tva*100/response.facture[0].total);
                        $("#total").val(response.facture[0].total);
                        $('#tva').val(response.facture[0].tva);
                        $('#total_final').val(response.facture[0].total_final);
                        $('#date_fact').val(response.facture[0].date_fact);
                        $('#date_echeance').val(response.facture[0].date_echeance);
                        $('#id_facture').val(response.facture[0].id_facture)
                        for (let i = 0; i < response.avoir.length; i++) {
                            $("#list_voyage_facture > tbody").append("<tr><td class=\"hidden\">"+response.avoir[i].id_voyage +"</td><td>" + response.avoir[i].ref_marc
                                 +" DU "+response.avoir[i].date_voyage + " Cam N° "+ response.avoir[i].matricule  +"</td><td>" + response.avoir[i].nombre + "</td><td>"+response.avoir[i].prix_unitaire +"</td><td>"+response.avoir[i].montant + "</td><td style='text-align:center !important;'><a href='javascript:void(0)' class='badge badge-danger rounded badge-delete' id='suppr'><i class='feather icon-trash'></i></a></td></tr>"
                            );
                        }
                        $('#modal_modif').modal('show');

                    }
                });
        }else{
            alert('Il y a une erreur! Veuillez actualiser la page s\'il vous plaît');
        }
    }
    function supprimer(code) {
        if(code){
            Swal.fire({
                    title: 'Etes-vous sure?',
                    text: "cette action serait ireversible!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer!',
                    cancelButtonText: 'Annuler',
                    showLoaderOnConfirm : true,

                    preConfirm: function() {
                        return new Promise(function(resolve) {
                            $.ajax({
                                url: "{{ route('delete_facture') }}",
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    _token : '{{ csrf_token() }}',
                                    id_facture : code
                                }
                            })
                            .done(function(response) {
                                Toast.fire({
                                    icon : 'success',
                                    title : 'Supprimer avec succes'
                                });
                                table.api().ajax.reload();
                            })
                            .fail(function(response) {
                                Swal.fire(
                                    'Oops',
                                    'Il y a une erreur! Veuillez actualiser la page s\'il vous plaît',
                                    'error'
                                );
                            });
                        });
                    },
                    allowOutsideClick : false
                    });
        }else{
            Swal.fire(
                'Oops',
                'Il y a une erreur! Veuillez actualiser la page s\'il vous plaît',
                'error'
                );
        }
    }
    var total = 0;
    $("#list_voyage_facture").on('click', '.badge-delete', function() {
        $(this).parents('tr').remove();

        $("#list_voyage_facture > tbody > tr").each(function() {

            total += +($(this).find('td:eq(4)').text());

            })
            $('#total').val(total);
    });

    $('#tva_client').on('change', function(){
        var tva_client = $('#tva_client').val();
        var tva = total*tva_client/100;
        $('#tva').val(tva);
        $('#total_final').val(total+tva);
    });
    var reference = Array();
    $("#ajouter_voyage").on('click', function() {
        $("input[name=id_voyage]:checked").each(function() {
            var checked = $(this);
            var input = checked.attr('type');
            if (reference.indexOf(checked.parents('tr').find('td:eq(0)').text()) < 0) {
                $("#list_voyage_facture > tbody").append("<tr><td class=\"hidden\">"+checked.val() +"</td><td>" + checked.parents('tr').find('td:eq(5)')
                    .text() +" DU "+ checked.parents('tr').find('td:eq(1)').text() +" Cam N° "+ checked.parents('tr').find('td:eq(4)').text() +"</td><td>" + checked.parents('tr').find('td:eq(6)')
                    .text() + "</td><td>"+ checked.parents('tr').find('td:eq(7)')
                    .text() + "</td><td>"+  checked.parents('tr').find('td:eq(8)')
                    .text() + "</td><td style='text-align:center !important;'><a href='javascript:void(0)' class='badge badge-danger rounded badge-delete' id='suppr'><i class='feather icon-trash'></i></a></td></tr>"
                );
                // reference.push(checked.parents('tr').find('td:eq(0)').text());
                reference.push(checked.val());
                var total= +($('#total').val());
                total += +(checked.parents('tr').find('td:eq(8)').text());
                $('#total').val(total);
            }

        });
        $("#voyage").modal('hide');
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
        var id_facture = $('#id_facture').val();
        $("#list_voyage_facture > tbody > tr").each(function() {
            voyage.push($(this).find('td:eq(0)').text());
        })
            $.ajax({
                url : "{{ route('update_facture') }}",
                method : 'POST',
                dataType : 'json',
                data : {
                    _token : '{{ csrf_token() }}',
                    id_facture : id_facture,
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
                    $('#modal_modif').modal('hide');
                    Toast.fire({
                        icon : 'success',
                        title : 'Enregistrer avec succes'
                    });
                    table1.api().ajax.reload();
                    table.api().ajax.reload();
                }
            });

    })
    $('#mode').on('change', function(){
        if($('#mode').val() === 'echeance'){
            $('#echeance_').show();
        }else{
            $('#echeance_').hide();
        }
    });
    </script>
@endsection
