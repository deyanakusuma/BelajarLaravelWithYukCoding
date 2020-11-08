@extends('main')

@section('title', 'Program')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Program</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Program</a></li>
                    <li class="#">Data</li>
                    <li class="active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div> 
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card-header">
            <div class="pull-left">
                <strong>Detail Program</strong>
            </div>
            <div class="pull-right">
                <a href="{{url('programs')}}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-back"></i>Back
                </a>
            </div>
            <div class="card-body table-reponsive">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Edulevel</th>
                                    <td>{{$program->edulevel->name}}</td>
                                </tr>
                                <tr>
                                    <th>Program</th>
                                    <td>{{$program->name}}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{$program->student_price}}</td>
                                </tr>
                                <tr>
                                    <th>Maximal Student</th>
                                    <td>{{$program->student_max}}</td>
                                </tr>
                                <tr>
                                    <th>Informasi</th>
                                    <td>{{$program->info}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection