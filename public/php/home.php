<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UltraMedia - Strona Główna</title>
    <script src="js/scripts.js"></script>
    <link rel="stylesheet" href="styles/index.css">
</head>

<body>
    <header class="animate fade-down">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#about">O nas</a></li>
                    <li><a href="#services">Usługi</a></li>
                    <li><a href="html/Kontakt.html">Kontakt</a></li>
                    <li><a href="html/cennik.html">Cennik</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <a href="php/login.php" class="button login">Login</a>
                <a href="konto.html" id="accountButton" class="button" style="display: none;">Konto</a>
            </div>
        </div>
    </header>

    <section id="home">
        <div class="hero animate fade-up">
            <h1>Witamy w UltraMedia</h1>
            <p>Profesjonalne usługi IT dla Twojej firmy</p>
            <div class="hero-logo">
                <img src="images/logo.png" alt="UltraMedia Logo">
            </div>
        </div>
    </section>

    <section id="about" class="container about-section animate fade-up">
        <h2>O nas</h2>
        <p class="animate staggered fade-up">
            UltraMedia to firma specjalizująca się w dostarczaniu najwyższej jakości usług IT. Nasza misja to wspieranie Twojej firmy w osiąganiu sukcesów poprzez nowoczesne technologie. Dzięki naszemu doświadczeniu i zaawansowanym narzędziom, jesteśmy w stanie sprostać nawet najbardziej wymagającym wyzwaniom. Nasza firma to zespół wykwalifikowanych specjalistów, którzy z pasją podchodzą do każdego zadania. Wierzymy, że technologia może być kluczem do sukcesu Twojej firmy, dlatego nieustannie dążymy do doskonalenia naszych umiejętności i usług. Współpraca z nami to gwarancja profesjonalizmu i indywidualnego podejścia do każdego klienta.
        </p>
        <p class="animate staggered fade-up">
            Oferujemy szeroki zakres usług, które obejmują kompleksowe zarządzanie infrastrukturą IT, tworzenie nowoczesnych stron internetowych, a także serwis i naprawę sprzętu komputerowego. Nasz zespół składa się z wykwalifikowanych specjalistów, którzy są gotowi dostarczyć rozwiązania dostosowane do indywidualnych potrzeb naszych klientów. Nasze usługi są elastyczne i dopasowane do wymagań rynku, co sprawia, że jesteśmy w stanie zaoferować rozwiązania zarówno dla małych firm, jak i dużych przedsiębiorstw. Stawiamy na jakość, innowacyjność i satysfakcję naszych klientów, co potwierdzają liczne pozytywne opinie i referencje.
        </p>
    </section>

    <section id="services" class="container">
        <h2 class="animate fade-up">Usługi</h2>
        <div class="service-items">
            <div class="service-item animate fade-right rotate">
                <h3>Naprawa po zalaniu</h3>
                <p>Specjalistyczne usługi naprawy sprzętu komputerowego po zalaniu.</p>
            </div>
            <div class="service-item animate fade-left scale">
                <h3>Odzyskiwanie danych</h3>
                <p>Profesjonalne odzyskiwanie utraconych danych z różnych nośników.</p>
            </div>
            <div class="service-item animate fade-right rotate">
                <h3>Serwis</h3>
                <p>Kompleksowy serwis sprzętu komputerowego, w tym diagnostyka i naprawa.</p>
            </div>
            <div class="service-item animate fade-left scale">
                <h3>Wymiana matryc</h3>
                <p>Szybka i skuteczna wymiana uszkodzonych matryc w laptopach i monitorach.</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 UltraMedia. Wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>

</body>

</html>