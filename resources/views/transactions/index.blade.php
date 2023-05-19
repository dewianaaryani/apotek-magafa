@extends('layout.app')
@section('title','Transaction')
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Transaction Table</h4>
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
                    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Add</a>          
                    <!-- <button class="btn btn-primary" id="modal-5" data-href="{{URL::to('products/index')}}">Login</button>
                    <form class="modal-part" id="modal-login-part">
                      <p>This login form is taken from elements with <code>#modal-login-part</code> id.</p>
                      <div class="form-group">
                        <label>Username</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-envelope"></i>
                            </div>
                          </div>
                          <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>
                      </div>                                                    
                    </form>     -->
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
                        <th>No</th>
                        <th>Customer</th>
                        <th>Kasir</th>
                        <th>Total</th>
                        <th>Pay</th>
                        <th>Kembali</th>
                        <th>Actions</th>
                        </tr>
                        @foreach($transactions as $transaction)
                          <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $transaction -> customer_name}}</td>
                            <td>{{ $transaction -> cashier_name}}</td>
                            <td>{{ $transaction -> total}}</td>
                            <td>{{ $transaction -> pay}}</td>
                            <td>{{ $transaction -> change}}</td>
                            <td>
                              <form action="{{route('transactions.destroy', $transaction->id)}}" method="post">                    
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>      
                        @endforeach                                                                
                      </table>                                                                 
                  </div>
                </div>
              </div>
              {{ $transactions->links() }}   
            </div>
@stop
