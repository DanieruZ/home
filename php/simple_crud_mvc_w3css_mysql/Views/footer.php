  <!--═════ SCRIPTS ═════════════════════════-->
  <script src="<?php echo JS_PATH ?>display_messages.js"></script>
  <script src="<?php echo JS_PATH ?>shopping_cart.js"></script>
  <script src="<?php echo JS_PATH ?>filter_table.js"></script>
  <script src="<?php echo JS_PATH ?>pagination.js"></script>
  <script src="<?php echo JS_PATH ?>delete_message.js"></script>

</div>

<!--═════ FOOTER ═════════════════════════-->
  <?php 
    $footerColor = "w3-brown";
      
    if(isset($_SESSION['userType'])) {
      ($_SESSION['userType'] === 'admin')
        ? $footerColor = "w3-blue-gray"
        : $footerColor = "w3-black";
    }
  ?>

<div class="w3-container w3-padding-small w3-small w3-bottom <?php echo $footerColor; ?>">
  <?php 
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $currentDate = date('Y');
    echo 
      <<<HTML
        <p>Email: danieruzeta@gmail.com (Daniel)
        © $currentDate</p>
      HTML;
  ?>
</div>

</body>
</html>