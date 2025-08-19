<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'EcoRecolecta') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        :root {
            --primary: #10B981;
            --primary-dark: #059669;
            --secondary: #34D399;
            --accent: #F59E0B;
            --dark: #1F2937;
            --light: #F9FAFB;
            --white: #FFFFFF;
            --gradient: linear-gradient(135deg, #10B981, #34D399);
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .header.scrolled {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
        }

        .logo i {
            font-size: 2rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
            border: 2px solid transparent;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #10B981 0%, #34D399 100%);
            padding: 8rem 0 6rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white" opacity="0.1"/><circle cx="80" cy="40" r="3" fill="white" opacity="0.1"/><circle cx="40" cy="80" r="2" fill="white" opacity="0.1"/></svg>');
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            animation: fadeInUp 0.8s ease-out;
        }

        .hero-content p {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            opacity: 0.95;
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }

        .btn-hero {
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .btn-white {
            background: white;
            color: var(--primary);
        }

        .btn-white:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
        }

        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeInUp 0.8s ease-out 0.6s both;
        }

        .eco-visual {
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            backdrop-filter: blur(10px);
        }

        .eco-visual i {
            font-size: 8rem;
            color: white;
            opacity: 0.9;
        }

        .floating-icons {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .floating-icon {
            position: absolute;
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.5rem;
            animation: floatIcon 3s ease-in-out infinite;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .floating-icon:nth-child(1) { top: 10%; left: 20%; animation-delay: 0s; }
        .floating-icon:nth-child(2) { top: 20%; right: 10%; animation-delay: 1s; }
        .floating-icon:nth-child(3) { bottom: 20%; left: 10%; animation-delay: 2s; }
        .floating-icon:nth-child(4) { bottom: 10%; right: 20%; animation-delay: 3s; }

        @keyframes floatIcon {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Features Section */
        .features {
            padding: 6rem 0;
            background: var(--light);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .section-header p {
            font-size: 1.2rem;
            color: #6B7280;
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(16, 185, 129, 0.1);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.1), transparent);
            transition: left 0.6s;
        }

        .feature-card:hover::before {
            left: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(16, 185, 129, 0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .feature-card p {
            color: #6B7280;
            line-height: 1.6;
        }

        /* Process Section */
        .process {
            padding: 6rem 0;
            background: white;
        }

        .process-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-top: 3rem;
        }

        .process-step {
            text-align: center;
            position: relative;
        }

        .process-step::after {
            content: '';
            position: absolute;
            top: 40px;
            right: -50%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), transparent);
            z-index: -1;
        }

        .process-step:last-child::after {
            display: none;
        }

        .step-number {
            width: 80px;
            height: 80px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            font-weight: 800;
            color: white;
        }

        .process-step h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        /* Types Section */
        .types {
            padding: 6rem 0;
            background: var(--light);
        }

        .types-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .type-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            border-left: 5px solid var(--primary);
            transition: all 0.3s ease;
        }

        .type-card:hover {
            transform: translateX(10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .type-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .type-card i {
            color: var(--primary);
        }

        .type-list {
            list-style: none;
            padding: 0;
        }

        .type-list li {
            padding: 0.5rem 0;
            color: #6B7280;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .type-list li::before {
            content: '✓';
            color: var(--primary);
            font-weight: bold;
            width: 20px;
            height: 20px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-brand h3 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--secondary);
        }

        .footer-brand p {
            color: #9CA3AF;
            line-height: 1.6;
        }

        .footer-section h4 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section li {
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            color: #9CA3AF;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--secondary);
        }

        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 2rem;
            text-align: center;
            color: #9CA3AF;
        }
        .cta {
            padding: 6rem 0;
            background: var(--gradient);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M0 50c0-27.614 22.386-50 50-50s50 22.386 50 50-22.386 50-50 50S0 77.614 0 50z" fill="white" opacity="0.05"/></svg>');
            animation: rotate 30s infinite linear;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .cta-content {
            position: relative;
            z-index: 1;
        }

        .cta h2 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .cta p {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            opacity: 0.95;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                padding: 0 1rem;
            }
            
            .nav-buttons {
                gap: 0.5rem;
            }
            
            .btn {
                padding: 0.6rem 1.2rem;
                font-size: 0.9rem;
            }

            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
                padding: 0 1rem;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1.1rem;
            }

            .eco-visual {
                width: 300px;
                height: 300px;
            }

            .eco-visual i {
                font-size: 6rem;
            }

            .floating-icon {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .demo-cards {
                grid-template-columns: 1fr;
            }

            .cta h2 {
                font-size: 2.2rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }

        /* Loading animation for buttons */
        .btn-loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .btn-loading i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <header class="header" id="header">
        <nav class="nav-container">
            <a href="#" class="logo">
                <i class="fas fa-leaf"></i>
                EcoRecolecta
            </a>
            <div class="nav-buttons">
                <a href="{{ route('login') }}" class="btn btn-outline">
                    <i class="fas fa-sign-in-alt"></i>
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i>
                    Registrarse
                </a>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-container">
                <div class="hero-content">
                    <h1>Transformando Residuos en Oportunidades</h1>
                    <p>Únete a la revolución del reciclaje inteligente. EcoRecolecta conecta tu hogar con empresas especializadas para una gestión responsable de residuos mientras ganas recompensas.</p>
                    <div class="hero-buttons">
                        <a href="{{ route('register') }}" class="btn btn-white btn-hero">
                            <i class="fas fa-rocket"></i>
                            Comenzar Ahora
                        </a>
                        <a href="#como-funciona" class="btn btn-outline btn-hero" style="border-color: white; color: white;">
                            <i class="fas fa-play"></i>
                            Cómo Funciona
                        </a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="eco-visual">
                        <i class="fas fa-recycle"></i>
                        <div class="floating-icons">
                            <div class="floating-icon">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <div class="floating-icon">
                                <i class="fas fa-bottle-water"></i>
                            </div>
                            <div class="floating-icon">
                                <i class="fas fa-battery-half"></i>
                            </div>
                            <div class="floating-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features" id="caracteristicas">
            <div class="container">
                <div class="section-header">
                    <h2>¿Por qué elegir EcoRecolecta?</h2>
                    <p>Una plataforma integral que conecta ciudadanos conscientes con empresas especializadas en reciclaje, creando un ecosistema sostenible y recompensas por tu compromiso ambiental.</p>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3>Recolección Programada</h3>
                        <p>Programa tus recolecciones según tu conveniencia. Orgánicos semanales, inorgánicos flexibles y peligrosos mensuales, todo automatizado.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-coins"></i>
                        </div>
                        <h3>Sistema de Puntos</h3>
                        <p>Cada recolección exitosa te otorga puntos que puedes canjear por descuentos en tiendas aliadas. ¡Recicla y ahorra!</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <h3>Notificaciones WhatsApp</h3>
                        <p>Recibe recordatorios automáticos por WhatsApp sobre tus recolecciones programadas y confirmaciones en tiempo real.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Seguimiento Detallado</h3>
                        <p>Monitorea tu impacto ambiental con reportes detallados de todas tus recolecciones, peso reciclado y puntos ganados.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Empresas Certificadas</h3>
                        <p>Trabajamos solo con empresas especializadas y certificadas que garantizan el manejo adecuado de cada tipo de residuo.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Plataforma Web Intuitiva</h3>
                        <p>Interfaz fácil de usar desde cualquier dispositivo. Gestiona tus recolecciones desde la comodidad de tu hogar.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="process" id="como-funciona">
            <div class="container">
                <div class="section-header">
                    <h2>Cómo Funciona EcoRecolecta</h2>
                    <p>Un proceso simple y efectivo que transforma la forma en que manejas tus residuos domésticos.</p>
                </div>
                <div class="process-steps">
                    <div class="process-step">
                        <div class="step-number">1</div>
                        <h3>Regístrate Gratis</h3>
                        <p>Crea tu cuenta en menos de 2 minutos. Solo necesitas tu correo, ubicación y datos básicos para comenzar.</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">2</div>
                        <h3>Programa Recolecciones</h3>
                        <p>Selecciona qué tipos de residuos quieres recolectar y la frecuencia. El sistema asignará automáticamente los días según tu localidad.</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">3</div>
                        <h3>Prepara tus Residuos</h3>
                        <p>Separa correctamente tus residuos siguiendo nuestras guías. La separación adecuada es clave para obtener puntos.</p>
                    </div>
                    <div class="process-step">
                        <div class="step-number">4</div>
                        <h3>Recolección y Puntos</h3>
                        <p>Nuestros recolectores certificados pesan y verifican tus residuos. Ganas puntos automáticamente por cada recolección exitosa.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Types Section -->
        <section class="types">
            <div class="container">
                <div class="section-header">
                    <h2>Tipos de Residuos que Recolectamos</h2>
                    <p>Manejo especializado para cada categoría de residuo, garantizando el proceso de reciclaje más adecuado.</p>
                </div>
                <div class="types-grid">
                    <div class="type-card">
                        <h3><i class="fas fa-leaf"></i> Residuos Orgánicos</h3>
                        <ul class="type-list">
                            <li><strong>Fracción Orgánica (FO):</strong> Restos de cocina, cáscaras de frutas, huesos, espinas de pescado</li>
                            <li><strong>Fracción Vegetal (FV):</strong> Hojas secas, raíces pequeñas, restos de jardinería</li>
                            <li><strong>Residuos de Poda:</strong> Ramas grandes, troncos, grandes cantidades de tierra</li>
                            <li><strong>Recolección:</strong> Semanal por localidad</li>
                        </ul>
                    </div>
                    <div class="type-card">
                        <h3><i class="fas fa-recycle"></i> Residuos Inorgánicos Reciclables</h3>
                        <ul class="type-list">
                            <li>Papel y cartón limpio</li>
                            <li>Plásticos de todos los tipos</li>
                            <li>Vidrio (botellas, frascos)</li>
                            <li>Metales no contaminados</li>
                            <li><strong>Recolección:</strong> 1 o 2 veces por semana, programada o por demanda</li>
                        </ul>
                    </div>
                    <div class="type-card">
                        <h3><i class="fas fa-exclamation-triangle"></i> Residuos Peligrosos</h3>
                        <ul class="type-list">
                            <li>Baterías y pilas de todo tipo</li>
                            <li>Aceites usados de cocina</li>
                            <li>Productos químicos del hogar</li>
                            <li>Medicamentos vencidos</li>
                            <li><strong>Recolección:</strong> Una vez al mes con manejo especializado</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta">
            <div class="container">
                <div class="cta-content">
                    <h2>¡Únete a la Revolución Verde!</h2>
                    <p>Más de 10,000 familias ya están transformando sus residuos en oportunidades. Sé parte del cambio hacia un futuro más sostenible.</p>
                    <div class="cta-buttons">
                        <a href="{{ route('register') }}" class="btn btn-white btn-hero">
                            <i class="fas fa-leaf"></i>
                            Crear Cuenta Gratis
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline btn-hero" style="border-color: white; color: white;">
                            <i class="fas fa-sign-in-alt"></i>
                            Ya Tengo Cuenta
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <h3>EcoRecolecta</h3>
                    <p>Transformamos la gestión de residuos domésticos en una experiencia simple, sostenible y recompensada. Conectamos hogares conscientes con empresas especializadas para crear un impacto positivo en el medio ambiente.</p>
                    <div style="margin-top: 1.5rem;">
                        <a href="#" style="color: var(--secondary); font-size: 1.5rem; margin-right: 1rem;"><i class="fab fa-facebook"></i></a>
                        <a href="#" style="color: var(--secondary); font-size: 1.5rem; margin-right: 1rem;"><i class="fab fa-instagram"></i></a>
                        <a href="#" style="color: var(--secondary); font-size: 1.5rem; margin-right: 1rem;"><i class="fab fa-twitter"></i></a>
                        <a href="#" style="color: var(--secondary); font-size: 1.5rem;"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Servicios</h4>
                    <ul>
                        <li><a href="#">Recolección Orgánica</a></li>
                        <li><a href="#">Recolección Inorgánica</a></li>
                        <li><a href="#">Residuos Peligrosos</a></li>
                        <li><a href="#">Sistema de Puntos</a></li>
                        <li><a href="#">Reportes y Seguimiento</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Empresa</h4>
                    <ul>
                        <li><a href="#">Sobre Nosotros</a></li>
                        <li><a href="#">Cómo Funciona</a></li>
                        <li><a href="#">Empresas Aliadas</a></li>
                        <li><a href="#">Impacto Ambiental</a></li>
                        <li><a href="#">Noticias</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Soporte</h4>
                    <ul>
                        <li><a href="#">Centro de Ayuda</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Guías de Separación</a></li>
                        <li><a href="#">Términos de Servicio</a></li>
                        <li><a href="#">Política de Privacidad</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 EcoRecolecta. Todos los derechos reservados. | Hecho con 💚 para un planeta más verde.</p>
            </div>
        </div>
    </footer>

    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all feature cards and process steps
        document.querySelectorAll('.feature-card, .process-step, .type-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Add loading state to buttons that navigate to Laravel routes
        document.querySelectorAll('a[href*="login"], a[href*="register"]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                // Add loading state
                const icon = this.querySelector('i');
                const originalClass = icon.className;
                
                this.classList.add('btn-loading');
                icon.className = 'fas fa-spinner';
                
                // Reset after 3 seconds (in case navigation fails)
                setTimeout(() => {
                    this.classList.remove('btn-loading');
                    icon.className = originalClass;
                }, 3000);
            });
        });

        // Add hover effect to floating icons
        document.querySelectorAll('.floating-icon').forEach((icon, index) => {
            icon.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.2) translateY(-10px)';
                this.style.transition = 'all 0.3s ease';
            });
            
            icon.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1) translateY(0px)';
            });
        });

        // Initialize particles effect
        function createParticles() {
            const hero = document.querySelector('.hero');
            for (let i = 0; i < 5; i++) {
                const particle = document.createElement('div');
                particle.style.cssText = `
                    position: absolute;
                    width: 4px;
                    height: 4px;
                    background: rgba(255, 255, 255, 0.3);
                    border-radius: 50%;
                    animation: float ${3 + Math.random() * 4}s ease-in-out infinite;
                    left: ${Math.random() * 100}%;
                    top: ${Math.random() * 100}%;
                    animation-delay: ${Math.random() * 2}s;
                `;
                hero.appendChild(particle);
            }
        }

        // Initialize on load
        window.addEventListener('load', function() {
            createParticles();
            
            // Add entrance animations
            document.querySelectorAll('.hero-content > *').forEach((el, index) => {
                el.style.animationDelay = `${index * 0.2}s`;
            });
        });

        // Performance optimization for mobile
        let touchStartY = 0;
        document.addEventListener('touchstart', e => {
            touchStartY = e.touches[0].clientY;
        }, { passive: true });

        document.addEventListener('touchend', e => {
            const touchEndY = e.changedTouches[0].clientY;
            const diff = touchStartY - touchEndY;
            
            if (Math.abs(diff) > 50) {
                document.body.style.overflow = 'hidden';
                setTimeout(() => {
                    document.body.style.overflow = 'auto';
                }, 300);
            }
        }, { passive: true });

        // Lazy loading for better performance
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            imageObserver.unobserve(img);
                        }
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    </script>
</body>
</html>