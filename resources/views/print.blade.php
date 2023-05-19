<!DOCTYPE html>
<html>
<head>
    <title>Print Struk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>ID Transaksi : {{ $transaction->id }}</h1>
    <h2>Nama Pelanggan : {{ $transaction -> customer -> name}}</h2>
    <h2>Kasir : {{ $transaction -> cashier -> name}}</h2>
    <table class="table table-bordered">
        <tr>
            <th>Product</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total Harga</th>
        </tr>
        @foreach($dTransactions as $dtransaction)
        <tr>
                
            <td>{{ $dtransaction -> product -> name }}</td>
            <td>{{ rupiahFormat($dtransaction -> product -> harga_jual) }}</td>
            <td>{{ $dtransaction -> qty}}</td>
            <td>{{ rupiahFormat($dtransaction -> qty * $dtransaction -> product -> harga_jual)}}</td>
                              
        </tr>
        @endforeach
    </table>
    <h2>Total : {{ $transaction -> total }}</h2>
    <h2>Total Bayar : {{ $transaction -> pay}}</h2>
    <h2>Kembali : {{ $transaction -> change}}</h2>
    
</body>
</html>