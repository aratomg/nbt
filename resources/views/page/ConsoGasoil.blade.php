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
                        <Cite>Consomation Gasoil</Cite>
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
                    <div class="form-group">
                        <label for="">Carte Gasoil</label>
                        <select name="id_carte" id="id_carte" class="form-control" onchange="change()">
                            <option value=""></option>
                            @forelse ($carte as $key)
                                <option value="{{ $key->id_carte }}">{{ $key->libelle }}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>
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
                            <h3 class="card-title">Consomation sur cette carte <b class="text-primary">{{ $carte_gasoil[0]->libelle }}</b></h3>
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
                                                Vehicule / Client
                                            </th>
                                            <th >
                                                Gasoil en litre
                                            </th>
                                            <th>
                                                Montant gasoil
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($voyage as $key)
                                            <tr>
                                                <td>
                                                    {{ utf8_decode(utf8_encode(strftime('%d %b %Y', strtotime($key->date_voyage)))) }}
                                                </td>
                                                <td>
                                                    {{ $key->matricule }} {{ $key->client }}
                                                </td>
                                                <td>
                                                    {{ $key->gasoil_litre }}
                                                </td>
                                                <td>
                                                    {{ $key->montant_gasoil }}
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse
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
                                    <h6>Total</h6>
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
                                    <h6>{{ $key->total_go }} litres</h6>
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
                                    <h6>{{ $key->total_montant }} Ar</h6>
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
    function change() {
        var id_carte = $('#id_carte').val();
            $.ajax({
                url : "{{ route('page.conso') }}",
                Method : 'POST',
                datatype : 'json',
                data : {
                    _token : '{{ csrf_token() }}',
                    id_carte : id_carte
                },
                success:function(response){
                    document.open();
                    document.write(response);
                    document.close();
                }
            });
            return false;
    }
    </script>
@endsection
