<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="main">
  <div class="row">
    <div class="col-3">
    </div>
    <div class="col-6">
    <form action="{{route('product.update',$data->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
       	
        Select Category:-
        <select name="cid" class="form-control">
          @foreach($cat as $p)
          <option value="{{$p->id}}">{{$p->cate_name}}</option>
          @endforeach
        </select><br>
        <label for="product name">Product Name:-</label>
       	<input type="text" name="pname" placeholder="Enter Productname" class="form-control" value="{{$data->p_name}}"><br>
        <label for="price">Price:-</label>
        <input type="text" name="price" placeholder="Enter Price" class="form-control" value="{{$data->price}}"><br>
        <label for="image">Image:-</label>
        <input type="file" name="image" />
			<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
			<input type="hidden" name="hidden_image" value="{{ $data->image }}" /><br>
        <label for=" description">Description:-</label>
        <input type="text" name="desc" placeholder="Enter Description" value="{{$data->desc}}" class="form-control"><br>
        <input type="submit" value="update">
    </form>
  </div>
  <div class="col-3">
  </div>
</div>
</div>
</body>
</html>