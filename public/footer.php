<?php
if (isset($_POST['contact'])) {
  $name      = $_POST['name'];
  $email     = $_POST['email'];
  $question  = $_POST['q'];
  $main->contact($name, $email, $question);
}
?>

  <!-- Footer -->  <footer style="height:600px">
    <div class="footer-inner">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12 col-lg-8">
            <div class="footer-column pull-left">
              <h4>CUSTOMMER SERVICE</h4>
              <ul class="links">
                <li class="first"><a href="editAccount.php" title="Contact us">My Account</a></li>

              </ul>
            </div>
            <div class="footer-column pull-left">
              <h4>Corporation</h4>
              <ul class="links">
                <li class="first"><a title="Your Account" href="aboutUs.php">About us</a></li>
                <li><a title="Addresses" href="blog.php">Company</a></li>

              </ul>
            </div>

          </div>
          <section id="contactUs">
          <div class="col-xs-12 col-lg-4">
            <div class="footer-column-last">
              <div class="newsletter-wrap">
                <h4>Contact Us</h4>
                <form id="newsletter-validate-detail" method="post" action="#">
                  <div id="container_form_news">
                    <div id="container_form_news2">
                      <input type="text" class="input-text required-entry" onFocus=" this.value='' "  placeholder="Full Name" name="name">
                      <input type="text" class="input-text required-entry" onFocus=" this.value='' "  placeholder="Email Address" name="email">
                      <input type="text" class="input-text required-entry" onFocus=" this.value='' "  placeholder="Tell Us Anything..." name="q">
                       <br><br>
                      <button class="button subscribe" title="Subscribe" type="submit" name="contact"><span>Contact</span></button>
                    </div>
                  </div>
                </form>
              </div>
              <br>
            </div>
          </div>
        </section>

        </div>
      </div>
      <div class="container">
      <div class="col-sm-12 col-xs-12 footer-logo"><img alt="Datson" src="images/logo6.png" height="114" width="178"></div>
      <address>
          <i class="fa fa-map-marker"></i>Amman, Khalda, Jordan <i class="fa fa-mobile"></i><span> +(962) 78 235 1446</span> <i class="fa fa-envelope"></i><span> smartshop@gmail.com</span>
          </address>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12 coppyright">&copy; 2021. All Rights Reserved.</div>

        </div>
      </div>
    </div>
  </footer>
