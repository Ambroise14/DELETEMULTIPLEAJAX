@extends('welcome')
@section('ambroise')
    <div class="container mt-4">
        <div class="row">
           <form action="{{url('/category/store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <table class="table table-bordered">
            <tr>
                <th>Ref</th>
                <td><input type="text" name="ref" class="form-contol mt-2"></td>
            </tr>
            <tr>
                <th>name</th>
                <td><input type="text" name="name" class="form-contol mt-2"></td>
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
                <td colspan="4">
                    <button class="btn--primary btn-sm" type="submit">save</button>
                </td>
            </tr>
        </table>
        </form>
        </div>
    </div>
@endsection