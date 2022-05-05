@extends('template')
@section('title', 'voyage')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <Cite>voyages</Cite>
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
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <form action="{{ route('import-voyage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <div class="custom-file text-left">
                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button class="btn btn-primary">Import Users</button>
                        <a class="btn btn-success" href="{{ route('export-voyage') }}">Export Voyage</a>
                    </form>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
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
                            <h3 class="card-title">Liste des voyages</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive ">
                            <div>
                                <table id="list_voyage" class="table table-hover text-nowrap">
                                    <thead>
                                        <tr role="row">
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
                        <div class="modal-dialog modal-lg">
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
                                <form id="add_voyage">

                                <div class="row" id="partie1">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Date Voyage</label>
                                            <input type="date" name="date_voyage" id="date_voyage" class="form-control" required>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6 ">
                                                <label>Chauffeur</label>
                                                <select name="id_chauffeur" id="id_chauffeur" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;">
                                                  <option></option>
                                                  @forelse ($chauffeur as $key)
                                                      <option value="{{ $key->id_chauffeur }}"> {{ $key->prenom }}</option>
                                                  @empty

                                                  @endforelse
                                                </select>
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Camion</label>
                                                <select name="id_camion" id="id_camion" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    @forelse ($camion as $key)
                                                        <option value="{{ $key->id_camion }}">{{ $key->matricule }}</option>
                                                    @empty

                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Vatsy</label>
                                            <input type="text" class="form-control" name="vatsy" id="vatsy">
                                        </div>
                                        <div class="row">
                                            {{-- <div class="form-group col-6">
                                                <label for="">Client</label>
                                                <input type="text" name="client" id="client" class="form-control" required>
                                            </div> --}}
                                            <div class="form-group col-6">
                                                <label for="">Transit</label>
                                                <select  class="form-control select2bs4 select2-hidden-accessible" name="transit" id="transit" style="width: 100%;">
                                                    <option value=""></option>
                                                    @forelse ($transit as $key)
                                                        <option value="<?php echo $key->transit?>"> <?php echo $key->transit?></option>
                                                    @empty

                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Carte Gasoil </label>
                                            <select name="id_carte" id="id_carte" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;">
                                              <option></option>
                                              @forelse ($carte as $key)
                                                  <option value="{{ $key->id_carte }}"> {{ $key->libelle }}</option>
                                              @empty

                                              @endforelse
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="">Prix litre gasoil</label>
                                                <input type="text" name="montant_gasoil" id="montant_gasoil" class="form-control" required>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="">Gasoil en litre</label>
                                                <input type="text" name="gasoil_litre" id="gasoil_litre" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="prenom">Piece</label>
                                            <select name="id_piece" id="id_piece" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;">
                                                <option></option>
                                                @forelse ($piece as $key)
                                                    <option value="{{ $key->id_piece }}"> {{ $key->designation }}</option>
                                                @empty

                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pneu">Pneu</label>
                                            <select name="pneu" id="pneu" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;">
                                                <option></option>
                                                @forelse ($pneu as $key)
                                                    <option value="{{ $key->id_pneu }}"> {{ $key->numero }}</option>
                                                @empty

                                                @endforelse
                                              </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="partie2">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Tonnage aller</label>
                                            <input type="number" name="tonnage_aller" id="tonnage_aller" class="form-control" min="0">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="">Transit Retour</label>
                                                <input type="text" name="retour" id="retour" class="form-control" >
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="">Tonnage retour</label>
                                                <input type="number" name="tonnage_retout" id="tonnage_retour" class="form-control"min=0>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        {{-- <div class="form-group">
                                            <label for="">Reference Marchandise</label>
                                            <input type="text" name="ref_marc" id="ref_marc" class="form-control" >
                                        </div> --}}
                                        {{-- <div class="row">
                                            <div class="form-group col-6">
                                                <label>Nombre</label>
                                                <input type="number" name="nombre" id="nombre" class="form-control" min="0" onmouseout="total()">
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Prix unitaire</label>
                                                <input type="text" name="prix_unitaire" id="prix_unitaire" class="form-control" onmouseout="total()">
                                            </div>
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="">Montant</label>
                                            <input type="text" name="montant" id="montant" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Comission</label>
                                            <input type="text" name="com" id="com" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal" id="fermer">Fermer</button>
                              <button type="button" class="btn btn-secondary btn-flat" onclick="prev_step()" id="prev">Précèdent</button>
                              <button type="button" class="btn btn-secondary btn-flat" onclick='next_step()' id="next">Suivant</button>
                              <button type="button" class="btn btn-secondary btn-flat" onclick='Save()' id="ajouter">Ajouter</button>
                            </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>

                    <!--modal modif -->
                    <div class="modal fade show" id="modal_modif" style="display: none; padding-right: 14px;" aria-modal="true">
                        <div class="modal-dialog modal-lg">
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
                                <form id="modif_voyage">

                                    <div class="row" id="partie_1">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Date Voyage</label>
                                                <input type="hidden" id="id_voyage">
                                                <input type="date" name="date_voyage" id="date_voyageMod" class="form-control">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label>Chauffeur</label>
                                                    <select name="id_chauffeur" id="id_chauffeurMod" class="form-control">
                                                      <option></option>
                                                      @forelse ($chauffeur as $key)
                                                          <option value="{{ $key->id_chauffeur }}"> {{ $key->nom }}</option>
                                                      @empty

                                                      @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>Camion</label>
                                                    <select name="id_camion" id="id_camionMod" class="form-control">
                                                        <option value=""></option>
                                                        @forelse ($camion as $key)
                                                            <option value="{{ $key->id_camion }}">{{ $key->matricule }}</option>
                                                        @empty

                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Vatsy</label>
                                                <input type="text" class="form-control" name="vatsy" id="vatsyMod">
                                            </div>
                                            <div class="row">
                                                {{-- <div class="form-group col-6">
                                                    <label for="">Client</label>
                                                    <input type="text" name="client" id="clientMod" class="form-control">
                                                </div> --}}
                                                <div class="form-group col-6">
                                                    <label for="">Transit</label>
                                                    <input type="text" name="transit" id="transitMod" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Carte Gasoil </label>
                                                <select name="id_carte" id="id_carteMod" class="form-control">
                                                  <option></option>
                                                  @forelse ($carte as $key)
                                                      <option value="{{ $key->id_carte }}"> {{ $key->libelle }}</option>
                                                  @empty

                                                  @endforelse
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="">Montant Gasoil</label>
                                                    <input type="hidden" id="id_depense">
                                                    <input type="text" name="montant_gasoil" id="montant_gasoilMod" class="form-control">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="">Gasoil en litre</label>
                                                    <input type="text" name="gasoil_litre" id="gasoil_litreMod" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="prenom">Piece</label>
                                                <input type="text" class="form-control" name="piece" id="pieceMod" >
                                            </div>
                                            <div class="form-group">
                                                <label for="cin">Pneu</label>
                                                <input type="text" class="form-control" name="pneu" id="pneuMod" >
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row" id="partie_2">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Tonnage aller</label>
                                                <input type="hidden" name="id_detail" id="id_detail">
                                                <input type="number" name="tonnage_aller" id="tonnage_allerMod" class="form-control" min="0">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="">Transit Retour</label>
                                                    <input type="text" name="retour" id="retourMod" class="form-control" >
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="">Tonnage retour</label>
                                                    <input type="number" name="tonnage_retour" id="tonnage_retourMod" class="form-control" min="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            {{-- <div class="form-group">
                                                <label for="">Reference Marchandise</label>
                                                <input type="text" name="ref_marc" id="ref_marcMod" class="form-control" > --}}
                                            </div>
                                            {{-- <div class="row">
                                                <div class="form-group col-6">
                                                    <label>Nombre</label>
                                                    <input type="number" name="nombre" id="nombreMod" class="form-control" min="0" onmouseout="total1()">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>Prix unitaire</label>
                                                    <input type="text" name="prix_unitaire" id="prix_unitaireMod" class="form-control" onmouseout="total1()">
                                                </div>
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="">Montant</label>
                                                <input type="text" name="montant" id="montantMod" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Comission</label>
                                                <input type="text" name="com" id="comMod" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal" id="fermer_1">Fermer</button>
                                <button type="button" class="btn btn-secondary btn-flat" onclick="prev_step1()" id="prev_1">Précèdent</button>
                                <button type="button" class="btn btn-secondary btn-flat" onclick='next_step1()' id="next_1">Suivant</button>
                                <button type="button" class="btn btn-secondary btn-flat" onclick="modfication()" id='ajouter_1'>Enregistrer</button>
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
            $('#prev').hide();
            $('#prev_1').hide();
            $('#ajouter').hide();
            $('#ajouter_1').hide();
            $('#partie2').hide();
            $('#partie_2').hide();
            table = $('#list_voyage').dataTable({
                    "order" : [],
                    "ajax" : {
                        "url" : "{{ route('list_voyage') }}",
                        "dataScr" : "data"
                    },
                    "columns" : [
                        {data: 'date_voyage'},
                        {data: 'transit'},
                        // {data: 'client'},
                        {data : 'camion'},
                        {data : 'com'},
                        {data : 'montant'},
                        {data : 'montant_gasoil'},
                        {data : 'gasoil_litre'},
                        {data : 'piece'},
                        {data : 'pneu'},
                        {data : 'vatsy'},
                        {data: 'action'}
                    ]
                });

        })
        function next_step() {
            $('#partie1').hide();
            $('#next').hide();
            $('#prev').show();
            $('#ajouter').show();
            $('#partie2').show();
        }
        function next_step1() {
            $('#partie_1').hide();
            $('#next_1').hide();
            $('#prev_1').show();
            $('#ajouter_1').show();
            $('#partie_2').show();
        }
        function prev_step() {
            $('#prev').hide();
            $('#next').show();
            $('#ajouter').hide();
            $('#partie1').show();
            $('#partie2').hide();
        }
        function prev_step1() {
            $('#prev_1').hide();
            $('#next_1').show();
            $('#ajouter_1').hide();
            $('#partie_1').show();
            $('#partie_2').hide();
        }
        function Save() {
            var date = $('#date_voyage').val();
            var transit = $('#transit').val();
            // var client = $('#client').val();
            var id_camion = $('#id_camion').val();
            var id_chauffeur = $('#id_chauffeur').val();
            var com = $('#com').val();
            var montant = $('#montant').val();
            var id_carte = $('#id_carte').val();
            var montant_gasoil = $('#montant_gasoil').val();
            var gasoil_litre = $('#gasoil_litre').val();
            var piece = $('#piece').val();
            var pneu = $('#pneu').val();
            var vatsy = $('#vatsy').val();
            var tonnage_aller = $('#tonnage_aller').val();
            var retour = $('#retour').val();
            var tonnage_retour = $('#tonnage_retour').val();
            var norme = $('#norme').val();
            var prix_unitaire = $('#prix_unitaire').val();
            var nombre = $('#nombre').val();
            var ref_marc = $('#ref_marc').val();
                $.ajax({
                    url : "{{ route('add_voyage') }}",
                    data : {
                        _token : '{{ csrf_token() }}',
                        date_voyage : date,
                        transit : transit,
                        // client : client,
                        id_camion : id_camion,
                        id_chauffeur : id_chauffeur,
                        com : com,
                        montant : montant,
                        id_carte : id_carte,

                    },
                    type : "POST",
                    dataType : 'json',
                    success : function(response){
                        $.ajax({
                            url : "{{ route('add_depense') }}",
                            data : {
                                _token : '{{ csrf_token() }}',
                                id_voyage : response.id_voyage,
                                montant_gasoil : montant_gasoil,
                                gasoil_litre : gasoil_litre,
                                piece : piece,
                                pneu : pneu,
                                vatsy : vatsy,
                            },
                            type : "POST",
                            dataType : 'json',
                            success : function(response){
                                $.ajax({
                                    url : "{{ route('add_detail') }}",
                                    data : {
                                        _token : '{{ csrf_token() }}',
                                        id_voyage : response.id_voyage,
                                        tonnage_aller : tonnage_aller,
                                        retour : retour,
                                        tonnage_retour : tonnage_retour,
                                        norme : norme,
                                        ref_marc : ref_marc,
                                        prix_unitaire : prix_unitaire,
                                        nombre : nombre,
                                    },
                                    type : "POST",
                                    dataType : 'json',
                                    success : function(response){
                                        $("#add_voyage")[0].reset();
                                        $('#modal_add').modal('hide');
                                        Toast.fire({
                                            icon : 'success',
                                            title : 'Enregistrer avec succes'
                                        });
                                        $('#prev').hide();
                                        $('#next').show();
                                        $('#ajouter').hide();
                                        $('#partie1').show();
                                        $('#partie2').hide();
                                        table.api().ajax.reload();

                                    }
                                });
                            }
                        });
                    }
                });
                return false;
        }
        function modif(code){
        if(code){
            $.ajax({
                    url:"{{ route('get_voyage') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token : '{{ csrf_token() }}',
                        id_voyage : code
                    },
                    success: function(response){
                        $('#id_voyage').val(response[0].id_voyage);
                        $('#date_voyageMod').val(response[0].date_voyage);
                        // $('#clientMod').val(response[0].client);
                        $('#transitMod').val(response[0].transit);
                        $('#id_camionMod').val(response[0].id_camion);
                        $('#id_chauffeurMod').val(response[0].id_chauffeur);
                        $('#comMod').val(response[0].com);
                        $('#montantMod').val(response[0].montant);
                        $('#id_carteMod').val(response[0].id_carte);
                        $('#id_depense').val(response[0].id_depense);
                        $('#montant_gasoilMod').val(response[0].montant_gasoil);
                        $('#gasoil_litreMod').val(response[0].gasoil_litre);
                        $('#pieceMod').val(response[0].piece);
                        $('#pneuMod').val(response[0].pneu);
                        $('#vatsyMod').val(response[0].vatsy);
                        $('#id_detail').val(response[0].id_detail);
                        $('#tonnage_allerMod').val(response[0].tonnage_aller);
                        $('#retourMod').val(response[0].retour);
                        $('#tonnage_retourMod').val(response[0].tonnage_retour);
                        $('#normeMod').val(response[0].norme);
                        $('#prix_unitaireMod').val(response[0].prix_unitaire);
                        $('#nombreMod').val(response[0].nombre);
                        $('#ref_marcMod').val(response[0].ref_marc);
                        $('#modal_modif').modal('show');
                    }
                });
        }else{
            alert('Il y a une erreur! Veuillez actualiser la page s\'il vous plaît');
        }
    }

    function modfication() {
            var id_depense = $('#id_depense').val();
            var id_voyage = $('#id_voyage').val();
            var date = $('#date_voyageMod').val();
            var transit = $('#transitMod').val();
            // var client = $('#clientMod').val();
            var id_camion = $('#id_camionMod').val();
            var id_chauffeur = $('#id_chauffeurMod').val();
            var com = $('#comMod').val();
            var montant = $('#montantMod').val();
            var id_carte = $('#id_carteMod').val();
            var montant_gasoil = $('#montant_gasoilMod').val();
            var gasoil_litre = $('#gasoil_litreMod').val();
            var piece = $('#pieceMod').val();
            var pneu = $('#pneuMod').val();
            var vatsy = $('#vatsyMod').val();
            var id_detail = $('#id_detail').val();
            var tonnage_aller = $('#tonnage_allerMod').val();
            var retour = $('#retourMod').val();
            var tonnage_retour = $('#tonnage_retourMod').val();
            var norme = $('#normeMod').val();
            var ref_marc = $('#ref_marcMod').val();
            var prix_unitaire = $('#prix_unitaireMod').val();
            var nombre = $('#nombreMod').val();
                $.ajax({
                    url : "{{ route('update_voyage') }}",
                    data : {
                        _token : '{{ csrf_token() }}',
                        id_voyage : id_voyage,
                        date_voyage : date,
                        transit : transit,
                        // client : client,
                        id_camion : id_camion,
                        id_chauffeur : id_chauffeur,
                        com : com,
                        montant : montant,
                        id_carte : id_carte,
                    },
                    type : "POST",
                    dataType : 'json',
                    success : function(response){
                        $.ajax({
                            url : "{{ route('update_depense') }}",
                            data : {
                                _token : '{{ csrf_token() }}',
                                id_depense : id_depense,
                                montant_gasoil : montant_gasoil,
                                gasoil_litre : gasoil_litre,
                                piece : piece,
                                pneu : pneu,
                                vatsy : vatsy,
                            },
                            type : "POST",
                            dataType : 'json',
                            success : function(response){
                                $.ajax({
                                    url : "{{ route('update_detail') }}",
                                    data : {
                                        _token : '{{ csrf_token() }}',
                                        id_detail : id_detail,
                                        tonnage_aller : tonnage_aller,
                                        retour : retour,
                                        tonnage_retour : tonnage_retour,
                                        norme : norme,
                                        ref_marc : ref_marc,
                                        prix_unitaire : prix_unitaire,
                                        nombre : nombre,
                                    },
                                    type : "POST",
                                    dataType : 'json',
                                    success : function(response){
                                        $("#modif_voyage")[0].reset();
                                        $('#modal_modif').modal('hide');
                                        Toast.fire({
                                            icon : 'success',
                                            title : 'Enregistrer avec succes'
                                        });
                                        $('#prev_1').hide();
                                        $('#next_1').show();
                                        $('#ajouter_1').hide();
                                        $('#partie_1').show();
                                        $('#partie_2').hide();
                                        table.api().ajax.reload();
                                    }
                                });
                            }
                        });
                    }
                });
                return false;

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
                                url: "{{ route('delete_voyage') }}",
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    _token : '{{ csrf_token() }}',
                                    id_voyage : code
                                }
                            })
                            .done(function(response) {
                                $.ajax({
                                    url: "{{ route('delete_depense') }}",
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {
                                        _token : '{{ csrf_token() }}',
                                        id_voyage : code
                                    }
                                })
                                .done(function(response) {
                                    $.ajax({
                                        url: "{{ route('delete_detail') }}",
                                        type: 'POST',
                                        dataType: 'json',
                                        data: {
                                            _token : '{{ csrf_token() }}',
                                            id_voyage : code
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
                                })
                                .fail(function(response) {
                                    Swal.fire(
                                        'Oops',
                                        'Il y a une erreur! Veuillez actualiser la page s\'il vous plaît',
                                        'error'
                                    );
                                });
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
    function total() {
        var prix = $('#prix_unitaire').val();
        var nb = $('#nombre').val();
        if (prix != null && nb != null) {
            $('#montant').val(prix*nb);
        }
    }
    function total1() {
        var prix = $('#prix_unitaireMod').val();
        var nb = $('#nombreMod').val();
        if (prix != null && nb != null) {
            $('#montantMod').val(prix*nb);
        }
    }
    </script>
@endsection
