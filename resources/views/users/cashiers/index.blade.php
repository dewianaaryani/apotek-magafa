@extends('layout.app')
@section('title','Kasir')
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Kasir Table</h4>
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
                    <a href="{{ route('cashiers.create') }}" class="btn btn-primary">Add</a>          
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
                        <th>Name</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th>Email</th>
                        <th>Action</th>
                        </tr>
                        @foreach($cashiers as $cashier)
                          <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $cashier -> name}}</td>
                            <td>{{ $cashier -> address}}</td>
                            <td>{{ $cashier -> phone_number}}</td>
                            <td>{{ $cashier -> email}}</td>                                                                    
                            <td>
                              <form action="{{route('cashiers.destroy', $cashier->id)}}" method="post">
                                <a href="{{route('cashiers.edit', $cashier->id)}}" class="btn btn-warning">Edit</a>                            
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
              {{ $cashiers->links() }}   
            </div>
@stop