<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>
    @include('../partials/app/link')
</head>

<body>

    <!-- Humberger Begin -->
    @include('../partials/app/humberger')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('../partials/app/header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @include('../partials/app/section-hero')
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    @include('../partials/app/breadcrumb')
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            @yield('content-user')
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    @include('../partials/app/footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('../partials/app/scriptJs')



</body>

</html>