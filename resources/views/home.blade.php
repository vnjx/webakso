@extends('layouts.main')

@section('container')
<html>
<head>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
    <style>
        /* * {
            margin: 0;
            padding: 0;
        }
        .imgbox {
            display: grid;
            height: 100%;
        }
        .body {
            max-width: 100%;
            max-height: 100vh;
            margin: 0;
        } */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-repeat: no-repeat;
            position: relative;
        }
        .hero::after {
            content: '';
            display: block;
            position:  absolute;
        }
        .hero .content h1 {
            font-size: 4em;
            color: #ffffff;
            text-shadow: 1px 1px 3px rgba(1,1,3, 0.5);
        }
        .hero .content p {
            font-size: 1.5rem;
            margin-top: 1rem;
            line-height: 1.3;
            color: #ffffff;
            text-shadow: 1px 1px 3px rgba(1,1,3, 0.5);
        }
        .hero .content .cta {
            margin-top: 1rem;
            display: inline-block;
            padding: 1rem 3rem;
            font-size: 1.4rem;
            color: #ffffff;
            background-color: rgb(255, 153, 0);
            border-radius: 0.5rem;
            box-shadow: 1px 1px 3px rgba(1,1,3, 0.5);
        }
    </style>
</head>
<body>
    <section class="hero" id="home">
        <main class="content">
            <h1>Bakso Nikmat</h1>
            <p>Dibuat dari daging pilihan yang berkualitas agar terjamin rasa nikmatnya.</p>
            <a href="/katalog" class="cta text-decoration-none">Beli Sekarang</a>
        </main>
    </section>
    
<style>
    body {
        background-image: url('img/baksobg.jpg');
        background-attachment: fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }
</style>
</body>
</html>

@endsection
