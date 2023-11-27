<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{URL('css/bootstrap.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Go To Website</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/orders">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/product">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/category">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/color">Colors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/ajax_test">ajax_test</a>
        </li>

        <li class="nav-item">
            <form method="post" action="{{ route('logout') }}">
              <a class="nav-link" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
              @csrf
          </form>
        </li>

      </ul>
    </div>
  </div>
</nav>

@yield('admin_content')



<script src="{{URL('js/bootstrap.js')}}"></script>
</body>
</html>
