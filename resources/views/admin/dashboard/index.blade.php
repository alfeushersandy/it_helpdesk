@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('breadcrumbs')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
            <h3>150</h3>
                <p>Ticket Bulan Ini</p>
            </div>
            <div class="icon">
            <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
        </div>
        
        <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Ticket Close</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
        </div>
        
        <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>44</h3>
            <p>Ticket On Progress</p>
            </div>
            <div class="icon">
            <i class="fas fa-user-plus"></i>
            </div>
            <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
        </div>
        
        <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
            <h3>65</h3>
            <p>Ticket Open</p>
            </div>
            <div class="icon">
            <i class="fas fa-chart-pie"></i>
            </div>
            <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
        </div>
    
    </div>
    <!-- /.row -->
    </div>
@endsection