@extends('template')
@section('title', 'Recouvrement')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <Cite>Recouvrement</Cite>
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
                    {{-- <button type="button" class="btn btn-block btn-secondary btn-flat" id="add_facture">Ajouter</button> --}}
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
                            <h3 class="card-title">Liste des factures Non Payé</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <div>
                                <table id="list_recouvrement" class="table table-hover text-nowrap">
                                    <thead>
                                        <tr role="row">
                                            <th>
                                                N° facture
                                            </th>
                                            <th >
                                                Type
                                            </th>
                                            <th>
                                                Date echeance
                                            </th>
                                            <th>
                                                Montant
                                            </th>
                                            <th>
                                                Date payement
                                            </th>
                                            <th>
                                                Montant payé
                                            </th>
                                            <th>
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
                              <form id="payer">
                                  @csrf
                                    <div class="form-group">
                                        <label for="cin">Date Recouvrement</label>
                                        <input type="hidden" id="id_recouvrement" name="id_recouvrement">
                                        <input type="date" class="form-control" name="date_payement" id="date_payement" >
                                    </div>
                                    <div class="form-group ">
                                        <label for="Type de payement">Type de payement</label>
                                        <select name="type_p" id="type_p" class="form-control" required>
                                            <option value=""></option>
                                            <option value="Espece">Espece</option>
                                            <option value="Cheque">Cheque</option>
                                        </select>
                                    </div>
                                  <div class="esp">
                                    <div class="form-group">
                                        <label for="prenom">Montant</label>
                                        <input type="text" class="form-control" name="montant_payement" id="montant_payement" >
                                    </div>
                                  </div>
                                  <div id="cq">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Date Cheque</label>
                                        <input type="date" class="form-control" name="date_cheque" id="date_chek" >
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-form-label">N°</label>
                                        <input type="text" class="form-control" name="numero" id="numero" >
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Montant</label>
                                        <input type="number" class="form-control" name="montant" id="montant" >
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fermer</button>
                              <button type="button" class="btn btn-secondary btn-flat" id="ajouter">Enregistrer</button>
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
            $('#cq').hide();
            table = $('#list_recouvrement').dataTable({
                "order" : [],
                "ajax" : {
                    "url" : "{{ route('liste_recouvrement') }}",
                    "dataScr" : "data"
                },
                "columns" : [
                    {data: 'num_fac'},
                    {data: 'type'},
                    {data: 'date'},
                    {data: 'montant'},
                    {data: 'date1'},
                    {data: 'montant1'},
                    {data: 'action'}
                ]
            });
        })
        function modif(code){
            $('#id_facture').val(code);
            $('#modal_modif').modal('show');
        }
        $('#payer').unbind('submit').bind('submit', function() {
        var form = new FormData(this);
            $.ajax({
                url : "{{ route('add_recouvrement') }}",
                data : new FormData(this),
                type : "POST",
                contentType : false,
                cache : false,
                processData : false,
                dataType : 'json',
                success : function(response){
                    $.ajax({
                        url : "{{ route('add_cheque') }}",
                        data : new FormData(this),
                        type : "POST",
                        contentType : false,
                        cache : false,
                        processData : false,
                        dataType : 'json',
                        success : function(response){
                            $("#payer")[0].reset();
                            $('#modal_modif').modal('hide');
                            Toast.fire({
                                icon : 'success',
                                title : 'Enregistrer avec succes'
                            });
                            table.api().ajax.reload();
                        }
                    });
                }
            });
            return false;
    });
    $('#type_p').on('change', function(){
        if($('#type_p').val() === 'Cheque') {
            $('#cq').show();
            $('.esp').hide();
        }else{
            $('#cq').hide();
            $('.esp').show();
        }
    });
    $('#ajouter').on('click', function() {
        var id_facture = $('#id_facture').val();
        var date_payement = $('#date_payement').val();
        var date_chek = $('#date_chek').val();
        var numero = $('#numero').val();
        if ($('#type_p').val() === 'Cheque') {
            var montant = $('#montant').val();
        }else{
            var montant = $('#montant_payement').val();
        }
        $.ajax({
            url : "{{ route('add_recouvrement') }}",
            method : 'POST',
            dataType : 'json',
            data : {
                _token : '{{ csrf_token() }}',
                id_facture : id_facture,
                date_payement : date_payement,
                montant_payement : montant
            },
            success : function(response){
                $.ajax({
                    url : "{{ route('add_chek') }}",
                    method : 'POST',
                    dataType : 'json',
                    data : {
                        _token : '{{ csrf_token() }}',
                        id_facture : id_facture,
                        date_chek : date_chek,
                        montant_chek : montant,
                        numero : numero
                    },
                    success : function(response){
                    }
                });
                $("#payer")[0].reset();
                $('#modal_modif').modal('hide');
                Toast.fire({
                    icon : 'success',
                    title : 'Enregistrer avec succes'
                });
                table.api().ajax.reload();
            }
        });
    })


    </script>
@endsection
