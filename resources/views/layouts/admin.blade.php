<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')
<body>
<div id="app">
    @stack('modals')

    @include('includes.admin.header')



    <main class="py-4">

        @yield('content')
    </main>
    @include('includes.footer')
</div>

@include('includes.admin.bottom')
<script>
    $(function () {

    });
</script>
@stack('footer-scripts')

</body>
</html>
