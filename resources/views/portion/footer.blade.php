<footer class=""> <!-- footer-fix -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-xl-6 footer-copyright">
                <p class="mb-0"><?php echo date('Y') ?> © {{request()->get('name')}} </p>
            </div>
            <div class="col-sm-12  col-md-6 col-xl-6">
                <ul class="footer-links">
                    <li>Developed by <a href="https://zeroinfosys.com">Zero Infosys</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>