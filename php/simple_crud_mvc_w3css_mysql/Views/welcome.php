<!--═════ WELCOME PAGE ═════════════════════════-->

<div class="w3-container w3-padding-24 w3-brown">
  <h2>STORE ONLINE</h2>
</div>

<div class="w3-container w3-padding">
  <div class="w3-row">

    <!--═════ FILTERED SEARCH ═════════════════════════-->
    <div class="w3-col s3">
			<p>Search for selected filter:</p>
		</div>
		<div class="w3-col s2">
      <select id="filterField" class="w3-select w3-border w3-center w3-round-large w3-brown">
				<option value="0" selected>Name</option>
				<option value="1">Brand</option>
				<option value="2">Model</option>
			</select>
		</div>

   <!--═════ COLUMNS BUTTON ═════════════════════════-->
    <div class="w3-col s7">
      <div class="w3-container w3-right">

        <!--═════ SIGN IN BUTTON ═════════════════════════-->
        <button onclick="document.getElementById('modalLogin').style.display='block'" 
          class="w3-button w3-brown w3-round-large"><i class="fas fa-sign-in-alt"></i> Sign In</button>
        
        <!--═════ SIGN UP BUTTON ═════════════════════════-->
        <?php $signupUrl = FRONT_ROOT . 'Customer/SignUpView'; ?>
        <a href="<?php echo $signupUrl; ?>" class="w3-btn w3-round-large w3-brown w3-left w3-margin-right"><i class="fas fa-user-plus"></i> Sign Up</a>  
        
        <!--═════ LOGIN MODAL ═════════════════════════-->
        <div id="modalLogin" class="w3-modal">
          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center w3-brown"><br>
            <span onclick="document.getElementById('modalLogin').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
            <img src="<?php echo IMAGES_PATH ?>img_avatar3.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
          </div>
          
          <!--═════ LOGIN FORM ═════════════════════════-->
          <form class="w3-container" action="<?php echo FRONT_ROOT; ?>Home/Login" method="POST">
            <div class="w3-section">
              <label for="email"><b>Email</b></label>
              <input class="w3-input w3-border w3-round-large w3-margin-bottom" type="email" placeholder="Enter your email." name="email" required>
              <label for="userPass"><b>Password</b></label>
              <input class="w3-input w3-border w3-round-large" type="password" placeholder="Enter your password." name="userPass" required>
              <button class="w3-button w3-block w3-brown w3-round-large w3-section w3-padding" type="submit">Sign In</button>
            </div>
          </form>

          <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('modalLogin').style.display='none'" type="button" class="w3-button w3-brown w3-round-large">Close</button>
            
            <!--═════ SIGN UP BUTTON ═════════════════════════-->
            <?php $signupUrl = FRONT_ROOT . 'Customer/SignUpView'; ?>
              <a href="<?php echo $signupUrl; ?>" class="w3-btn w3-round-large w3-brown w3-right w3-margin-left"><i class="fas fa-user-plus"></i> Sign Up</a>
            <p class="w3-right">Don't have an account?</p>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!--═════ SEARCH INPUT ═════════════════════════-->
  <input class="w3-input w3-border w3-hover-border-brown w3-padding" type="text" id="Input" onkeyup="filterTable()" placeholder="Search for...">
  
  <!--═════ ITEM LIST TABLE ═════════════════════════-->
	<table class="w3-table-all" id="Table"> 
    <thead>
      <tr class="w3-brown">
        <th>Name</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Stock</th>
        <th>Price</th>
        <th>Buy</th>
      </tr>
    </thead>
    <tbody id="tableBody">  
      <?php 
        if(isset($itemList)) {
          foreach ($itemList as $item) { 
            if($item->getIsActive()) {
      ?>			   
              <tr class="w3-hover-deep-orange">
                <td><?php echo $item->getItemName(); ?></td>
                <td><?php echo $item->getBrand(); ?></td>
                <td><?php echo $item->getModel(); ?></td>
                <td>
                  <div class="w3-tag w3-round w3-orange" style="padding:3px">
                    <div class="w3-tag w3-round w3-orange w3-border w3-border-white">
                      Registered
                    </div>
                  </div>
                </td>
                <td>
                  <div class="w3-tag w3-round w3-orange" style="padding:3px">
                    <div class="w3-tag w3-round w3-orange w3-border w3-border-white">
                      Registered
                    </div>
                  </div>
                </td>
                <td>
                  <div class="w3-tag w3-round w3-orange" style="padding:3px">
                    <div class="w3-tag w3-round w3-orange w3-border w3-border-white">
                      Registered
                    </div>
                  </div>     
                </td>
              </tr>
      <?php
            }
          }
        }  
      ?>	  
    </tbody>
  </table>

  <!--═════ PAGINATION ═════════════════════════-->
  <?php include 'pagination.php';?>

</div>