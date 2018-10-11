<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/vue.js') }}"></script>
</head>
<body>

<div class="container" id="app">
  <h2><center>Add New Post</center></h2>
  <h4>@{{ msg }}</h4>
  <form action="/posts"  method="post" @submit="validate">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" v-model="title" name="title" required="">
      <span v-if="title_error" style="color:red">@{{title_error }}</span>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" id="description" name="description" v-model="description" rows="5" required=""></textarea>
      <span v-if="description_error" style="color:red">@{{description_error}}</span>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
<script type="text/javascript">

  var app = new Vue({

    el:'#app',
    data:{
      msg:'',
      title:'',
      description:'',
      title_error:'',
      description_error:'', 
    },

    methods:{
      validate: function(e){

        if (this.title==''||this.title.length<2) {
          this.title_error='Title required.Title must be atleast 2 characters long';
        }
        else if (this.description==''||this.description.length<10) {
          this.description_error='des required.des must be atleast 10 characters long';
        }
        else{
          this.title_error='';
          this.description_error='';
          this.msg='Success';
          //alert(getElementFromId(title));
          return
        }
         e.preventDefault();
      }
    }
  })
  
</script>
