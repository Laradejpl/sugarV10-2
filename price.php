<?php
require_once __DIR__ . '/config/bootstrap.php';
require_once('configuration.php'); 

include __DIR__ . '/config/header.php';
?>

<style>

body
{

    background:black;
}
Edit in JSFiddle
Result
HTML
CSS
JavaScript
Resources
section.pricing {
  background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
}

.pricing .card {
  border: none;
  border-radius: 1rem;
  transition: all 0.2s;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.pricing hr {
  margin: 1.5rem 0;
}

.pricing .card-title {
  margin: 0.5rem 0;
  font-size: 0.9rem;
  letter-spacing: .1rem;
  font-weight: bold;
}

.pricing .card-price {
  font-size: 3rem;
  margin: 0;
}

.pricing .card-price .period {
  font-size: 0.8rem;
}

.pricing ul li {
  margin-bottom: 1rem;
}

.pricing .text-muted {
  opacity: 0.7;
}

.pricing .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  opacity: 0.7;
  transition: all 0.2s;
}

/* Hover Effects on Card */

@media (min-width: 992px) {
  .pricing .card:hover {
    margin-top: -.25rem;
    margin-bottom: .25rem;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
  }
  .pricing .card:hover .btn {
    opacity: 1;
  }
}



</style>
<div class="container">
    <div class="row mt-4 d-flex justify-content-end">
        <div class="col-6">
            <a  class="btn btn-secondary" href="accueil.php">Accueil</a>
        </div>
    </div>
</div>

<section class="pricing py-5">
  <div class="container">
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body ">
          <div class="badge-secondary rounded">
            <h5 class="card-title text-muted text-uppercase text-center badge-secondary p-2">Free</h5>
            <h6 class="card-price text-center badge-secondary p-3">0€<span class="period">/month</span></h6>
            </div>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Single User</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>5GB Storage</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Unlimited Private Projects</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Dedicated Phone Support</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Free Subdomain</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Button</a>
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
          <div class="badge-danger rounded">
            <h5 class="card-title text-muted text-uppercase text-center badge-danger p-2">Plus</h5>
            <h6 class="card-price text-center  badge-danger p-3">5€<span class="period">/month</span></h6>
            </div>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5 Users</strong></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>50GB Storage</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain</li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status Reports</li>
            </ul>
            <form action="plan.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-image="assets/img/ange.png"
          data-name="Test"
          data-description="test de strype"
          data-amount="500"
          data-currency="EUR"
          data-label="Only credit card"
          data-locale="auto"></script>
</form>
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
          <div class="badge-warning rounded">
            <h5 class="card-title text-muted text-uppercase text-center badge-warning  p-2">Pro</h5>
            <h6 class="card-price text-center  badge-warning  p-3">35€<span class="period">/year</span></h6>
            </div>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Users</strong></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>150GB Storage</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited</strong> Free Subdomains</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Monthly Status Reports</li>
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Button</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
        <img src="assets/img/logostripe_res.png" alt="stripe">
        
        </div>
    </div>
</div>
<br><br>