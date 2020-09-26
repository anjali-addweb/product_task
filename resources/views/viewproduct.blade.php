<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3>View Details Of Products</h3>           
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Category Id</th>
        <th>Description</th>
        <th>Image</th>
        <th colspan="2">Operations</th>

      </tr>
    </thead>
    <tbody>
      @foreach($data as $p)
      <tr>
      <td>{{$p->id}}</td>
      <td>{{$p->p_name}}</td>
      <td>{{$p->price}}</td>
      <td>{{$p->cat_id}}</td>
      <td>{{$p->desc}}</td>
      <td> <img src="{{asset('images/'.$p->image)}}" alt="Product-image" style="width: 100px; height: 100px; "></td>
      <td><a href="/product/{{$p->id}}/edit">EDIT</a></td>
      <td>
      <form action="{{route('product.destroy',$p->id)}}" method="post" class="delete_form">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE"/>
        <button type="submit" >DELETE</button>
        </form>
      </td>
      
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<script>
    $(document).ready(function(){
        $('.delete_form').on('submit',function(){
            if(confirm("Are you sure ??")){
                return true;
            }
            else{
                return false;
            }
        })
    })
</script>

</body>
</html>
