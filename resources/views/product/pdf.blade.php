<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
     crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  
<div class="container mt-4 shadow-lg p-3 mb-5 bg-body rounded">
    <span class="msg"></span>
    <div class="row">
        <table class="table tablle-bordered table-striped table-hover">
            <thead class="bg-danger text-white">
                <tr>
                    <th>Id</th>
                    <th>Ref</th>
                    <th>Name</th>
                    <th>Statut</th>
                    <th>Popular</th>
                    

                </tr>
            </thead>
          
            <tbody>
                @foreach ($ariane as $item)
                    <tr>
                        
                        <td>{{$item->id}}</td>
                        <td>{{$item->ref}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->statut()}}</td>
                        <td>{{$item->popular()}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-dark text-danger">
                <tr>
                    <th>Id</th>
                    <th>Ref</th>
                    <th>Name</th>
                    <th>Statut</th>
                    <th>Popular</th>
                    

                </tr>
            </tfoot>
        </table>
        {{ \Carbon\Carbon::now()->toDateString() }} 
    </div>
</div>
  
</body>
</html>
                                