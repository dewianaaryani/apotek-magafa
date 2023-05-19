<!DOCTYPE html>
<html>
<head>
    <title>Print Struk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>Report Stock Bulan Ini</h1>
    
    <table class="table table-bordered">
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
                  <td>{{ $stock -> kind}}</td>
                  
                </tr>      
            @endforeach       
    </table>
    
    
</body>
</html>