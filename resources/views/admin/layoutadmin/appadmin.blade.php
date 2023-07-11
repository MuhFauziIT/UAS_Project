@include('admin.layoutadmin.top')
@include('admin.layoutadmin.menu')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            @yield('content')
        </div>
    </main>
</div>
</div>
@include('admin.layoutadmin.bottom')