<?php
/**
 * LADATAM - Header personalizado
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#000000">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class('ladatam-theme'); ?>>
<?php wp_body_open(); ?>

<!-- HEADER -->
<header class="ladatam-header" id="header">
    <div class="header-container">
        <!-- LOGO -->
        <a href="<?php echo home_url(); ?>" class="header-logo">
            <?php 
            $logo_path = get_stylesheet_directory() . '/assets/images/logo-ladatam.png';
            $logo_url = get_stylesheet_directory_uri() . '/assets/images/logo-ladatam.png';
            
            if (file_exists($logo_path)) : ?>
                <img src="<?php echo $logo_url; ?>" alt="LADATAM" class="logo-image">
            <?php elseif (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <span class="logo-text">
                    <span class="tech-bracket">{</span>LADATAM<span class="tech-bracket">}</span>
                </span>
            <?php endif; ?>
        </a>
        
        <!-- NAV DESKTOP -->
        <nav class="header-nav desktop-nav">
            <a href="<?php echo home_url('/aprender'); ?>" class="nav-link">Aprender</a>
            <a href="<?php echo home_url('/software'); ?>" class="nav-link">Software</a>
            <a href="<?php echo home_url('/comunidad'); ?>" class="nav-link">Comunidad</a>
            <a href="<?php echo home_url('/nosotros'); ?>" class="nav-link">Nosotros</a>
            <a href="<?php echo home_url('/contacto'); ?>" class="nav-link">Contacto</a>
        </nav>
        
        <!-- CTA -->
        <div class="header-cta">
            <a href="<?php echo home_url('/registro'); ?>" class="ladatam-btn ladatam-btn-primary btn-small">
                Empieza Gratis
            </a>
        </div>
        
        <!-- MOBILE MENU TOGGLE -->
        <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Menú">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
    </div>
    
    <!-- MOBILE NAV -->
    <nav class="mobile-nav" id="mobileNav">
        <a href="<?php echo home_url(); ?>" class="nav-link">Inicio</a>
        <a href="<?php echo home_url('/aprender'); ?>" class="nav-link">Aprender</a>
        <a href="<?php echo home_url('/software'); ?>" class="nav-link">Software</a>
        <a href="<?php echo home_url('/comunidad'); ?>" class="nav-link">Comunidad</a>
        <a href="<?php echo home_url('/nosotros'); ?>" class="nav-link">Nosotros</a>
        <a href="<?php echo home_url('/contacto'); ?>" class="nav-link">Contacto</a>
        <a href="<?php echo home_url('/registro'); ?>" class="ladatam-btn ladatam-btn-primary">Empieza Gratis</a>
    </nav>
</header>

<!-- MAIN CONTENT -->
<main class="ladatam-main">

<style>
/* HEADER STYLES */
.ladatam-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: rgba(0, 0, 0, 0.95);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid #1a1a1a;
    transition: all 0.3s ease;
}

.ladatam-header.scrolled {
    background: rgba(0, 0, 0, 0.98);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
}

.header-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 15px 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* LOGO */
.header-logo {
    text-decoration: none;
    display: flex;
    align-items: center;
}

.logo-text {
    font-size: 1.5rem;
    font-weight: 800;
    color: #ffffff;
}

.logo-text .tech-bracket {
    color: #d9ff18;
    font-family: 'JetBrains Mono', monospace;
    font-weight: 400;
}

.header-logo .logo-image {
    height: 45px;
    width: auto;
    transition: transform 0.3s ease, filter 0.3s ease;
}

.header-logo:hover .logo-image {
    transform: scale(1.05);
    filter: drop-shadow(0 0 8px rgba(217, 255, 24, 0.4));
}

/* Soporte para custom-logo de WordPress */
.header-logo img,
.custom-logo {
    height: 45px;
    width: auto;
}

/* NAV */
.header-nav {
    display: flex;
    gap: 35px;
}

.nav-link {
    color: #cccccc;
    text-decoration: none;
    font-size: 0.95rem;
    font-weight: 500;
    transition: color 0.3s ease;
    position: relative;
}

.nav-link:hover {
    color: #d9ff18;
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 2px;
    background: #d9ff18;
    transition: width 0.3s ease;
}

.nav-link:hover::after {
    width: 100%;
}

/* CTA BUTTON */
.btn-small {
    padding: 10px 20px;
    font-size: 0.85rem;
}

/* MOBILE MENU */
.mobile-menu-toggle {
    display: none;
    flex-direction: column;
    gap: 5px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px;
}

.hamburger-line {
    width: 25px;
    height: 2px;
    background: #ffffff;
    transition: all 0.3s ease;
}

.mobile-menu-toggle.active .hamburger-line:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
}

.mobile-menu-toggle.active .hamburger-line:nth-child(2) {
    opacity: 0;
}

.mobile-menu-toggle.active .hamburger-line:nth-child(3) {
    transform: rotate(-45deg) translate(5px, -5px);
}

.mobile-nav {
    display: none;
    flex-direction: column;
    padding: 20px 30px 30px;
    background: #0a0a0a;
    border-top: 1px solid #1a1a1a;
}

.mobile-nav.open {
    display: flex;
}

.mobile-nav .nav-link {
    padding: 15px 0;
    border-bottom: 1px solid #1a1a1a;
    font-size: 1.1rem;
}

.mobile-nav .nav-link::after {
    display: none;
}

.mobile-nav .ladatam-btn {
    margin-top: 20px;
    text-align: center;
}

/* RESPONSIVE */
@media (max-width: 900px) {
    .desktop-nav,
    .header-cta {
        display: none;
    }
    
    .mobile-menu-toggle {
        display: flex;
    }
}

/* MAIN */
.ladatam-main {
    background: #000000;
    min-height: 100vh;
}
</style>

<script>
// Header scroll effect
window.addEventListener('scroll', function() {
    const header = document.getElementById('header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// Mobile menu toggle
document.getElementById('mobileMenuToggle').addEventListener('click', function() {
    this.classList.toggle('active');
    document.getElementById('mobileNav').classList.toggle('open');
});
</script>
