<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set for the Meeting form
    if (isset($_POST['cname']) && isset($_POST['cemail']) && isset($_POST['msubject']) && isset($_POST['startDate'])) {
        // Get form data for the Meeting form
        $cname = $_POST['cname'];
        $cemail = $_POST['cemail'];
        $msubject = "CoreTech-MENA - " . $_POST['msubject'];
        $startDate = $_POST['startDate'];

        // Email recipient for the Meeting form
        $to = "abd.alrahman.olabi@gmail.com";

        // Email headers for the Meeting form
        $headers = "From: $cname <$cemail>\r\n";
        $headers .= "Reply-To: $cemail\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Email content for the Meeting form
        $email_content = "<p><strong>Company Name:</strong> $cname</p>";
        $email_content .= "<p><strong>Company Email:</strong> $cemail</p>";
        $email_content .= "<p><strong>Meeting Subject:</strong> $msubject</p>";
        $email_content .= "<p><strong>Meeting Date:</strong> $startDate</p>";

        // Send email for the Meeting form
        if (mail($to, $msubject, $email_content, $headers)) {
            // If mail sent successfully for the Meeting form
            echo "<script>
                    alert('Your Meeting Has Been Scheduled Successfully.');
                  </script>";
        } else {
            // If mail sending failed for the Meeting form
            echo "<script>
                    alert('Failed To Schedule Your Meeting. Please Try Again Later.');
                  </script>";
        }
    } elseif (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
        // Get form data for the Contact form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = "CoreTech-MENA - " . $_POST['subject'];
        $message = $_POST['message'];

        // Email recipient for the Contact form
        $to = "abd.alrahman.olabi@gmail.com";

        // Email headers for the Contact form
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Email content for the Contact form
        $email_content = "<p><strong>Name:</strong> $name</p>";
        $email_content .= "<p><strong>Email:</strong> $email</p>";
        $email_content .= "<p><strong>Subject:</strong> $subject</p>";
        $email_content .= "<p><strong>Message:</strong> $message</p>";

        // Send email for the Contact form
        if (mail($to, $subject, $email_content, $headers)) {
            // If mail sent successfully for the Contact form
            echo "<script>alert('Your Message Has Been Sent Successfully.');</script>";
        } else {
            // If mail sending failed for the Contact form
            echo "<script>alert('Failed To Send Your Message. Please Try Again Later.');</script>";
        }
    } 
}

// Check if the form for CV submission is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["cv"])) {
    // Set recipient email address for CV submission
    $to = "abd.alrahman.olabi@gmail.com";

    // Set sender email address for CV submission
    $from = "abd.alrahman.olabi@gmail.com"; 

    // Email subject for CV submission
    $subject = "CoreTech-MENA - CV Submission";

    // Initial message body for CV submission
    $message = "A CV has been submitted.\n";

    // Get file details for CV submission
    $file = $_FILES["cv"]["tmp_name"];
    $filename = $_FILES["cv"]["name"];
    $filetype = $_FILES["cv"]["type"];

    // Check if file is not empty for CV submission
    if (!empty($file)) {
        // Prepare email headers for CV submission
        $headers = "From: $from" . "\r\n";
        $headers .= "Reply-To: $from" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"" . "\r\n";

        // Encode file attachment for CV submission
        $attachment = chunk_split(base64_encode(file_get_contents($file)));

        // Construct message with file attachment for CV submission
        $message .= "--boundary\r\n";
        $message .= "Content-Type: $filetype; name=\"$filename\"\r\n";
        $message .= "Content-Disposition: attachment; filename=\"$filename\"\r\n";
        $message .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $message .= $attachment . "\r\n";
        $message .= "--boundary--";

        // Attempt to send email for CV submission
        if (mail($to, $subject, $message, $headers)) {
            echo "<script>alert('Your CV Has Been Sent Successfully.'); </script>";
        } else {
            echo "<script>alert('Failed To Send Your CV. Please Try Again Later.');</script>";
        }
    } else {
        echo "<script>alert('No File Uploaded.');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CoreTech-MENA - HomePage</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <!-- <h1 class="logo me-auto"><a href="index">CoreTech-Mena<span>.</span></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index" class="logo me-auto"><img src="assets/img/CoreTech-Mena - Logo.png" alt="Company-Logo"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <!-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li class="dropdown"><a href="#"><i class="bi bi-translate"></i></a>
            <ul>
              <li><a href="#"><iconify-icon icon="emojione-v1:flag-for-united-states"></iconify-icon>English</a></li>
              <li><a href="index-AR"><iconify-icon
                    icon="emojione-v1:flag-for-united-arab-emirates"></iconify-icon>العربية</a>
              </li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#meeting" class="get-started-btn scrollto">Schedule a Meeting</a>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div id="hero">
      <video autoplay muted>
        <source src="assets/img/CoreTech-Mena.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>


  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/CompTechCo - Logo.png" class="img-fluid" alt="CompTechCo - Logo">
            </div>
            <div class="swiper-slide"><img src="assets/img/clients/Business Secrets - Logo.png" class="img-fluid" alt="Business Secrets - Logo">
            </div>
            <div class="swiper-slide"><img src="assets/img/clients/Bearing World - Logo.png" class="img-fluid" alt="Bearing World - Logo">
            </div>
            <div class="swiper-slide"><img src="assets/img/clients/ISB - Logo.png" class="img-fluid" alt="ISB - Logo">
            </div>
            <div class="swiper-slide"><img src="assets/img/clients/Client1 - Logo.png" class="img-fluid" alt="Client1 - Logo">
            </div>
            <div class="swiper-slide"><img src="assets/img/clients/Client2 - Logo.png" class="img-fluid" alt="Client2 - Logo">
            </div>
            <div class="swiper-slide"><img src="assets/img/clients/Client3 - Logo.png" class="img-fluid" alt="Client3 - Logo">
            </div>
            <div class="swiper-slide"><img src="assets/img/clients/Client4 - Logo.png" class="img-fluid" alt="Client4 - Logo">
            </div>
            <div class="swiper-slide"><img src="assets/img/clients/Client5 - Logo.png" class="img-fluid" alt="Client5 - Logo">
            </div>
            <div class="swiper-slide"><img src="assets/img/clients/OBAA - Logo.png" class="img-fluid" alt="OBAA - Logo">
            </div>
            <div class="swiper-slide"><img src="assets/img/clients/Future - Logo.png" class="img-fluid"
                alt="Future - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/AL-Farabi - Logo.png" class="img-fluid"
                alt="AL-Farabi - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Tafawki - Logo.png" class="img-fluid"
                alt="Tafawki - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/AL-Hekma - Logo.png" class="img-fluid"
                alt="AL-Hekma - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Resaleh - Logo.png" class="img-fluid"
                alt="Resaleh - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Manaret-Al-Majd - Logo.png" class="img-fluid"
                alt="Manaret Al-Majd - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Syrian-Star - Logo.png" class="img-fluid"
                alt="Syrian Star - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Mansour - Logo.png" class="img-fluid"
                alt="Mansour - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Hadara - Logo.png" class="img-fluid"
                alt="Hadara - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Massar - Logo.png" class="img-fluid"
                alt="Massar - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Al-Abjadiya - Logo.png" class="img-fluid"
                alt="Al-Abjadiya - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Syrian-Community - Logo.png" class="img-fluid"
                alt="Syrian Community - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Promies - Logo.png" class="img-fluid"
                alt="Promies - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Yarmouk - Logo.png" class="img-fluid"
                alt="Yarmouk - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Al-Ola - Logo.png" class="img-fluid"
                alt="Al-Ola - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Manara-International - Logo.png" class="img-fluid"
                alt="Manara International - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Syrian-Flowers - Logo.png" class="img-fluid"
                alt="Syrian Flowers - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Binaa - Logo.png" class="img-fluid"
                alt="Binaa - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/BinaaPy - Logo.png" class="img-fluid"
                alt="BinaaPy - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Orchid - Logo.png" class="img-fluid"
                alt="Orchid - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Aleppo - Logo.png" class="img-fluid"
                alt="Aleppo - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Sama-Al-Shahbaa - Logo.png" class="img-fluid"
                alt="Sama Al-Shahbaa - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/DIVS - Logo.png" class="img-fluid"
                alt="DIVS School - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/Syrian-Oasis-Online-School - Logo.png"
                class="img-fluid" alt="Syrian Oasis Online School"></div>
            <div class="swiper-slide"><img src="assets/img/clients/AlFajr - Logo.png" class="img-fluid"
                alt="AlFajr - Logo"></div>
            <div class="swiper-slide"><img src="assets/img/clients/SVS - Logo.png" class="img-fluid" alt="SVS-Logo">
            </div>
          </div>
          <!-- <div class="swiper-pagination"></div> -->
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch">
            <div class="content">
              <h3>Welcome To CoreTech-MENA Your Go-To For Premium Web & Mobile Development</h3>
              <p>
                An Artistry, Beyond Coding,
                Crafting Digital Marvels, Not Just Creations.
                Endless Possibilities Resonate With Purpose,
                Vision Guiding Every Symphony We Create
              </p>
              <a href="#services" class="about-btn"><span>Our Services</span> <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-receipt"></i>
                  <h4>Who we are</h4>
                  <p style="text-align: justify;">We Are a Web Development Company Founded in 2021 By Wasim Chihadeh and
                    Talal Shihabi. Our
                    Company’s Focus is To Deliver Web and Mobile Applications Using The Robustness of Facebook Stack
                    With Technologies Such as .Net Core, MongoDB, Angular, and Typescript. As a Result, our
                    User‑Centric IT Solutions are Fast, Scalable, Robust, and Run Seamlessly in Every Environment</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-people-fill"></i>
                  <h4>Team</h4>
                  <p style="text-align: justify;">When We Think Of CoreTech-Mena And The Path We’ve Built, We Owe Our
                    Success To Our Employees Which
                    Have Grown Alongside Us And Have Become The Outstanding Professionals We Know And Love Today. We Are
                    Proud Of The Passion And Commitment They Show And They Are What Truly Makes Us ROCK SOLID SOUL
                    TOUCHING</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-bank2"></i>
                  <h4>Mission</h4>
                  <p style="text-align: justify;">At The Core Of Our Organization Lies A Profound Dedication To
                    Excellence, Fueled By The Unwavering
                    Passion And Commitment Of Our Employees. Our Mission Is To Establish Ourselves As The Premier
                    Service Provider In UAE And To Drive Technological Advancement Through The Principles Of Open-Source
                    Collaboration</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-shield-fill-check"></i>
                  <h4>Beliefs</h4>
                  <p style="text-align: justify;">Proudly Advancing For Active Engagement Within A Dynamic International
                    Community, Dedicated To
                    Enriching Our Global Landscape And Fostering Personal Growth. Our Commitment Underscores The
                    Paramount Importance We Place On Collaborative Progress And Innovation</p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Happy Clients</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-pass"></i>
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="16" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Hard Workers</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Tabs Section ======= -->
    <section id="tabs" class="tabs">
      <div class="container" data-aos="fade-up">

        <ul class="nav nav-tabs row d-flex">
          <li class="nav-item col-3">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
              <i class=""><iconify-icon icon="carbon:ibm-open-enterprise-languages" width="1.2em"
                  height="1.2em"></iconify-icon></i>
              <h4 class="d-none d-lg-block">Full-Stack Development</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
              <i class=""><iconify-icon icon="mdi:database-cog" width="1.2em" height="1.2em"></iconify-icon></i>
              <h4 class="d-none d-lg-block">DataBase Management</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
              <i class=""><iconify-icon icon="mdi:mobile-phone-settings-variant" width="1.2em" height="1.2em"></iconify-icon></i>
              <h4 class="d-none d-lg-block">Mobile Developments</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
              <i class=""><iconify-icon icon="game-icons:team-idea" width="1.2em" height="1.2em"></iconify-icon></i>
              <h4 class="d-none d-lg-block">AI Department</h4>
            </a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                <h3>Revolutionizing Digital Landscapes: Full-Stack Development Expertise
                </h3>
                <p style="text-align: justify;">
                  At CoreTech-Mena, We Redefine Digital Landscapes With Comprehensive Full-Stack Development Solutions.
                  Our Expertise Spans Front-End and Back-End Technologies, Enabling Seamless Integration and Optimal
                  Performance Across All Layers of Your Application
                </p>
                <ul>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> Holistic Mastery: Expertise in
                    Both Front-End and Back-End
                    Technologies</li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> Seamless Integration: Diverse
                    Tech Proficiency For Smooth
                    Deployment
                  </li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> Comprehensive Solutions:
                    End-To-End Services Covering The
                    Entire Development Lifecycle</li>
                </ul>
                <p style="text-align: justify;">
                  Partner With CoreTech-Mena To Harness The Power of Full-Stack Development and Elevate Your Digital
                  Presence. Experience The Benefits of Our Holistic Approach, Seamless Integration, and End-To-End
                  Solutions, As We Work Together To Revolutionize Your Digital Landscape
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                <img src="assets/img/FullStack-Development.png" alt="FullStack-Development" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Elevating Efficiency: Tailored Database Management Solutions</h3>
                <p style="text-align: justify;">
                  At CoreTech-Mena, We Redefine DataBase Management With Tailored Solutions. Seamlessly Integrating
                  DataBases, Our Solutions Optimize Operations, Enhance Data Accessibility, Security, and Reliability,
                  Fostering Unparalleled Innovation and Growth
                </p>

                <ul>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> Customized Strategy: Crafted
                    Specifically For Your Data
                    Needs, Maximizing Efficiency</li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> Seamless Integration: Beyond
                    Management, Our Solutions
                    Integrate With Existing Systems, Ensuring Continuity</li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> Personalized Support: Dedicated
                    Teams Provide Ongoing
                    Assistance, Ensuring Data Evolves With Your Business Needs</li>
                </ul>
                <p style="text-align: justify;">
                  Partner With CoreTech-Mena To Experience Tailored DataBase Solutions, Seamless Integration, and
                  Personalized Support, Driving Your Business Forward in The Data-Centric Era
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/DataBase.png" alt="DataBase Managements" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Pioneering Connectivity: Tailored Mobile Development Solutions</h3>
                <p style="text-align: justify;">
                  At CoreTech-Mena, We Redefine Digital Landscapes With Bespoke Mobile Development Services. Seamlessly
                  Connecting Businesses and Users, our Solutions Optimize Operations, Elevate Accessibility, Efficiency,
                  and User Experiences, Fostering Unparalleled Innovation and Growth
                </p>
                <ul>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> Tailored Strategy: Crafted
                    Specifically For Your Business
                    Needs, Maximizing Efficiency</li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> Seamless Integration: Expertise
                    Beyond Development Ensures
                    Minimal Disruption
                  </li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> Personalized Support: Dedicated
                    Teams Provide Ongoing
                    Assistance, Fostering Long-Term Success</li>
                </ul>
                <p style="text-align: justify;">
                  Partner With CoreTech-Mena To Embark on a Journey of Digital Transformation. Experience The
                  Difference With Our Tailored Solutions, Unparalleled Integration, and Personalized Support, Driving
                  Your Business To New Heights in The Mobile-First Era
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/Mobile Development.png" alt="Mobile Development" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Innovating Connectivity: AI Department's Tailored Solutions</h3>
                <p style="text-align: justify;">
                  At CoreTech-Mena, Our AI Department Redefines Digital Landscapes With Tailored Solutions. Seamlessly
                  Connecting Businesses and Users, Our AI-Driven Innovations Optimize Operations, Elevate Accessibility,
                  Efficiency, and User Experiences, Fostering Unparalleled Innovation and Growth
                </p>
                <ul>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> Personalized Support: Dedicated
                    AI Teams Provide Ongoing Assistance, Fostering Long-Term Success</li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> Seamless Integration: Our
                    Expertise Extends Beyond AI Development, Ensuring Minimal Disruption
                  </li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> Tailored AI Strategies: Crafted
                    Specifically For Your Business Needs, Maximizing Efficiency</li>
                </ul>
                <p style="text-align: justify;">
                  Partner With CoreTech-Mena AI Department To Experience Tailored AI Solutions, Seamless Integration,
                  and Personalized Support, Driving Your Business Forward in The Era of AI-Driven Innovation
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/AI.png" alt="AI" class="img-fluid">
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Tabs Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg ">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Explore Our Comprehensive Suite of IT Solutions Designed To Optimize Operations, Enhance Security, and
            Drive Innovation For Your Business</p>
        </div>

        <div class="row">
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-terminal-fill"></i>
              <h4><a href="#">Software Development</a></h4>
              <p>Delivering Tailored Software Solutions, Optimizing Operations, Enhancing Efficiency, and Fostering
                Innovation. Experience Excellence With Our Comprehensive Software Development Services</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-database-fill-gear"></i>
              <h4><a href="#">Data Management</a></h4>
              <p>Efficient Data Storage, Retrieval, and Analysis. Customized Solutions For Secure, Scalable Data
                Management. Streamlining Processes, Optimizing Performance, Ensuring Compliance</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-server"></i>
              <h4><a href="#">Digital Experience Maturity</a></h4>
              <p>Enhance Your Digital Journey With Our Digital Experience Maturity Service, Optimizing Strategies For
                Sustainable Growth and Exceptional Customer Experiences
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <i class="bi bi-columns-gap"></i>
              <h4><a href="#">Enterprise Architecture</a></h4>
              <p>Streamlining Operations, Optimizing Resources, and Fostering Innovation, Our Enterprise Architecture
                Service Ensures Scalable and Efficient Business Solutions</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-diagram-3-fill"></i>
              <h4><a href="#">Outsourcing</a></h4>
              <p>
                Optimize Operations With Our Tailored Outsourcing Solutions. Seamlessly Integrate Our Expertise Into
                Your Workflow For Efficiency, Cost-Effectiveness, and Scalability</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="600">
              <i class="bi bi-clipboard2-data-fill"></i>
              <h4><a href="#">Digital Transformation</a></h4>
              <p>Revolutionize Your Business With Our Comprehensive Digital Transformation Service, Leveraging
                Cutting-Edge Technology For Enhanced Efficiency and Innovation</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <!-- <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->

    <!-- ======= End Testimonials Section ======= -->

    <!-- ======= Pricing Section ======= -->
    <!-- <section id="pricing" class="pricing section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pricing</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="fade-up" data-aos-delay="100">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="box featured" data-aos="fade-up" data-aos-delay="200">
              <h3>Business</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="300">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <!-- <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <ul class="faq-list accordion" data-aos="fade-up">

          <li>
            <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq1">Non consectetur a erat nam at lectus
              urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur
                gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
              </p>
            </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim
              nunc faucibus a pellentesque? <i class="bx bx-chevron-down icon-show"></i><i
                class="bx bx-x icon-close"></i></a>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id
                donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit
                ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing
              elit pellentesque habitant morbi? <i class="bx bx-chevron-down icon-show"></i><i
                class="bx bx-x icon-close"></i></a>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum
                integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt.
                Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
              </p>
            </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam
              eleifend mi in nulla? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id
                donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit
                ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq5" class="collapsed">Tempus quam pellentesque nec nam
              aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i
                class="bx bx-x icon-close"></i></a>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc
                vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus
                gravida quis blandit turpis cursus in
              </p>
            </div>
          </li>

          <li>
            <a data-bs-toggle="collapse" data-bs-target="#faq6" class="collapsed">Tortor vitae purus faucibus ornare.
              Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i
                class="bx bx-x icon-close"></i></a>
            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
              <p>
                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada
                nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis
                tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas
                fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section>End Frequently Asked Questions Section -->

    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="member-img">
                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>End Team Section -->

    <!-- ======= Meeting Section ======= -->
    <section id="meeting" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Meeting</h2>
          <p>Connect With Us To Schedule a Meeting and Discuss Your IT Needs Today!</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-12">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="cname" class="form-control" id="name" placeholder="Company Name" required>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="cemail" id="email" placeholder="Company Email"
                    required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="msubject" id="subject" placeholder="Meeting Subject"
                  required>
              </div>
              <div class="form-group">
                <input name="startDate" id="startDate" class="form-control" type="date" placeholder="Meeting Suggested Date" required/>
              </div>
              <div class="text-center"><button type="submit">Schedule Meeting</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Meeting Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="padding: 0;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Connect With Our IT Solutions Team For Personalized Assistance and Inquiries. We're Dedicated To Supporting
            Your Technological Journey and Providing The Solutions You Need For Success in The Digital Realm</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3326.327393651882!2d36.291533475492635!3d33.518872573362515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1518e77918a57e61%3A0x9b06adbeca3cc528!2sCoreTech-Mena!5e0!3m2!1sen!2sde!4v1707744452520!5m2!1sen!2sde"
            width="600" height="450" style="border:0; padding-top:10px !important; border-radius:5px !important;"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>CoreTech-MENA<span>.</span></h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Contact</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li> -->
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Enterprise Architecture</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Data Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Digital Experience Maturity</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Software Development</a></li>
              <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Digital Transformation</a></li> -->
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Team</h4>
            <p>Send Us Your CV! We Will Contact You When There’s An Opening!</p>
            <form id="joinForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"
              onsubmit="submitForm()">
              <div class="input-group">
                <div class="custom-file">
                  <input class="form-control custom-file-label" accept=".pdf,.doc,.docx" type="file" name="cv" id="cv"
                    onchange="updateFileName(this)">
                </div>
              </div>
              <input id="joinBtn" type="submit" value="Join Us">
            </form>
          </div>


        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>CoreTech-MENA</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://CoreTech-Mena.com/">CoreTech-MENA</a>
        </div>
      </div>
      <div class="social-links text-center text-md-end pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>