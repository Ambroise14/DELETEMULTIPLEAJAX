@extends('welcome')
@section('ambroise')
<div class="container mt-4">
    <div class="row">
        <table class="table tablle-bordered table-striped table-hover" id="category">
            <thead class="bg-danger text-white">
                <tr>
                    <th>Id</th>
                    <th>Ref</th>
                    <th>Name</th>
                    <th>Statut</th>
                    <th>Popular</th>
                    <th>Imaghe</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot class="bg-dark text-danger">
                <tr>
                    <th>Id</th>
                    <th>Ref</th>
                    <th>Name</th>
                    <th>Statut</th>
                    <th>Popular</th>
                    <th>Imaghe</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->ref}}</td>
                        <td>{{$item->name}}</td>
                        <td class="bg-dark text-white">{{$item->statut()}}</td>
                        <td>{{$item->popular()}}</td>
                        <td><img src="{{asset('storage/image/category/'.$item->image)}}" alt="" height="50px" width="70px"></td>
                        <td>
                           <a href="{{url('')}}">
                        <button class="btn-warning btn-sm">edit</button>
                        </a>
                        <a href="{{url('/category/delete/'.$item->id)}}">
                            <button class="btn-danger btn-sm">delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection