@extends('layout.app')
@section('title','Report')
@section('main-content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Customer</h4>
          </div>
          <div class="card-body">
            {{ $customer }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-secondary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Cashier</h4>
          </div>
          <div class="card-body">
            {{ $cashier }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Product</h4>
          </div>
          <div class="card-body">
            {{ $product }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Selling This Month</h4>
          </div>
          <div class="card-body">
            {{number_format($selling)}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Transaction This Month</h4>
          <div class="card-header-form">
            <form >
              <div class="row">
                
                <div class="col4">
                  <a href="{{route('printReport')}}" class="btn btn-primary">Print</a>      
                </div>
              </div>
            </form>
          </div> 
          
        </div>
        <div class="card-body p-0">
          @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
                {{ $message }}
              </div>
            </div>                    
          @endif
          <div class="table-responsive">
            <table class="table table-striped">
              <tr>
              
              <th>Code Transaction</th>
              <th>Pelanggan</th>
              <th>Kasir</th>
              <th>Total Beli</th>
              <th>Total Bayar</th>
              <th>Kembali</th>
              </tr>    
              @foreach($transactions as $transaction)
                <tr>
                  
                  <td>{{ $transaction -> id }}</td>
                  <td>{{ $transaction -> customer -> name }}</td>
                  <td>{{ $transaction -> cashier -> name }}</td>
                  <td>{{ $transaction -> total}}</td>
                  <td>{{ $transaction -> pay}}</td>                                                              
                  <td>{{ $transaction -> change}}</td>
                </tr>      
            @endforeach                                        
            </table>                                                                 
        </div>
      </div>
    </div>
      
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Stock This Month</h4>
          <div class="card-header-form">
            <form >
              <div class="row">
                
                <div class="col-12">
                  <a href="{{route('printStocks')}}" class="btn btn-primary">Print</a>      
                </div>
              </div>
            </form>
          </div> 
          
        </div>
        <div class="card-body p-0">
          @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
                {{ $message }}
              </div>
            </div>                    
          @endif
          <div class="table-responsive">
            <table class="table table-striped">
              <tr>
              
                <th>Code</th>
                <th>Product Name</th>
                <th>QTY</th>
                <th>Jenis</th>
              </tr>    
              @foreach($stocks as $stock)
                <tr>
                  
                  <td>{{ $stock -> id }}</td>
                  <td>{{ $stock -> product -> name }}</td>
                  <td>{{ $stock -> qty }}</td>
                  <td>{{ $stock -> kind }}</td>
                </tr>      
            @endforeach                                        
            </table>                                                                 
        </div>
      </div>
    </div>
  </div>
@stop