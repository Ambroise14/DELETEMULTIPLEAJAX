@extends('welcome')
@if (Session::has('userinfo'))
    <script>
        window.location.href="{{url('/')}}";
    </script>
@endif
@section('ambroise')
<div class="container mt-4 shadow-lg p-3 mb-5 bg-body rounded">
    <a href="{{url('product/pdf')}}">pdf</a>
    <span class="msg"></span>
    <div class="row">
        <table class="table tablle-bordered table-striped table-hover" id="product">
            <thead class="bg-danger text-white">
                <tr>
                    <th><button   type="button" class="deleteall">delete</button></th>
                    <th>Image</th>
                    <th>Id</th>
                    <th>Ref</th>
                    <th>Name</th>
                    <th>Statut</th>
                    <th>Popular</th>
                    <th>Action</th>
                    <th>Gallery</th>

                </tr>
            </thead>
            <tfoot class="bg-dark text-danger">
                <tr>
                    <th><button   type="button" class="deleteall">delete</button></th>
                    <th>Image</th>
                    <th>Id</th>
                    <th>Ref</th>
                    <th>Name</th>
                    <th>Statut</th>
                    <th>Popular</th>
                    <th>Action</th>
                    <th>Gallery</th>

                </tr>
            </tfoot>
            <tbody>
                @foreach ($datap as $item)
                    <tr>
                        <td>
                            <input type="checkbox" value="{{$item->id}}" name="idsp" class="idsp">
                        </td>
                        <td><img src="{{asset('storage/image/product/'.$item->image)}}" alt="" height="50px" width="70px"></td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->ref}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->statut()}}</td>
                        <td>{{$item->popular()}}</td>
                        <td>
                            @foreach($item->images as $value)
                            <img src="{{asset('image/product/'.$value->name)}}" height="50px" width="70px" data-id="{{$value->id}}" class="data-image">

                            @endforeach
                        </td>
                        <td>
                           
                        <button class="btn-warning  edit-data" onclick=" editproduct({{$item->id}})">edit</button>
                       
                        <a href="{{url('/product/delete/'.$item->id)}}">
                            <button class="btn-danger ">x</button>
                            </a>
                        </td>
                      
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('sessions.accordind')

    </div>
</div>
@section('nicki')
<script>
$(document).on('click','.data-image',function(){
var id=$(this).attr('data-id');
$.ajax({
    type:'get',
    url:"{{url('product/deleteimg')}}/"+id,
    success:function(response){
        alert('oui');
    }
})
});

$(document).on('click','.deleteall',function(){    
var idsp=[];
$('.idsp').each(function(){

 if($(this).is(":checked")){
    idsp.push($(this).val());
 }

});
ariane=idsp.toString();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    type:'post',
    url:"{{url('product/deleteselectedproduct')}}",
    data:'regina='+idsp,
    success:function(response){
alert('oui');
    }
})

});
</script>

@endsection
@endsection                                     