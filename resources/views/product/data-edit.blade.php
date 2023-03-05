<form action="{{url('/product/update/'.$data->id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table class="table table-bordered">
        <tr>
            <th>Category:</th>
            <td>
                <select name="category">
                    @foreach($cat as $item)
                    <option value="{{$item->id}}" {{$item->id===$data->id ? 'selected':''}}>{{$item->name}}</option>
                    @endforeach
                   </select>
            </td>
        </tr>
        <tr>
            <th>Ref</th>
            <td><input type="text" name="ref" class="form-contol mt-2"  id="refedit" value="{{$data->ref}}"></td>
        </tr>
        <tr>
            <th>name</th>
            <td><input type="text" name="name" class="form-contol mt-2" id="nameedit" value="{{$data->name}}"></td>
        </tr>
        <tr>
            <th>price</th>
            <td><input type="text" name="price" class="form-contol mt-2" id="priceedit" value="{{$data->price}}"></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><textarea name="desp" class="form-control" id="despedit">{{$data->desp}}</textarea></td>
        </tr>
        <tr>
            <th>statut</th>
            <td><input type="radio" name="statut" class="mt-2" {{$data->statut=='1' ? 'checked':''}}></td>
        </tr>
        <tr>
            <th>popular</th>
            <td><input type="radio" name="popular" class="mt-2" {{$data->popular=='1' ? 'checked':''}}></td>
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
                <button class="btn-success btn-sm" type="submit">update</button>
            </td>
        </tr>
    </table>
    </form>