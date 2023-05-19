<!DOCTYPE html>
<html>
<head>
    <title>Print Struk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>Report Penjualan Bulan Ini</h1>
    
    <table class="table table-bordered">
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
    
    
</body>
</html>