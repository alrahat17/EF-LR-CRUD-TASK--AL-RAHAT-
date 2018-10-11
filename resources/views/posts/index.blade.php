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
    <div class="row">
     <div class="jumbotron">
       <div class="container">
        <h1>Hello, Welcome to my Blog</h1>
        <p class="lead">Thank you for being a part of my blog.Please login to create, edit or delete post.</p>
        <!-- Right Side Of Navbar -->
                    
                        <!-- Authentication Links -->
                        @guest
                        <a class="nav-link" href="{{ route('login') }}">{{ __(' Login ') }}</a>
                        
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __(' Logout ') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
               
      </div>
    </div>
  </div><!-- end row -->
  <a class="btn btn-block btn-success" href="{{'/posts/create' }}">Add New Post</a> 
  <br>       
  <div class="container">
    <div class="col-xs-6 col-sm-8 col-lg-10"></div>
    @foreach ($posts as $post)
    {{-- expr --}}
    <div class="post">     
      <h3>{{ $post->title }}</h3>
      <label><h5><b>Created At: </b>{{date('M d, Y h:ia',strtotime($post->created_at))}}{{'/'}}<b> Updated At: </b>{{date('M d, Y h:ia',strtotime($post->updated_at))}}</h5></label>
      <p>{{$post->description}}</p>
      <div class="btn-group">
        <a class="btn btn-info" href="{{'/posts/'.$post->id.'/edit' }}">Edit Post</a>
        <br><br>

      <form method="post" action="{{ route('posts.destroy', $post->id)}}">
        @csrf
        @method('delete')    

        <a class="delete" href="{{'/posts/'.$post->id}}">
          <button class="btn btn-danger" aria-hidden="true">Delete</button>
        </a>
        
      </div>
      

        @endforeach
      </form>
    </div>
  </div>
  <div class="pagination">
              {!!$posts->links();!!}
            </div>
</div>
</body>
</html>
