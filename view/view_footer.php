</main>

<!-- Bootstrap JS -->
<script type="text/javascript" src="<?php echo $js_url . 'vendors/bootstrap-5.0.1/bootstrap.bundle.js';?>"></script>

<!-- Fontawesome -->
<script type="text/javascript" src="<?php echo $js_url . 'vendors/fontawesome-5.15.1/all.js';?>"></script>

<!-- Import Site's JS -->
<script type="text/javascript" src="<?php echo $js_url . 'main.js';?>"></script>
<script type="text/javascript" src="<?php echo $js_url . $controller . '/' . strtolower($action) . '.js';?>"></script>

</body>
<footer class="bg-primary text-white text-center mt-4">
    <p class="my-2">Je suis le footer du site</p>
</footer>
</html>
