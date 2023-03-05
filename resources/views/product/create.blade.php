@extends('welcome')
@section('ambroise')
    <div class="container mt-4 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="row">
 <form action="{{url('/product/store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table class="table table-bordered">
            <tr>
                <th>Category:</th>
                <td>
                   <select name="category">
                    @foreach($data as $item)
                    <option value="{{$item->id}}">{{$item->ref}}</option>
                    @endforeach
                   </select>
                </td>
            </tr>
            <tr>
                <th>Ref</th>
                <td><input type="text" name="ref" class="form-contol mt-2"></td>
            </tr>
            <tr>
                <th>name</th>
                <td><input type="text" name="name" class="form-contol mt-2"></td>
            </tr>
            <tr>
                <th>price</th>
                <td><input type="text" name="price" class="form-contol mt-2"></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><textarea name="desp" class="form-control"></textarea></td>
            </tr>
            <tr>
                <th>statut</th>
                <td><input type="radio" name="statut" class="mt-2"></td>
            </tr>
            <tr>
                <th>popular</th>
                <td><input type="radio" name="popular" class="mt-2"></td>
            </tr>
            <tr>
                <th>Image</th>
                <td><input type="file" name="image" class="form-contol mt-2"></td>
            </tr>

            <tr>
                <th>Gallery</th>
                <td><input type="file" name="photos[]" class="form-contol mt-2" multiple></td>
            </tr>
            <tr>
                <td colspan="4">
                    <button class="btn--primary btn-sm" type="submit">save</button>
                </td>
            </tr>
        </table>
        </form>
        </div>
    </div>
@endsection