@extends('template')
@section('title', 'Chauffeur')
@section('container')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">
                                <Cite>Chauffeur</Cite>
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
                            <button type="button" class="btn btn-block btn-secondary btn-flat" data-toggle="modal" data-target="#modal_add" >Ajouter</button>
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
                                    <h3 class="card-title">Liste des Chauffeurs</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div>
                                        <table id="list_chauffeur" class="table table-hover text-nowrap">
                                            <thead>
                                                <tr role="row">
                                                    <th>
                                                        Nom
                                                    </th>
                                                    <th >
                                                        Prénom
                                                    </th>
                                                    <th >
                                                        Numero Pérmis
                                                    </th>
                                                    <th >
                                                        Date Pérmis
                                                    </th>
                                                    <th >
                                                        Téléphone
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
                            <div class="modal fade show" id="modal_add" style="display: none; padding-right: 14px;" aria-modal="true">
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
                                      <form id="add_chauffeur">
                                          @csrf
                                          <div class="form-group">
                                              <label for="nom">Nom du chauffeur</label>
                                              <input type="text" class="form-control" name="nom" id="nom" required>
                                          </div>
                                          <div class="form-group">
                                              <label for="prenom">Prénom</label>
                                              <input type="text" class="form-control" name="prenom" id="prenom" >
                                          </div>
                                          <div class="form-group">
                                              <label for="permis">Numero Pérmis</label>
                                              <input type="text" class="form-control" name="permis" id="permis" required>
                                          </div>
                                          <div class="form-group">
                                              <label for="adresse">Date Pérmis</label>
                                              <input type="date" class="form-control" name="date_permis" id="date_permis">
                                          </div>
                                          <div class="form-group">
                                              <label for="tel">Téléphopne</label>
                                              <input type="text" class="form-control" name="tel" id="tel">
                                          </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Fermer</button>
                                      <button type="submit" class="btn btn-secondary btn-flat">Ajouter</button>
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
                                      <form id="modif_chauffeur">
                                          @csrf
                                          <input type="hidden" name="id_chauffeur" id="id_chauffeur">
                                          <div class="form-group">
                                              <label for="nom">Nom du chauffeur</label>
                                              <input type="text" class="form-control" name="nom" id="nomMod" required>
                                          </div>
                                          <div class="form-group">
                                              <label for="prenom">Prénom</label>
                                              <input type="text" class="form-control" name="prenom" id="prenomMod" >
                                          </div>
                                          <div class="form-group">
                                              <label for="cin">Numero Pérmis</label>
                                              <input type="text" class="form-control" name="permis" id="permisMod" required>
                                          </div>
                                          <div class="form-group">
                                              <label for="adresse">Date Pérmis</label>
                                              <input type="date" class="form-control" name="date_permis" id="date_permisMod">
                                          </div>
                                          <div class="form-group">
                                              <label for="tel">Téléphopne</label>
                                              <input type="text" class="form-control" name="tel" id="telMod">
                                          </div>
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
@endsection
@section('script')
<script>
    var table;
    $(document).ready(function(){
        table = $('#list_chauffeur').dataTable({
                "order" : [],
                "ajax" : {
                    "url" : "{{ route('list_chauffeur') }}",
                    "dataScr" : "data"
                },
                "columns" : [
                    {data: 'nom'},
                    {data: 'prenom'},
                    {data: 'permis'},
                    {data: 'date_permis'},
                    {data: 'tel'},
                    {data: 'action'}
                ]
            });
    })
    $('#add_chauffeur').unbind('submit').bind('submit', function() {
        var form = new FormData(this);
            $.ajax({
                url : "{{ route('add_chauffeur') }}",
                data : new FormData(this),
                type : "POST",
                contentType : false,
                cache : false,
                processData : false,
                dataType : 'json',
                success : function(response){
                    $("#add_chauffeur")[0].reset();
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
    $('#modif_chauffeur').unbind('submit').bind('submit', function() {
        var form = new FormData(this);
            $.ajax({
                url : "{{ route('update_chauffeur') }}",
                data : new FormData(this),
                type : "POST",
                contentType : false,
                cache : false,
                processData : false,
                dataType : 'json',
                success : function(response){
                    $("#modif_chauffeur")[0].reset();
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
                    url:"{{ route('get_chauffeur') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token : '{{ csrf_token() }}',
                        id_chauffeur : code
                    },
                    success: function(response){
                        $('#nomMod').val(response[0].nom);
                        $('#prenomMod').val(response[0].prenom);
                        $('#permisMod').val(response[0].permis);
                        $('#date_permisMod').val(response[0].date_permis);
                        $('#telMod').val(response[0].tel);
                        $('#id_chauffeur').val(response[0].id_chauffeur);
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
                                url: "{{ route('delete_chauffeur') }}",
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    _token : '{{ csrf_token() }}',
                                    id_chauffeur : code
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



</script>
@endsection
