@extends('layouts.main')

@section('container')
<html>
<head>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
    <style>
        .about h2{
            text-align: center;
            font-size: 2.6rem;
            margin-bottom: 3rem;
            color: #ff9900;
            text-shadow: 1px 1px 3px rgba(1,1,3, 0.5);
        }

        .about .row {
            display: flex;
            flex: wrap;
        }

        .about .row .about-img {
            flex: 1 1 45rem;
        }

        .about .row .about-img img {
            width: 100%;
            align-content: center;
        }

        .about .row .content {
            flex: 1 1 35rem;
            padding: 0 1rem;
        }

        .about .row .content h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #ff9900;
        }

        .about .row .content p {
            margin-bottom: 0.8rem;
            font-size: 1.4rem;
            font-weight: 500;
            line-height: 1.6;
            text-align: justify
        }
    

    </style>
</head>
<body>
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>

<section id="about" class="about">
    <h2>Tentang Webakso</h2>
    
    <div class="row">
        <div class="about-img">
            <img src="img/bakso.jpg" alt="Tentang Web">
        </div>
        <div class="content">
            <h3>Kenapa bakso kami berbeda?</h3>
            <p>Pemilihan daging yang berkualitas, Kami memilih daging serta bahan yang berkualitas agar menghasilkan produk yang memuaskan bagi konsumen kami, tanpa bahan pengawet ataupun zat kimia berbahaya. 
            </p>
        </div>
    </div>
</section>
</body>
</html>

@endsection