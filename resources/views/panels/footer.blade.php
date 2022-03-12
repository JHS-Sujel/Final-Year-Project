<!-- BEGIN: Footer-->
@if($configData["mainLayoutType"] == 'horizontal')
    <footer class="footer {{ $configData['footerType'] }} footer-light navbar-shadow">
@else
    <footer class="footer {{ $configData['footerType'] }} footer-light">
@endif
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022<a class="text-bold-800 grey darken-2" href="https://github.com/JHS-Sujel" target="_blank">JHS-Sujel<a class="text-bold-800 grey darken-2" href="https://github.com/rayhan244" target="_blank">& Rayhan Ahmed,</a>All rights Reserved by RJ Fashion Shop</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->
