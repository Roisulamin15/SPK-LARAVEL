@extends('page')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Perhitungan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Perhitungan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Normalisasi</h3>
                        </div>
                        <div class="card-body">
                            <table id="normalisasi" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Alternatif</th>
                                        <th>hargalahan</th>
                                        <th>kepadatan penduduk</th>
                                        <th>atm kompetitor</th>
                                        <th>aksebilitas</th>
                                        <th>keamanaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $alternatif)
                                        <tr>
                                            <td>{{ $alternatif->alternatif }}</td>
                                            <td>{{ $alternatif->hargalahan != 0 ? ($minC1 / $alternatif->hargalahan) : 0 }}</td>
                                            <td>{{ $alternatif->kepadatanpenduduk != 0 ? ($alternatif->kepadatanpenduduk / $maxC2) : 0 }}</td>
                                            <td>{{ $alternatif->aksebilitas != 0 ? ($alternatif->aksebilitas / $maxC3) : 0 }}</td>
                                            <td>{{ $alternatif->keamanan != 0 ? ($alternatif->keamanan / $maxC4) : 0 }}</td>
                                            <td>{{ $alternatif->jenis != 0 ? ($alternatif->jenis / $maxC5) : 0 }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hasil</h3>
                        </div>
                        <div class="card-body">
                            <table id="hasil" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Alternatif</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $alternatif)
                                        <tr>
                                            <td>{{ $alternatif->alternatif }}</td>
                                            <td>
                                                {{
                                                    ($alternatif->hargalahan != 0 ? ($minC1 / $alternatif->hargalahan) * $widget1['kriteria'] : 0) +
                                                    ($alternatif->kepadatanpenduduk != 0 ? ($alternatif->kepadatanpenduduk / $maxC2) * $widget2['kriteria'] : 0) +
                                                    ($alternatif->aksebilitas != 0 ? ($alternatif->aksebilitas / $maxC3) * $widget3['kriteria'] : 0) +
                                                    ($alternatif->keamanan != 0 ? ($alternatif->keamanan / $maxC4) * $widget4['kriteria'] : 0) +
                                                    ($alternatif->jenis != 0 ? ($alternatif->jenis / $maxC5) * $widget5['kriteria'] : 0)
                                                }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection
