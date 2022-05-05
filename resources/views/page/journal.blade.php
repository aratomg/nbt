@extends('template')
@section('title', 'journal')
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
                    <button type="button" class="btn btn-block btn-secondary btn-flat" data-toggle="modal" data-target="#modal_add" >Ajouter Autre</button>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <button type="button" class="btn btn-block btn-secondary btn-flat" id="modal_add_piece" data-toggle="modal" data-target="#modal_piece">Achat Piece</button>
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
                    <button  class="btn btn-block btn-secondary btn-flat" data-toggle="modal" data-target="#modal_pneu">Achat Pneu</button>
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
                    <button type="button" class="btn btn-block btn-secondary btn-flat"data-toggle="modal" data-target="#modal_chek">Chek</button>
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
                            <h3 class="card-title">Journal Caisse {{ $anne }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <div>
                                <table id="list" class="table table-hover text-nowrap">
                                    <thead>
                                        <tr role="row">
                                            <th>
                                                Date
                                            </th>
                                            <th>
                                                Chek
                                            </th>
                                            <th >
                                                Designation
                                            </th>
                                            <th>
                                                Camion
                                            </th>
                                            <th>
                                                Autre
                                            </th>
                                            {{-- <th>
                                                Solde
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
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

        <div class="modal fade show" id="modal_add" style="display: none; padding-right: 14px;" aria-modal="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <form id="payer">
                      @csrf
                        <div class="form-group">
                            <label for="cin">Date</label>
                            <input type="date" class="form-control" name="date_autre" id="date_autre" >
                        </div>
                        <div class="form-group">
                            <label for="cin">Designation</label>
                            <input type="text" class="form-control" name="designation" id="designation" >
                        </div>
                        <div class="form-group">
                            <label for="prenom">Montant</label>
                            <input type="text" class="form-control" name="montant" id="montant" >
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

        <div class="modal fade show" id="modal_piece" style="display: none; padding-right: 14px;" aria-modal="true">
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
                  <form id="piece">
                      @csrf
                        <div class="form-group">
                            <label for="cin">Date</label>
                            <input type="date" class="form-control" name="date_piece" id="date_piece" >
                        </div>
                        <div class="form-group">
                            <label for="desigantion">Désigantion</label>
                            <input class="form-control" type="text" name="designation" id="designation_piece">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prix</label>
                            <input type="text" class="form-control" name="prix" id="prix" >
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fermer</button>
                  <button type="submit" class="btn btn-secondary btn-flat" id="ajouter_piece">Enregistrer</button>
                </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade show" id="modal_pneu" style="display: none; padding-right: 14px;" aria-modal="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <form id="pneu">
                      @csrf
                    <div class="form-group">
                        <label for="dte_pneu">Date Achat</label>
                        <input type="date" name="date_pneu" id="date_pneu" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="numero">numero</label>
                        <input type="text" class="form-control" name="numero" id="numero" required>
                    </div>
                    <div class="form-group">
                        <label for="reference">Reference</label>
                        <input type="text" class="form-control" name="reference" id="reference" min="20">
                    </div>
                    <div class="form-group">
                        <label for="marque">Marque</label>
                        <input type="text" class="form-control" name="marque" id="marque" >
                    </div>
                    <div class="form-group">
                      <label for="prix">Prix</label>
                      <input type="text" name="prix_pneu" id="prix_pneu" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fermer</button>
                  <button type="submit" class="btn btn-secondary btn-flat" id="ajouter">Enregistrer</button>
                </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade show" id="modal_chek" style="display: none; padding-right: 14px;" aria-modal="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <form id="chek">
                      @csrf
                        <div class="form-group">
                            <label for="cin">Date</label>
                            <input type="date" class="form-control" name="date_chek" id="date_chek" >
                        </div>
                        <div class="form-group">
                            <label for="nmreo">N°</label>
                            <input type="text" class="form-control" name="numero" id="numero">
                        </div>
                        <div class="form-group">
                            <label for="designation">Désignation</label>
                            <input type="text" class="form-control" name="designation" id="designation">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Montant</label>
                            <input type="text" class="form-control" name="montant_chek" id="montant" >
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fermer</button>
                  <button type="submit" class="btn btn-secondary btn-flat" id="ajouter">Enregistrer</button>
                </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
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
            table = $('#list').dataTable({
                "order" : [],
                "ajax" : {
                    "url" : "{{ route('journal_liste') }}",
                    "dataScr" : "data"
                },
                "columns" : [
                        {data: 'date'},
                        {data : 'chek'},
                        {data: 'designation'},
                        {data: 'camion'},
                        {data : 'autre'},
                        // {data : 'solde'}

                ],
                order: [
                    [0, 'Asc']
                ]
            });
        })
    $('#ajouter').on('click', function(){
        var date = $('#date_autre').val();
        var montant = $('#montant').val();
        var designation = $('#designation').val();
        $.ajax({
            url : "{{ route('add_autre') }}",
            method : 'POST',
            dataType : 'json',
            data : {
                _token : '{{ csrf_token() }}',
                date_autre : date,
                montant : montant,
                designation : designation
            },
            success : function(response){
                $('#modal_add').modal('hide');
                    Toast.fire({
                        icon : 'success',
                        title : 'Enregistrer avec succes'
                    });
                $("#payer")[0].reset();
                table.api().ajax.reload();
            }
        });
    })
    // $('#ajouter_piece').on('click', function(){
    //     var date = $('#date_piece').val();
    //     var designation_piece = $('#designation_piece').val();
    //     var prix = $('#prix').val();
    //     $.ajax({
    //         url : "{{ route('add_piece') }}",
    //         method : 'POST',
    //         dataType : 'json',
    //         data : {
    //             _token : '{{ csrf_token() }}',
    //             date_piece : date_piece,
    //             prix : prix,
    //             designation : designation_piece
    //         },
    //         success : function(response){
    //             $('#modal_piece').modal('hide');
    //                 Toast.fire({
    //                     icon : 'success',
    //                     title : 'Enregistrer avec succes'
    //                 });
    //             $("#piece")[0].reset();
    //             table.api().ajax.reload();
    //         }
    //     });
    // })
    $('#piece').unbind('submit').bind('submit', function() {
        var form = new FormData(this);
            $.ajax({
                url : "{{ route('add_piece') }}",
                data : new FormData(this),
                type : "POST",
                contentType : false,
                cache : false,
                processData : false,
                dataType : 'json',
                success : function(response){
                    $("#piece")[0].reset();
                    $('#modal_piece').modal('hide');
                    Toast.fire({
                        icon : 'success',
                        title : 'Enregistrer avec succes'
                    });
                    table.api().ajax.reload();
                }
            });
            return false;
    });
    $('#pneu').unbind('submit').bind('submit', function() {
        var form = new FormData(this);
            $.ajax({
                url : "{{ route('add_pneu') }}",
                data : new FormData(this),
                type : "POST",
                contentType : false,
                cache : false,
                processData : false,
                dataType : 'json',
                success : function(response){
                    $("#pneu")[0].reset();
                    $('#modal_pneu').modal('hide');
                    Toast.fire({
                        icon : 'success',
                        title : 'Enregistrer avec succes'
                    });
                    table.api().ajax.reload();
                }
            });
            return false;
    });
    $('#pneu').unbind('submit').bind('submit', function() {
        var form = new FormData(this);
            $.ajax({
                url : "{{ route('add_pneu') }}",
                data : new FormData(this),
                type : "POST",
                contentType : false,
                cache : false,
                processData : false,
                dataType : 'json',
                success : function(response){
                    $("#pneu")[0].reset();
                    $('#modal_pneu').modal('hide');
                    Toast.fire({
                        icon : 'success',
                        title : 'Enregistrer avec succes'
                    });
                    table.api().ajax.reload();
                }
            });
            return false;
    });
    $('#chek').unbind('submit').bind('submit', function() {
        var form = new FormData(this);
            $.ajax({
                url : "{{ route('add_chek') }}",
                data : new FormData(this),
                type : "POST",
                contentType : false,
                cache : false,
                processData : false,
                dataType : 'json',
                success : function(response){
                    $("#chek")[0].reset();
                    $('#modal_chek').modal('hide');
                    Toast.fire({
                        icon : 'success',
                        title : 'Enregistrer avec succes'
                    });
                    table.api().ajax.reload();
                }
            });
            return false;
    });
    </script>
@endsection
