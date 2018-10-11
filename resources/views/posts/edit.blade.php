<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="{{url('/posts/'.$post->id)}}" method="post" >
    @csrf
    {{method_field('PUT')}}
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" required="">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" id="description" name="description" rows="5" required="">{{$post->description}}</textarea> 
    </div>
    <button type="submit" class="btn btn-primary" onclick="validateForm()">Submit</button>
  </form>
</div>

</body>
</html>
<script type="text/javascript">
  function validateForm(){

    var title = document.getElementById('title').value;
    var description = document.getElementById('description').value;

    if(title == ""||title.length<6||title.length>255)
    {
      alert('Please give a title. Title length must be atleast 8 characters long.');
    }
    
  
    if(description==""||description.length<10||description.length>1000)
    {
      alert('Please give a description. Description length must be atleast 10 characters long.');

    }
  }
  
</script>
