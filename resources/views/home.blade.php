<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>رحلة كتاب | تبادل الكتب</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/home.css') }}">
</head>

<body>

    <!-- ================= NAVBAR ================= -->

    @include('layouts.navbar')


    <!-- ================= HERO ================= -->

    <section class="hero">

        <div class="hero-overlay"></div>

        <div class="hero-content">

            <img
                src="{{asset('dashboard/assets/dashboard/final.png')}}"
                class="hero-logo"
                alt="رحلة كتاب">

            <h1>
                كتب تنتقل بين الأيدي ..
                <span>وتصل إلى قلوب جديدة</span>
            </h1>

            <p>
                منصة عربية لتبادل الكتب وإهدائها،
                حيث تجد ما تبحث عنه وتمنح كتابك فرصة ليُقرأ من جديد.
            </p>

            <div class="hero-buttons">

                <a href="#" class="primary-btn">
                    <i class="fa-solid fa-book-open"></i>
                    الكتب المتاحة
                </a>

                <a href="#" class="secondary-btn">
                    ابدأ رحلتك
                    <i class="fa-solid fa-arrow-left"></i>
                </a>

            </div>

        </div>

    </section>



    <section class="why-section">

        <div class="section-heading">

            <span class="small-line"></span>

            <h2>
                لماذا رحلة كتاب؟
            </h2>

            <span class="small-line"></span>

            <p>
                كل ما تحتاجه لتبادل الكتب بسهولة وأمان مع محبي القراءة
            </p>

        </div>


        <div class="features">

            <!-- CARD 1 -->

            <div class="feature-card">

                <div class="feature-icon">
                    <i class="fa-solid fa-book-open"></i>
                </div>

                <h3>
                    آلاف الكتب
                </h3>

                <p>
                    اكتشف مجموعة متنوعة من الكتب
                    في مختلف المجالات والأنواع الأدبية.
                </p>

            </div>


            <!-- CARD 2 -->

            <div class="feature-card">

                <div class="feature-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>

                <h3>
                    بحث محلي
                </h3>

                <p>
                    ابحث عن الكتب والقراء في مدينتك
                    واجعل عملية التبادل أسهل.
                </p>

            </div>


            <!-- CARD 3 -->

            <div class="feature-card">

                <div class="feature-icon">
                    <i class="fa-solid fa-repeat"></i>
                </div>

                <h3>
                    تبادل سهل
                </h3>

                <p>
                    نظام بسيط وآمن يضمن حقوق
                    جميع المستخدمين.
                </p>

            </div>


            <!-- CARD 4 -->

            <div class="feature-card">

                <div class="feature-icon">
                    <i class="fa-solid fa-users"></i>
                </div>

                <h3>
                    مجتمع القراء
                </h3>

                <p>
                    انضم لمجتمع نشط من محبي القراءة
                    وشارك تجاربك وآراءك.
                </p>

            </div>

        </div>

    </section>




    <section class="cta-section">

        <div class="cta-content">

            <h2>
                كتابك قد يكون ما يبحث عنه شخص آخر
            </h2>

            <p>
                شارك كتابًا قرأته، أو ابحث عن كتاب جديد
                وابدأ رحلة مختلفة مع كل صفحة.
            </p>

            <a href="#" class="cta-btn">
                اعرض كتابك الآن
                <i class="fa-solid fa-arrow-left"></i>
            </a>

        </div>

    </section>


    <footer class="footer">

        <div class="footer-container">


            <!-- LOGO -->

            <div class="footer-brand">

                <img
                    src="final.png"
                    alt="رحلة كتاب">

                <p>
                    لأن كل كتاب يستحق أن يُقرأ من جديد.
                </p>

                <div class="social-icons">

                    <a href="#">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                </div>

            </div>


            <!-- LINKS -->

            <div class="footer-column">

                <h3>
                    روابط سريعة
                </h3>

                <a href="#">
                    الرئيسية
                </a>

                <a href="#">
                    الكتب المتاحة
                </a>

                <a href="#">
                    مراجعات القراء
                </a>

                <a href="#">
                    من نحن
                </a>

            </div>


            <!-- INFORMATION -->

            <div class="footer-column">

                <h3>
                    معلومات
                </h3>

                <a href="#">
                    سياسة الخصوصية
                </a>

                <a href="#">
                    شروط الاستخدام
                </a>

                <a href="#">
                    تواصل معنا
                </a>

                <a href="#">
                    الأسئلة الشائعة
                </a>

            </div>


            <!-- CONTACT -->

            <div class="footer-column">

                <h3>
                    رحلة كتاب
                </h3>

                <p>
                    منصة تجمع محبي الكتب
                    وتسهّل عملية التبادل بينهم.
                </p>

                <p class="copyright">
                    © 2026 رحلة كتاب
                </p>

            </div>

        </div>

    </footer>


    <script src="{{ asset('home/assets/home.js') }}"></script>

</body>

</html>