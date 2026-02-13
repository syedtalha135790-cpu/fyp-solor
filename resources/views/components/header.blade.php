<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Soliur | Solar & Electricity Solutions | Home Page</title>

    <!-- Stylesheets -->
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Revolution Slider -->
    <link href="{{ asset('frontend/assets/plugins/revolution/css/settings.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/plugins/revolution/css/layers.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/plugins/revolution/css/navigation.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hero-enhanced.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('frontend/assets/images/favicon.png') }}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <style>
        /* Professional Navbar Styling */
        :root {
            --primary-color: #28a745;
            --text-dark: #1a1a1a;
            --text-light: #666;
            --bg-light: #f8f9fa;
            --white: #ffffff;
            --shadow: 0 2px 10px rgba(0,0,0,0.1);
            --shadow-md: 0 4px 20px rgba(0,0,0,0.15);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-professional {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: var(--white);
            box-shadow: var(--shadow);
            padding: 0;
            transition: all 0.3s ease;
        }

        .navbar-professional.scrolled {
            box-shadow: var(--shadow-md);
            padding: 5px 0;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 30px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 700;
            font-size: 24px;
            transition: transform 0.3s ease;
        }

        .logo-wrapper:hover {
            transform: scale(1.05);
            color: var(--primary-color);
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), #20c997);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 22px;
            box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
            margin: 0;
            padding: 0;
            flex: 1;
            justify-content: center;
        }

        .nav-menu a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            padding: 5px 0;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--primary-color);
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: width 0.3s ease;
        }

        .nav-menu a:hover::after,
        .nav-menu a.active::after {
            width: 100%;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .estimate-btn {
            background: linear-gradient(135deg, var(--primary-color), #20c997);
            color: var(--white);
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .estimate-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(40, 167, 69, 0.4);
            color: var(--white);
        }

        .search-icon, .cart-icon {
            color: var(--text-dark);
            cursor: pointer;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .search-icon:hover, .cart-icon:hover {
            color: var(--primary-color);
        }

        .mobile-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 6px;
        }

        .mobile-toggle span {
            width: 25px;
            height: 3px;
            background: var(--text-dark);
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .mobile-toggle {
                display: flex;
            }

            .nav-container {
                padding: 12px 20px;
            }

            .nav-actions {
                gap: 10px;
            }
        }

        /* Page content offset for fixed navbar */
        .page-wrapper {
            padding-top: 70px;
        }
    </style>
</head>


<body>

<div class="page-wrapper">

  <!-- Professional Navbar -->
  <nav class="navbar-professional" id="navbar">
    <div class="nav-container">
      <!-- Logo with Icon -->
      <a href="{{ route('home') }}" class="logo-wrapper">
        <div class="logo-icon">
          <i class="fas fa-sun"></i>
        </div>
        <span>Energy Solutions</span>
      </a>

      <!-- Main Navigation Menu -->
      <ul class="nav-menu" id="navMenu">
        <li>
          <a href="{{ route('home') }}" class="active">Home</a>
        </li>
        <li>
          <a href="{{ route('services') }}">Services</a>
        </li>
        <li>
          <a href="{{ route('shop') }}">Shop</a>
        </li>
        <li>
          <a href="{{ route('contact') }}">Contact</a>
        </li>
        <li>
          <a href="{{ route('user.register') }}">Register</a>
        </li>
      </ul>

      <!-- Right Actions -->
      <div class="nav-actions">
        <i class="fas fa-search search-icon" id="searchIcon"></i>
        <i class="fas fa-shopping-cart cart-icon" id="cartIcon"></i>
        <a href="{{ route('solar-estimator') }}" class="estimate-btn">
          <i class="fas fa-bolt"></i>
          Estimate Now
        </a>
        <div class="mobile-toggle" id="mobileToggle">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
  </nav>

  <!-- Search Modal -->
  <div class="search-modal" id="searchModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 999; padding-top: 100px;">
    <div style="background: white; max-width: 600px; margin: 0 auto; padding: 30px; border-radius: 10px;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3>Search Products</h3>
        <i class="fas fa-times" id="closeSearch" style="cursor: pointer; font-size: 24px;"></i>
      </div>
      <input type="text" placeholder="Search..." style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
    </div>
  </div>

  <!-- Navbar JavaScript Functionality -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const navbar = document.getElementById('navbar');
      const searchIcon = document.getElementById('searchIcon');
      const searchModal = document.getElementById('searchModal');
      const closeSearch = document.getElementById('closeSearch');
      const mobileToggle = document.getElementById('mobileToggle');
      const navMenu = document.getElementById('navMenu');

      // Navbar shadow on scroll
      window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
          navbar.classList.add('scrolled');
        } else {
          navbar.classList.remove('scrolled');
        }
      });

      // Search modal functionality
      searchIcon.addEventListener('click', function() {
        searchModal.style.display = 'block';
      });

      closeSearch.addEventListener('click', function() {
        searchModal.style.display = 'none';
      });

      // Mobile menu toggle
      mobileToggle.addEventListener('click', function() {
        navMenu.style.display = navMenu.style.display === 'flex' ? 'none' : 'flex';
      });

      // Close search modal when clicking outside
      window.addEventListener('click', function(e) {
        if (e.target === searchModal) {
          searchModal.style.display = 'none';
        }
      });

      // Active link highlighting
      const navLinks = document.querySelectorAll('.nav-menu a');
      navLinks.forEach(link => {
        link.addEventListener('click', function() {
          navLinks.forEach(l => l.classList.remove('active'));
          this.classList.add('active');
        });
      });
    });
  </script>

  <!-- Solar Estimator Step Indicator Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const formSteps = document.querySelectorAll('.form-step');
      const stepItems = document.querySelectorAll('.step-item');
      let currentStep = 1;

      // Hide all steps except the first one on page load
      formSteps.forEach((step, index) => {
        if (index !== 0) {
          step.style.display = 'none';
        }
      });

      function showStep(step) {
        // Hide all steps
        formSteps.forEach(formStep => formStep.style.display = 'none');
        
        // Show current step
        const targetStep = document.querySelector(`.form-step[data-step="${step}"]`);
        if (targetStep) {
          targetStep.style.display = 'block';
        }

        // Update step indicators
        stepItems.forEach((item) => {
          const stepNum = parseInt(item.getAttribute('data-step'));
          item.classList.remove('active', 'completed');
          
          if (stepNum === step) {
            item.classList.add('active');
          } else if (stepNum < step) {
            item.classList.add('completed');
          }
        });

        // Scroll to top of form
        const formWrapper = document.querySelector('.estimator-form-wrapper');
        if (formWrapper) {
          formWrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }

      // Make step function globally available
      window.goToStep = showStep;
      window.nextStep = function() {
        if (currentStep < 5) {
          currentStep++;
          showStep(currentStep);
        }
      };
      window.prevStep = function() {
        if (currentStep > 1) {
          currentStep--;
          showStep(currentStep);
        }
      };
      window.getCurrentStep = function() {
        return currentStep;
      };

      // Initialize with step 1 (already visible)
      currentStep = 1;
    });
  </script>

  <!--Main Slider-->
