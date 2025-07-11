<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Philippine Institute of Traditional and Alternative Health Care</title>
  <!-- Add Bootstrap CSS link here -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom green theme styles */
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh; /* Ensure container takes at least the full viewport height */
    }
    .navbar {
      background-color: #70a991;
    }
    .row-header {
      background-color: #8fcf9d;
    }
    .btn-primary {
      background-color: #348547;
      border-color: #348547;
    }
    .btn-primary:hover {
      background-color: #1d5c2d;
      border-color: #1d5c2d;
    }
    .btn-secondary {
      background-color: #537b60;
      border-color: #537b60;
    }
    .btn-secondary:hover {
      background-color: #35523f;
      border-color: #35523f;
    }

    .bg-dark {
      background-color: #1d1d1d;
    }

    .text-light {
      color: #ffffff !important;
    }

    .brand-image {
      margin-top: -0.5rem;
      margin-right: 0.2rem;
      height: 33px;
    }
  </style>
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a href="{{ route('home') }}" class="navbar-brand">
      <img src="{{ asset('images/logo4.png') }}" class="brand-image img-circle elevation-3"
          style="opacity: .8"><span class="ml-2"></span>PIMS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://pitahc.gov.ph/contact-us/" target="_blank">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://192.168.1.9/dev_pims/login">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="row-header">
    <div class="container">
      <header class="">
        <div class="row">
          <div class="col-12 my-5 d-flex align-items-center justify-content-center">
            <h4>Philippine Institute of Traditional and Alternative Health Care Integrated Management Systems</h4>
          </div>
        </div>
      </header>
    </div>
  </div>
  
  <!-- Hero Section -->
  

  <!-- About Section -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="{{ route('css-form') }}">
            <img src="{{ asset('images/csm.png') }}" class="img-fluid">
          </a>
        </div>
        <div class="col-md-6">
          <h2>About Us</h2>
          <p>
          The Philippine Institute of Traditional and Alternative Health Care (PITAHC) 
          advocates for the development and use of traditional and alternative 
          health-care in the country. PITAHC was created with the objective of 
          improving the quality and delivery of health care services to 
          Filipinos by integrating traditional and alternative health care 
          into the national health care delivery system. Our goal is also 
          to position T&CM (traditional and complementary medicine) as a 
          legitimate field of medicine.
          </p>
          <a href="https://pitahc.gov.ph" target="_blank" class="btn btn-secondary">Read More</a>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Footer Section -->
  <footer style="background-color:#c9c9c9; margin-top: auto;" class="py-3">
  <div class="float-right d-none d-sm-block mr-3">Version 1.0</div>
  <div class="float-left d-none d-sm-block ml-3">Copyright &copy; 2024 <strong><a href="https://pitahc.gov.ph">Philippine Institute of Traditional and Alternative Health Care</a></strong> All rights
    reserved.</div>
  </footer>

  <!-- Add Bootstrap JavaScript link here -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>