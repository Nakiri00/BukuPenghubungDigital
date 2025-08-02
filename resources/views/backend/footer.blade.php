<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Buku Penghubung Digital</b>
            </span>
        </div>
    </div>
</footer>

<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

</div>

<script src="{{ asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('js/app.js')}}"></script>
<script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{ asset('backend/js/ruang-admin.min.js')}}"></script>
<script src="{{ asset('backend/js/demo/chart-area-demo.js')}}"></script>
<script src="{{ asset('backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('backend/js/toster.min.js')}}"></script>
<script>
    @if (Session::has('success'))
      toastr.success('{{ Session::get('success')}}');
      @endif

      @if (Session::has('info'))
      toastr.info('{{ Session::get('info')}}');
      @endif

      @if (Session::has('error'))
      toastr.error('{{ Session::get('error')}}');
      @endif

</script>

@yield('scripts')
</body>

</html>
