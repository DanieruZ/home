<!-- jQuery & Bootstrap.js -->
<script src="<?php echo JS_PATH ?>jquery-3.7.1.min.js"></script>
<script src="<?php echo JS_PATH ?>bootstrap.min.js"></script>

<!-- Custom JS -->
<script src="<?php echo JS_PATH ?>display_message.js"></script>
<script src="<?php echo JS_PATH ?>filter_table.js"></script>
<script src="<?php echo JS_PATH ?>pagination.js"></script>
<script src="<?php echo JS_PATH ?>shopping_cart.js"></script>
<script src="<?php echo JS_PATH ?>delete_message.js"></script>

<!-- Footer -->
<?php 
$footerColor = "bg-brown";

if(isset($_SESSION['userType'])) {
  ($_SESSION['userType'] === 'admin')
    ? $footerColor = "bg-info"
    : $footerColor = "bg-dark";
}
?>

<footer class="container-fluid <?php echo $footerColor; ?> text-center text-white small py-2 mt-auto">
  <?php 
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $currentDate = date('Y');
    echo 
      <<<HTML
        <p>Email: danieruzeta@gmail.com (Daniel)
        © $currentDate</p>
      HTML;
  ?>
</footer>

</body>
</html>