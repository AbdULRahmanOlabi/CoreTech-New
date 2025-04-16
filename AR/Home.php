<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

// Check if Form is Submitted For The Meeting Form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cname']) && isset($_POST['cemail']) && isset($_POST['msubject']) && isset($_POST['startDate'])) {
  // Create a New PHPMailer Instance
  $mail = new PHPMailer(true); // Passing `true` Enables Exceptions

  try {
    //Server Settings
    $mail->isSMTP(); // Set Mailer To Use SMTP
    $mail->Host = 'smtp.privateemail.com'; // Namecheap SMTP Server
    $mail->SMTPAuth = true; // Enable SMTP Authentication
    $mail->Username = 'info@coretech-mena.com'; // SMTP Username
    $mail->Password = 'InFOC0rETeChM@iL'; // SMTP Password
    $mail->SMTPSecure = 'tls'; // Enable TLS Encryption, `ssl` Also Accepted
    $mail->Port = 587; // TCP Port To Connect

    // Get Form Data For The Meeting Form
    $cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $msubject = "CoreTech-MENA - " . $_POST['msubject'];
    $startDate = $_POST['startDate'];

    //Recipients
    $mail->setFrom('info@coretech-mena.com', $cname);
    $mail->addAddress('info@coretech-mena.com'); // Add a Recipient

    // Content
    $mail->isHTML(true); // Set Email Format To HTML
    $mail->Subject = $msubject;
    $email_content = "<div dir='rtl'>";
    $email_content .= "<p><strong>اسم الشركة:</strong> $cname</p>";
    $email_content .= "<p><strong>البريد الإلكتروني للشركة:</strong> $cemail</p>";
    $email_content .= "<p><strong>موضوع الاجتماع:</strong> $msubject</p>";
    $email_content .= "<p><strong>تاريخ الاجتماع:</strong> $startDate</p>";
    $email_content .= "</div>";
    $mail->Body = $email_content;



    //Set the email header for HTML content
    $mail->addCustomHeader("Content-Type: text/html; charset=UTF-8");

    // Attempt To Send Email
    $mail->send();
    echo "<script>alert('نشكرك على تحديد موعدك، سنتصل بك قريبًا');</script>";
  } catch (Exception $e) {
    echo "<script>alert('فشل في جدولة اجتماعك. الرجاء معاودة المحاولة في وقت لاحق');</script>";
  }
}

// Check if Form is Submitted For The Contact Form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
  // Create a New PHPMailer Instance
  $mail = new PHPMailer(true); // Passing `true` Enables Exceptions

  try {
    //Server Settings
    $mail->isSMTP(); // Set Mailer To Use SMTP
    $mail->Host = 'smtp.privateemail.com'; // Namecheap SMTP Server
    $mail->SMTPAuth = true; // Enable SMTP Authentication
    $mail->Username = 'info@coretech-mena.com'; // SMTP Username
    $mail->Password = 'InFOC0rETeChM@iL'; // SMTP Password
    $mail->SMTPSecure = 'tls'; // Enable TLS Encryption, `ssl` Also Accepted
    $mail->Port = 587; // TCP Port To Connect

    // Get Form Data For The Contact Form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = "CoreTech-MENA - " . $_POST['subject'];
    $message = $_POST['message'];

    //Recipients
    $mail->setFrom('info@coretech-mena.com', $name);
    $mail->addAddress('info@coretech-mena.com'); // Add a Recipient

    // Content
    $mail->isHTML(true); // Set Email Format To HTML
    $mail->Subject = $subject;
    $email_content = "<div dir='rtl'>";
    $email_content .= "<p><strong>الاسم:</strong> $name</p>";
    $email_content .= "<p><strong>البريد الإلكتروني:</strong> $email</p>";
    $email_content .= "<p><strong>الموضوع:</strong> $subject</p>";
    $email_content .= "<p><strong>الرسالة:</strong> $message</p>";
    $email_content .= "</div>";
    $mail->Body = $email_content;

    //Set the email header for HTML content
    $mail->addCustomHeader("Content-Type: text/html; charset=UTF-8");

    // Attempt To Send Email
    $mail->send();
    echo "<script>alert('شكرًا لتواصلك، لقد تم إرسال رسالتك بنجاح');</script>";
  } catch (Exception $e) {
    echo "<script>alert('فشل ارسال رسالتك. الرجاء معاودة المحاولة في وقت لاحق');</script>";
  }
}

// Check if The Form For CV Submission is Submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["cv"])) {
  // Create a New PHPMailer Instance
  $mail = new PHPMailer(true); // Passing `true` Enables Exceptions

  try {
    //Server Settings
    $mail->isSMTP(); // Set Mailer To Use SMTP
    $mail->Host = 'smtp.privateemail.com'; // Namecheap SMTP Server
    $mail->SMTPAuth = true; // Enable SMTP Authentication
    $mail->Username = 'info@coretech-mena.com'; // SMTP Username
    $mail->Password = 'InFOC0rETeChM@iL'; // SMTP Password
    $mail->SMTPSecure = 'tls'; // Enable TLS Encryption, `ssl` Also Accepted
    $mail->Port = 587; // TCP Port To Connect

    // Set Recipient Email Address For CV Submission
    $to = "info@coretech-mena.com";

    // Set Sender Email Address For CV Submission
    $from = "info@coretech-mena.com";

    // Email Subject For CV Submission
    $subject = "CoreTech-MENA - CV Submission";

    // Get File Details For CV Submission
    $file = $_FILES["cv"]["tmp_name"];
    $filename = $_FILES["cv"]["name"];
    $filetype = $_FILES["cv"]["type"];

    // Prepare Email Headers For CV Submission
    $mail->setFrom($from);
    $mail->addAddress($to); // Add a Recipient

    // Content
    $mail->isHTML(true); // Set Email Format To HTML
    $mail->Subject = $subject;
    $mail->Body = "A CV has been submitted.\n";

    // Attach File For CV Submission
    $mail->addAttachment($file, $filename);

    // Attempt To Send Email For CV Submission
    $mail->send();
    echo "<script>alert('لقد تم إرسال سيرتك الذاتية بنجاح');</script>";
  } catch (Exception $e) {
    echo "<script>alert('فشل في إرسال سيرتك الذاتية. الرجاء معاودة المحاولة في وقت لاحق');</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8">
  <!-- <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <title>CoreTech-MENA - الصفحة الرئيسية</title>
  <meta
    content="اكتشف كيف تُحدث CoreTeh-MENA ثورة في الشركات من خلال حلول تكنولوجية شاملة، وتمكين المؤسسات من الازدهار في العصر الرقمي. نحن نقدم خدمات مخصصة ونستفيد من الابتكار والخبرة لتعزيز الكفاءة والنمو. كن شريكًا معنا للحصول على ميزة تنافسية واستمتع بتجربة حلول تكنولوجيا المعلومات الموثوقة لدينا."
    name="description">

  <meta
    content="CoreTech-MENA، Core، Tech، منطقة الشرق الأوسط وشمال أفريقيا، تكنولوجيا المعلومات، الحلول، تكنولوجيا المعلومات، هندسة البرمجيات، تطوير البرمجيات، نضج الخبرة الرقمية، الاستعانة بمصادر خارجية لتكنولوجيا المعلومات، إدارة البيانات، تطوير الذكاء الاصطناعي، التعلم الآلي، التعلم العميق، هندسة المؤسسات، تحليل البيانات، التنقيب عن البيانات ، الهاتف المحمول، تطوير الهاتف المحمول، حلول إنترنت الأشياء، الابتكار الرقمي، استراتيجية تكنولوجيا المعلومات، البنية التحتية لتكنولوجيا المعلومات، خدمات استشارات تكنولوجيا المعلومات، الدعم الفني، إدارة مشاريع تكنولوجيا المعلومات، تنفيذ تكنولوجيا المعلومات، هندسة تكنولوجيا المعلومات، صيانة تكنولوجيا المعلومات، التدريب على تكنولوجيا المعلومات، تعليم تكنولوجيا المعلومات، SMS، المدرسة، الإدارة، LMS، التعلم، الإدارة، النظام، موودل"
    name="keywords">


  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">

  <!-- FontAwesome -->
  <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" />


  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <!-- <h1 class="logo me-auto"><a href="Home">CoreTech-MENA<span>.</span></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="Home" class="logo me-auto"><img src="../assets/img/CoreTech-Mena - Logo.png" alt="Company-Logo"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">الصفحة الرئيسية</a></li>
          <li><a class="nav-link scrollto" href="#about">حول الشركة</a></li>
          <li><a class="nav-link scrollto" href="#services">خدمات الشركة</a></li>
          <!-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
          <li><a class="nav-link scrollto" href="#contact">تواصل معنا</a></li>
          <li class="dropdown"><a href="#"><i class="bi bi-translate"></i></a>
            <ul>
              <li><a href="../Home"><iconify-icon icon="emojione-v1:flag-for-united-states"></iconify-icon>English</a>
              </li>
              <li><a href="#"><iconify-icon icon="emojione-v1:flag-for-united-arab-emirates"></iconify-icon>العربية</a>
              </li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#meeting" class="get-started-btn scrollto">احجز موعدك الان</a>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div id="hero">
      <video autoplay muted playsinline width="100%" height="auto">
        <source src="../assets/img/CoreTech-Mena.mp4" type="video/mp4">
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
            <div class="swiper-slide"><img src="../assets/img/clients/ABS - Logo.png" class="img-fluid"
                alt="ABS - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/CompTechCo - Logo.png" class="img-fluid"
                alt="CompTechCo - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Business Secrets - Logo.png" class="img-fluid"
                alt="Business Secrets - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Bearing World - Logo.png" class="img-fluid"
                alt="Bearing World - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/ISB - Logo.png" class="img-fluid"
                alt="ISB - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/IEUK - Logo.png" class="img-fluid"
                alt="IEUK - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Client1 - Logo.png" class="img-fluid"
                alt="Client1 - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Client2 - Logo.png" class="img-fluid"
                alt="Client2 - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Client3 - Logo.png" class="img-fluid"
                alt="Client3 - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Client4 - Logo.png" class="img-fluid"
                alt="Client4 - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Client5 - Logo.png" class="img-fluid"
                alt="Client5 - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/OBAA - Logo.png" class="img-fluid"
                alt="OBAA - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Future - Logo.png" class="img-fluid"
                alt="Future - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/AL-Farabi - Logo.png" class="img-fluid"
                alt="AL-Farabi - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Tafawki - Logo.png" class="img-fluid"
                alt="Tafawki - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/AL-Hekma - Logo.png" class="img-fluid"
                alt="AL-Hekma - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Resaleh - Logo.png" class="img-fluid"
                alt="Resaleh - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Manaret-Al-Majd - Logo.png" class="img-fluid"
                alt="Manaret Al-Majd - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Syrian-Star - Logo.png" class="img-fluid"
                alt="Syrian Star - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Mansour - Logo.png" class="img-fluid"
                alt="Mansour - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Hadara - Logo.png" class="img-fluid"
                alt="Hadara - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Massar - Logo.png" class="img-fluid"
                alt="Massar - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Al-Abjadiya - Logo.png" class="img-fluid"
                alt="Al-Abjadiya - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Syrian-Community - Logo.png" class="img-fluid"
                alt="Syrian Community - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Promies - Logo.png" class="img-fluid"
                alt="Promies - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Yarmouk - Logo.png" class="img-fluid"
                alt="Yarmouk - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Al-Ola - Logo.png" class="img-fluid"
                alt="Al-Ola - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Manara-International - Logo.png" class="img-fluid"
                alt="Manara International - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Syrian-Flowers - Logo.png" class="img-fluid"
                alt="Syrian Flowers - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Binaa - Logo.png" class="img-fluid"
                alt="Binaa - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/BinaaPy - Logo.png" class="img-fluid"
                alt="BinaaPy - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Orchid - Logo.png" class="img-fluid"
                alt="Orchid - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Aleppo - Logo.png" class="img-fluid"
                alt="Aleppo - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Sama-Al-Shahbaa - Logo.png" class="img-fluid"
                alt="Sama Al-Shahbaa - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/DIVS - Logo.png" class="img-fluid"
                alt="DIVS School - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/Syrian-Oasis-Online-School - Logo.png"
                class="img-fluid" alt="Syrian Oasis Online School"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/AlFajr - Logo.png" class="img-fluid"
                alt="AlFajr - Logo"></div>
            <div class="swiper-slide"><img src="../assets/img/clients/SVS - Logo.png" class="img-fluid" alt="SVS-Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Arab Virtual School - Logo.png" class="img-fluid"
                alt="Arab Virtual School-Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Syrian Expatriates - Logo.png" class="img-fluid"
                alt="Syrian Expatriates - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Zain - Logo.png" class="img-fluid"
                alt="Zain - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Syrian Model Virtual School - Logo.png"
                class="img-fluid" alt="Syrian Model Virtual School - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Al-Marfoo - Logo.png" class="img-fluid"
                alt="Al-Marfoo - Logo">
            </div>
            <div class="swiper-slide"><img src="../assets/img/clients/Batool - Logo.png" class="img-fluid"
                alt="Batool - Logo">
            </div>
          </div>
          <!-- <div class="swiper-pagination"></div> -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">

          <div class="col-xl-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row" style="direction: rtl;">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-receipt"></i>
                  <h4>من نحن</h4>
                  <p style="text-align: justify;">نحن شركة تطوير برمجيات تم إعادة إطلاقها عام 2021 على يد وسيم شحادة
                    وطلال الشهابي.
                    ينصب تركيز شركتنا على تقديم تطبيقات الويب والهاتف المحمول باستخدام أحدث التقنيات ونتيجة لذلك، فإن
                    حلول تكنولوجيا المعلومات التي تركز على المستخدم لدينا سريعة
                    وقابلة للتطوير وقوية وتعمل بسلاسة في كل بيئة</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-people-fill"></i>
                  <h4>فريقنا</h4>
                  <p style="text-align: justify;">عندما نفكر في CoreTech-MENA والمسار الذي بنيناه، فإننا ندين بنجاحنا
                    لموظفينا الذين تطوروا بجانبنا وأصبحوا المحترفين المتميزين الذين نعرفهم ونحبهم اليوم. نحن فخورون
                    بالعاطفة والالتزام الذي يظهرونه، وهم ما يجعلنا حقًا نلمس روحًا صلبة فيهم</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-bank2"></i>
                  <h4>مهمتنا</h4>
                  <p style="text-align: justify;">في قلب منظمتنا يكمن التفاني العميق للتميز، مدفوعًا بشغف موظفينا
                    والتزامهم الذي لا يتزعزع. مهمتنا هي ترسيخ أنفسنا كمزود الخدمة الأول في دولة الإمارات العربية المتحدة
                    ودفع التقدم التكنولوجي من خلال مبادئ التعاون مفتوح المصدر</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-shield-fill-check"></i>
                  <h4>معتقداتنا</h4>
                  <p style="text-align: justify;">نتقدم بفخر من أجل المشاركة النشطة داخل مجتمع دولي ديناميكي، مكرس
                    لإثراء مشهدنا العالمي وتعزيز النمو الشخصي. يؤكد التزامنا على الأهمية القصوى التي نوليها للتقدم
                    التعاوني والابتكار</p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
          <div class="content col-xl-5 d-flex align-items-stretch">
            <div class="content" style="direction: rtl;">
              <h3>مرحبًا بك في CoreTech-MENA، وجهتك المفضلة لتطوير الويب والهواتف المحمولة المتميزة</h3>
              <p>
                فن يتجاوز البرمجة، وصياغة الأعاجيب الرقمية، وليس مجرد إبداعات. إمكانيات لا نهاية لها تتوافق مع الهدف،
                والرؤية التي توجه كل سيمفونية ننشئها
              </p>
              <a href="#services" class="about-btn"><span>خدماتنا</span> <i class="bx bx-chevron-left"></i></a>
            </div>
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
              <span data-purecounter-start="0" data-purecounter-end="95" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>عملائنا السعداء</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-pass"></i>
              <span data-purecounter-start="0" data-purecounter-end="202" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>مشاريعنا</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>ساعات من الدعم</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="19" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>فريقنا</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Tabs Section ======= -->
    <section id="tabs" class="tabs">
      <div class="container" data-aos="fade-up">

        <div class="section-title" dir="rtl">
          <h2>مميزاتنا الفريدة</h2>
          <p>حلول متطورة تقدم أعلى مستويات الأداء، المرونة والقدرة على التكيف مع احتياجاتك، مصممة لتحقيق قيمة تجارية
            حقيقية على جميع الأصعدة</p>
        </div>

        <ul class="nav nav-tabs row d-flex" dir="rtl">
          <li class="nav-item col-3">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
              <i class=""><iconify-icon icon="mdi:database-cog"></iconify-icon></i>
              <h4 class="d-none d-lg-block">إدارة قواعد البيانات</h4>
            </a>
          </li>

          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
              <i class=""><iconify-icon icon="game-icons:team-idea"></iconify-icon></i>
              <h4 class="d-none d-lg-block">قسم الذكاء الاصطناعي</h4>
            </a>
          </li>

          <li class="nav-item col-3">
            <a class="nav-link " data-bs-toggle="tab" data-bs-target="#tab-3">
              <i class=""><iconify-icon icon="carbon:ibm-open-enterprise-languages"></iconify-icon></i>
              <h4 class="d-none d-lg-block">تطوير المكدس الكامل</h4>
            </a>
          </li>

          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
              <i class=""><iconify-icon icon="mdi:mobile-phone-settings-variant"></iconify-icon></i>
              <h4 class="d-none d-lg-block">تطوير تطبيقات الموبايل</h4>
            </a>
          </li>

        </ul>

        <div class="tab-content">

          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 text-center">
                <img src="../assets/img/DataBase.png" alt="DataBase Managements" class="img-fluid">
              </div>
              <div class="col-lg-6 order-1 order-lg-2 mt-3 mt-lg-0" style="direction: rtl;">
                <h3>رفع الكفاءة: حلول إدارة قواعد البيانات المخصصة</h3>
                <p style="text-align: justify;">
                  في CoreTech-MENA، نقوم بإعادة تعريف إدارة قواعد البيانات من خلال حلول مخصصة. من خلال دمج قواعد
                  البيانات بسلاسة، تعمل حلولنا على تحسين العمليات وتعزيز إمكانية الوصول إلى البيانات والأمن والموثوقية
                  وتعزيز الابتكار والنمو الذي لا مثيل له
                </p>
                <ul>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> استراتيجية مخصصة: تم تصميمها
                    خصيصًا لتلبية احتياجات البيانات الخاصة بك، مما يزيد من الكفاءة</li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> التكامل السلس: بعيدًا عن
                    الإدارة، تتكامل حلولنا مع الأنظمة الحالية، مما يضمن الاستمرارية</li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> الدعم المخصص: توفر الفرق المخصصة
                    المساعدة المستمرة، مما يضمن تطور البيانات بما يتناسب مع احتياجات عملك</li>
                </ul>
                <p style="text-align: justify;">
                  قم بالشراكة مع CoreTech-MENA لتجربة حلول قواعد البيانات المخصصة، والتكامل السلس، والدعم المخصص، مما
                  يدفع أعمالك إلى الأمام في عصر التركيز على البيانات
                </p>
              </div>
            </div>
          </div>

          <div class="tab-pane" id="tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 text-center">
                <img src="../assets/img/AI.png" alt="AI" class="img-fluid">
              </div>
              <div class="col-lg-6 order-1 order-lg-2 mt-3 mt-lg-0" style="direction: rtl;">
                <h3>ابتكار الاتصال: الحلول المخصصة لقسم الذكاء الاصطناعي</h3>
                <p style="text-align: justify;">
                  في CoreTech-MENA، يعيد قسم الذكاء الاصطناعي لدينا تعريف المشهد الرقمي من خلال حلول مخصصة. ربط الشركات
                  والمستخدمين بسلاسة، تعمل ابتكاراتنا المعتمدة على الذكاء الاصطناعي على تحسين العمليات ورفع مستوى
                  إمكانية الوصول والكفاءة وتجارب المستخدم، وتعزيز الابتكار والنمو الذي لا مثيل له
                </p>
                <ul>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> الدعم المخصص: توفر فرق الذكاء
                    الاصطناعي المخصصة المساعدة المستمرة وتعزز النجاح على المدى الطويل</li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> التكامل السلس: تمتد خبرتنا إلى
                    ما هو أبعد من تطوير الذكاء الاصطناعي، مما يضمن الحد الأدنى من الاضطرابات
                  </li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> استراتيجيات الذكاء الاصطناعي
                    المصممة خصيصًا: مصممة خصيصًا لتلبية احتياجات عملك، مما يزيد من الكفاءة</li>
                </ul>
                <p style="text-align: justify;">
                  الشراكة مع قسم الذكاء الاصطناعي في CoreTech-MENA لتجربة حلول الذكاء الاصطناعي المخصصة والتكامل السلس
                  والدعم الشخصي، مما يدفع أعمالك إلى الأمام في عصر الابتكار القائم على الذكاء الاصطناعي
                </p>
              </div>
            </div>
          </div>

          <div class="tab-pane" id="tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 text-center" data-aos="fade-up" data-aos-delay="200">
                <img src="../assets/img/FullStack-Development.png" alt="FullStack-Development" class="img-fluid">
              </div>
              <div class="col-lg-6 order-1 order-lg-2 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100"
                style="direction: rtl;">
                <h3>إحداث ثورة في الطبيعية الرقمية: خبرات تطوير متكاملة
                </h3>
                <p style="text-align: justify;">
                  في CoreTech-MENA، نقوم بإعادة تعريف المشهد الرقمي من خلال حلول تطوير متكاملة وشاملة. تمتد خبرتنا إلى
                  تقنيات الواجهة الأمامية والخلفية، مما يتيح التكامل السلس والأداء الأمثل عبر جميع طبقات التطبيق الخاص
                  بك
                </p>
                <ul>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> الإتقان الشامل: الخبرة في كل من
                    تقنيات الواجهة الأمامية والخلفية</li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> التكامل السلس: إتقان التكنولوجيا
                    المتنوعة للنشر السلس
                  </li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> حلول شاملة: خدمات شاملة تغطي
                    دورة حياة التطوير بأكملها</li>
                </ul>
                <p style="text-align: justify;">
                  شراكة مع CoreTech-MENA لتسخير قوة التطوير الشامل ورفع مستوى حضورك الرقمي. استمتع بتجربة فوائد نهجنا
                  الشامل والتكامل السلس والحلول الشاملة، حيث نعمل معًا لإحداث ثورة في المشهد الرقمي الخاص بك
                </p>
              </div>
            </div>
          </div>

          <div class="tab-pane" id="tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 text-center">
                <img src="../assets/img/Mobile Development.png" alt="Mobile Development" class="img-fluid">
              </div>
              <div class="col-lg-6 order-1 order-lg-2 mt-3 mt-lg-0" style="direction: rtl;">
                <h3>الاتصال الرائد: حلول تطوير الأجهزة المحمولة المخصصة</h3>
                <p style="text-align: justify;">
                  في CoreTech-MENA، نقوم بإعادة تعريف المشهد الرقمي من خلال خدمات تطوير الهاتف المحمول المخصصة. من خلال
                  ربط الشركات والمستخدمين بسلاسة، تعمل حلولنا على تحسين العمليات ورفع مستوى إمكانية الوصول والكفاءة
                  وتجارب المستخدم، وتعزيز الابتكار والنمو الذي لا مثيل له
                </p>
                <ul>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> استراتيجية مصممة خصيصًا: مصممة
                    خصيصًا لتلبية احتياجات عملك، مما يزيد من الكفاءة</li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> التكامل السلس: الخبرة التي
                    تتجاوز التطوير تضمن الحد الأدنى من الاضطرابات
                  </li>
                  <li style="text-align: justify;"><i class="ri-check-double-line"></i> الدعم الشخصي: توفر الفرق المخصصة
                    المساعدة المستمرة، مما يعزز النجاح على المدى الطويل</li>
                </ul>
                <p style="text-align: justify;">
                  كن شريكاً مع CoreTech-MENA للشروع في رحلة التحول الرقمي. اكتشف الفرق مع حلولنا المخصصة، والتكامل الذي
                  لا مثيل له، والدعم المخصص، مما يقود أعمالك إلى آفاق جديدة في عصر الهاتف المحمول أولاً
                </p>
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
          <h2>خدماتنا</h2>
          <p>استكشف مجموعتنا الشاملة من حلول تكنولوجيا المعلومات المصممة لتحسين العمليات وتعزيز الأمان ودفع الابتكار
            لشركتك</p>
        </div>

        <div class="row">
          <div class="col-md-6 mt-4 mt-md-0" style="direction: rtl;">
            <div class="icon-box-AR" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-terminal-fill"></i>
              <h4><a href="#">تطوير البرمجيات</a></h4>
              <p>تقديم حلول برمجية مخصصة، وتحسين العمليات، وتعزيز الكفاءة، وتعزيز الابتكار. استمتع بتجربة التميز مع
                خدمات تطوير البرمجيات الشاملة التي نقدمها</p>
            </div>
          </div>

          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box-AR" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-database-fill-gear"></i>
              <h4><a href="#">إدارة البيانات</a></h4>
              <p>كفاءة تخزين البيانات واسترجاعها وتحليلها. حلول مخصصة لإدارة بيانات آمنة وقابلة للتطوير. تبسيط العمليات
                وتحسين الأداء وضمان الامتثال</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box-AR" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-server"></i>
              <h4><a href="#">نضج التجربة الرقمية</a></h4>
              <p>عزز رحلتك الرقمية من خلال خدمة نضج التجربة الرقمية لدينا، وتحسين الاستراتيجيات لتحقيق النمو المستدام
                وتجارب العملاء الاستثنائية
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="icon-box-AR" data-aos="fade-up" data-aos-delay="100">
              <i class="bi bi-columns-gap"></i>
              <h4><a href="#">الهندسة المعمارية للمؤسسات</a></h4>
              <p>من خلال تبسيط العمليات وتحسين الموارد وتعزيز الابتكار، تضمن خدمة البنية المؤسسية لدينا حلول أعمال قابلة
                للتطوير وفعالة</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box-AR" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-diagram-3-fill"></i>
              <h4><a href="#">الاستعانة بمصادر خارجية</a></h4>
              <p>
                يمكنك تحسين العمليات من خلال حلول الاستعانة بمصادر خارجية المخصصة لدينا. دمج خبرتنا بسلاسة في سير عملك
                لتحقيق الكفاءة والفعالية من حيث التكلفة وقابلية التوسع</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box-AR" data-aos="fade-up" data-aos-delay="600">
              <i class="bi bi-clipboard2-data-fill"></i>
              <h4><a href="#">التحول الرقمي</a></h4>
              <p>أحدث ثورة في أعمالك من خلال خدمة التحول الرقمي الشاملة التي نقدمها، مع الاستفادة من أحدث التقنيات
                لتعزيز الكفاءة والابتكار</p>
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

    <!-- Alt Services 2 Section -->
    <section id="alt-services-2" class="alt-services-2 section" dir="rtl">
      <div class="section-title">
        <h2>حلولنا</h2>
        <p>اكتشف قوة نظام تقييم التعليم الجاهز للتنفيذ لدينا</p>
      </div>

      <div class="container">
        <div class="row justify-content-around gy-4">
          <div class="col-lg-6 d-flex flex-column justify-content-center order-1 order-lg-2 solution-content"
            data-aos="fade-up" data-aos-delay="100">
            <h3>
              <a href="https://ies-mena.net/" class="project-link" target="_blank">
                نظام التعليم الذكي (IES)
              </a>
            </h3>
            <p>
              في IES، قمنا بتطوير منصة تقييم كاملة وجاهزة للنشر تعمل بالفعل على تحويل التعليم في المملكة العربية
              السعودية. نظامنا ليس مجرد مفهوم - إنه حل تشغيلي بالكامل يتوافق تمامًا مع أهداف رؤية 2030، مما يمكن
              المؤسسات من بناء مجتمع مزدهر قائم على المعرفة اليوم.
            </p>
            <ul class="feature-list">
              <li><i class="ri-check-double-line"></i> <strong>مسارات التعلم المنهجية:</strong> رسم مرئي لرحلة كل متعلم
                مع أنشطة متصلة بالأهداف التعليمية</li>
              <li><i class="ri-check-double-line"></i> <strong>بنوك الأسئلة الشاملة:</strong> بناء وإدارة الأسئلة
                المصنفة حسب الصعوبة والموضوع بكفاءة</li>
              <li><i class="ri-check-double-line"></i> <strong>التقييم المدعوم بالذكاء الاصطناعي:</strong> من كشف الغش
                إلى توليد الاختبارات الديناميكية للتقييمات الآمنة</li>
              <li><i class="ri-check-double-line"></i> <strong>رؤى قابلة للتنفيذ:</strong> تحديد أنماط الأداء لتحسين
                النتائج التعليمية</li>
              <li><i class="ri-check-double-line"></i> <strong>التكامل السلس:</strong> منصة معيارية تتوسع من المدارس إلى
                الأنظمة الوطنية</li>
            </ul>
            <p>
              هذا ليس مفهوماً - إنه حل مثبت متوافق بالفعل مع أهداف رؤية 2030 وجاهز للتنفيذ الفوري.
            </p>
          </div>

          <div class="features-image col-lg-5 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <img src="../assets/img/features-3-2.png" alt="نظام تقييم التعليم الجاهز للتنفيذ" class="img-fluid">
          </div>
        </div>
      </div>
    </section><!-- /Alt Services 2 Section -->

    <!-- ======= Meeting Section ======= -->
    <section id="meeting" class="contact" style="padding-top: 10px;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>اجتماعات</h2>
          <p>تواصل معنا لتحديد موعد اجتماع ومناقشة احتياجاتك المستقبلية في مجال تكنولوجيا المعلومات اليوم</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-12" style="direction: rtl;">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col form-group" style="direction: rtl;">
                  <input type="text" name="cname" class="form-control" id="name" placeholder="اسم الشركة" required>
                </div>
                <div class="col form-group" style="direction: rtl;">
                  <input type="email" class="form-control" name="cemail" id="email"
                    placeholder="البريد الإلكتروني للشركة" required>
                </div>
              </div>
              <div class="form-group" style="direction: rtl;">
                <input type="text" class="form-control" name="msubject" id="subject" placeholder="موضوع الاجتماع"
                  required>
              </div>
              <div class="form-group date-input-container-AR">
                <input name="startDate" id="startDate" class="form-control" type="date" required />
              </div>
              <div class="text-center"><button type="submit">احجز موعدك</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Meeting Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="padding-top: 10px;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>تواصل معنا</h2>
          <p>
            تواصل مع فريق حلول تكنولوجيا المعلومات لدينا للحصول على المساعدة والاستفسارات الشخصية. نحن ملتزمون بدعم
            رحلتك التكنولوجية وتوفير الحلول التي تحتاجها للنجاح في العالم الرقمي.
          </p>
        </div>

        <div class="row g-4" data-aos="fade-up" data-aos-delay="100">

          <!-- Contact Cards -->
          <div class="col-12">
            <div class="row g-4">

              <!-- Main Office -->
              <div class="col-lg-4">
                <div class="info-box text-center p-4 h-100">
                  <i class="bx bx-map"></i>
                  <h5 class="fw-bold">المكتب الرئيسي</h5>
                  <p class="small mb-3">
                    بناء البوصلة، طريق الشهداء،<br>
                    المنطقة الصناعية الحمراء - المنطقة الحرة،<br>
                    رأس الخيمة، الإمارات العربية المتحدة
                  </p>
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d899.0447354540795!2d55.78556386955713!3d25.66536229858831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ef60b0059d3a40d%3A0x26c11e56db834c61!2sCoreTech-MENA!5e0!3m2!1sen!2s!4v1708439300133!5m2!1sen!2s"
                    width="100%" height="200" style="border:0; border-radius:8px;" allowfullscreen=""
                    loading="lazy"></iframe>
                </div>
              </div>

              <!-- Branch 2 -->
              <div class="col-lg-4">
                <div class="info-box text-center p-4 h-100">
                  <i class="bx bx-map"></i>
                  <h5 class="fw-bold">الفرع الثاني</h5>
                  <p class="small mb-3">
                    مكتب 43-44، الفهيدي، بر دبي،<br>
                    دبي، الإمارات العربية المتحدة
                  </p>
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3609.002858890064!2d55.29948357542065!3d25.259186177662456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f4341fc5f44ab%3A0x4a5b51bd4d359c3e!2sAl%20Fahidi%2C%20Dubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2s!4v1712345678901!5m2!1sen!2s"
                    width="100%" height="200" style="border:0; border-radius:8px;" allowfullscreen=""
                    loading="lazy"></iframe>
                </div>
              </div>

              <!-- Branch 3 -->
              <div class="col-lg-4">
                <div class="info-box text-center p-4 h-100">
                  <i class="bx bx-map"></i>
                  <h5 class="fw-bold">الفرع الثالث</h5>
                  <p class="small mb-3">
                    6210 Wilshire Blvd، Ste 208 Pmb 539،<br>
                    Ca90048، لوس أنجلوس، الولايات المتحدة
                  </p>
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3303.618837496889!2d-118.36585998478283!3d34.06242428060268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2b9116e1f8b3f%3A0xdcead0e1fbd40b56!2s6210%20Wilshire%20Blvd%2C%20Los%20Angeles%2C%20CA%2090048%2C%20USA!5e0!3m2!1sen!2s!4v1712345678902!5m2!1sen!2s"
                    width="100%" height="200" style="border:0; border-radius:8px;" allowfullscreen=""
                    loading="lazy"></iframe>
                </div>
              </div>

            </div>
          </div>

          <!-- Contact Form and Info -->
          <div class="col-12 mt-5">
            <div class="row g-4">

              <div class="col-lg-6">
                <div class="info-box text-center p-4 h-100">
                  <i class="bx bx-envelope"></i>
                  <h5 class="fw-bold">راسلنا عبر البريد الإلكتروني</h5>
                  <p class="mb-0"><a href="mailto:info@CoreTech-MENA.com">Info@CoreTech-MENA.com</a></p>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="info-box text-center p-4 h-100">
                  <i class="bx bx-phone-call"></i>
                  <h5 class="fw-bold">اتصل بنا</h5>
                  <p class="mb-0"><a href="tel:00971561212043">+971 561212043</a></p>
                  <p class="mb-0"><a href="tel:0013106966156">+1 (310) 696-6156</a></p>
                </div>
              </div>

              <div class="col-12">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" role="form" class="php-email-form"
                  style="direction: rtl;">
                  <div class="row gy-3">
                    <div class="col-md-6 form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="اسمك" required>
                    </div>
                    <div class="col-md-6 form-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="بريدك الإلكتروني"
                        required>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="موضوع الرسالة"
                      required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="7" placeholder="الرسالة" required></textarea>
                  </div>
                  <div class="text-center mt-3"><button type="submit">أرسل رسالتك</button></div>
                </form>
              </div>

            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Contact Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" dir="rtl">

    <div class="footer-top-AR">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>CoreTech-MENA<span>.</span></h3>
            <p>
              <strong>المكتب الرئيسي:</strong><br>
              بناء البوصلة<br>
              طريق الشهداء,<br>
              المنطقة الصناعية الحمراء - المنطقة الحرة,<br>
              رأس الخيمة، الإمارات العربية المتحدة<br><br>

              <strong>الفرع الثاني:</strong><br>
              مكتب 43-44، الفهيدي، بر دبي،<br>
              دبي، الإمارات العربية المتحدة.<br><br>

              <strong>الفرع الثالث:</strong><br>
              6210 Wilshire Blvd, Ste 208 Pmb 539,<br>
              Ca90048، لوس أنجلوس، الولايات المتحدة الأمريكية<br><br>

              <strong>رقم الهاتف:</strong>
              <a href="tel:00971561212043">00971561212043</a>،
              <a href="tel:0013106966156">0013106966156</a><br>

              <strong>البريد الالكتروني:</strong>
              <a href="mailto:info@CoreTech-MENA.com">Info@CoreTech-MENA.com</a><br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>روابط مفيدة</h4>
            <ul>
              <li><i class="bx bx-chevron-left"></i> <a href="#">الصفحة الرئيسية</a></li>
              <li><i class="bx bx-chevron-left"></i> <a href="#about">حول الشركة</a></li>
              <li><i class="bx bx-chevron-left"></i> <a href="#services">خدمات الشركة</a></li>
              <li><i class="bx bx-chevron-left"></i> <a href="#contact">تواصل معنا</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>خدماتنا</h4>
            <ul>
              <li><i class="bx bx-chevron-left"></i> <a href="#services">الهندسة المعمارية للمؤسسات</a></li>
              <li><i class="bx bx-chevron-left"></i> <a href="#services">إدارة البيانات</a></li>
              <li><i class="bx bx-chevron-left"></i> <a href="#services">نضج التجربة الرقمية</a></li>
              <li><i class="bx bx-chevron-left"></i> <a href="#services">تطوير البرمجيات</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>انضم إلى فريقنا</h4>
            <p>أرسل لنا سيرتك الذاتية! سوف نتواصل معك في أسرع وقت ممكن..</p>
            <form id="joinForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"
              onsubmit="submitForm()">
              <div class="input-group">
                <div class="custom-file">
                  <input class="form-control custom-file-label" accept=".pdf,.doc,.docx" type="file" name="cv" id="cv"
                    onchange="updateFileName(this)">
                </div>
              </div>
              <input id="joinBtn-AR" type="submit" value="انضم إلينا">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4" dir="ltr">
      <div class="social-links text-center text-md-start pt-3 pt-md-0 me-md-auto">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="text-center text-md-end">
        <div class="copyright">
          كل الحقوق محفوظة <strong><span>CoreTech-MENA</span></strong>. حقوق النشر &copy;
        </div>
        <div class="credits">
          <a href="https://CoreTech-Mena.com/">CoreTech-MENA</a> صمم بواسطة
        </div>
      </div>
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>