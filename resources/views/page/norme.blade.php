@extends('template')
@section('title', 'Carte gasoil')
@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-7">
                    <h1 class="m-0 text-dark">
                        <Cite>Norme de chaque camion en {{ $mois}}-{{ $anne }}</Cite>
                    </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-5">
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
                    <div class="form-group">
                        <label for="">Année</label>
                        <select name="annee" id="annee" class="form-control" onchange="mois()">
                            <option value=""></option>
                            @forelse ($annee as $key)
                                <option value="{{ $key->annee }}">{{ $key->annee }}</option>
                            @empty

                            @endforelse
                        </select>

                    </div>
                    <button type="button" class="btn btn-block btn-secondary btn-flat" id="norme">Valider</button>
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
                    <div class="form-group">
                        <label for="">Mois</label>
                        <select name="mois" id="mois" class="form-control">

                        </select>
                    </div>
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

                    <br>

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
                        <?php $total = 0 ?>
                        @forelse ($camion as $key)
                        <div class="card-header">
                            <h3 class="card-title">Camion {{ $key->matricule }}<b class="text-primary"></b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div>
                                <table id="list_carte" class="table table-hover text-nowrap">
                                    <thead>
                                        <tr role="row">
                                            <th >
                                                Date voyage
                                            </th>
                                            <th >
                                                Client
                                            </th>
                                            <th >
                                                Tonnage
                                            </th>
                                            <th>
                                                Retour
                                            </th>
                                            <th>
                                                Tonnage
                                            </th>
                                            <th>
                                                Norme
                                            </th>
                                            <th>
                                                Gasoil
                                            </th>
                                            <th>
                                                Ecart
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($key->voyage as $key)
                                            <tr>
                                                <td>
                                                    {{ utf8_decode(utf8_encode(strftime('%d %b %Y', strtotime($key->date_voyage)))) }}
                                                </td>
                                                <td>
                                                    {{ $key->client }}
                                                </td>
                                                <td>
                                                    {{ $key->tonnage_aller }}
                                                </td>
                                                <td>
                                                    {{ $key->retour }}
                                                </td>
                                                <td>
                                                    {{ $key->tonnage_retour }}
                                                </td>
                                                <td>
                                                    {{ $key->norme }}
                                                </td>
                                                <td>
                                                    {{ $key->gasoil_litre }}
                                                </td>
                                                <td>
                                                    {{ $key->norme - $key->gasoil_litre }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-3 col-6">
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
                                    <h6>Total {{ $total += $key->norme - $key->gasoil_litre }}</h6>
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
                        </div>
                        @empty

                        @endforelse
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
    // $(document).on('change','#id_carte', function() {

    //     });
    function mois() {
        var annee = $('#annee').val();
            $.ajax({
                url : "{{ route('norme.mois') }}",
                Type : 'POST',
                datatype : 'json',
                data : {
                    _token : '{{ csrf_token() }}',
                    annee : annee
                },
                success:function(response){
                    var mois  = JSON.parse(response);
                    var html = '<option></option>';
                    for (let i = 0; i < mois.length; i++) {
                        html += '<option value="'+mois[i].mois+'">'+mois[i].mois+'</option>';
                    }
                    $('#mois').html(html);
                }
            });
            return false;
    }
    $('#norme').on('click', function(){
        var annee = $('#annee').val();
        var mois = $('#mois').val();
        if (annee && annee) {
            $.ajax({
                url : "{{ route('page.norme') }}",
                Type : 'POST',
                datatype : 'json',
                data : {
                    _token : '{{ csrf_token() }}',
                    annee : annee,
                    mois : mois
                },
                success:function(response){
                    document.open();
                    document.write(response);
                    document.close();
                }
            });
            return false;
        }
    })
    </script>
@endsection
