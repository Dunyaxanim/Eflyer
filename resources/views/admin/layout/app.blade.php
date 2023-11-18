


<!DOCTYPE html>
<html lang="en">
<head>

  @include("admin.partials._head")

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">

	@include("admin.partials._header")

	@include("admin.partials._aside")

  <div class="content-wrapper">

    @include("admin.partials._page_header")

   @yield('_content')
   
  </div>

  <aside class="control-sidebar control-sidebar-dark">

  </aside>

 @include("admin.partials._footer")

</div>
@include("admin.partials._scripts")
</body>
</html>
