@extends('layout.app')
@section('title','Transaksi')
@section('main-content')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
        <h4>Transaction Table ID: {{$transaction->id}}</h4>
            <div class="card-header-form">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div> 
            <a href="{{route('createDetailTransaction', $transaction->id)}}" class="btn btn-primary">Add</a>          
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
            <div class="row">
                <div class="col-10">
                    <h3 style="padding-left:50px;">Total Harga : {{number_format($transaction->total)}}</h3>
                </div>
                <div class="col-2">
                    <a href="{{ route('payTransaction',  $transaction->id) }}" class="btn btn-primary float-right">Selesai</a>  
                </div>
            </div>
            <table class="table table-striped">
            <tr>
            <th>No</th>
            <th>Name Product</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total Harga</th>

            </tr>
            @foreach($dTransactions as $dtransaction)
                <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $dtransaction -> product -> name }}</td>
                <td>{{ rupiahFormat($dtransaction -> product -> harga_jual) }}</td>
                <td>{{ $dtransaction -> qty}}</td>
                <td>{{ rupiahFormat($dtransaction -> qty * $dtransaction -> product -> harga_jual)}}</td>
                                                                              
 
                </tr>      
            @endforeach                                            
            </table>                                                                 
        </div>
    </div>
    </div>
    {{ $dTransactions->links() }}   
</div>

@stop