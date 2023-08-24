window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    const header = document.querySelector('.header');
    
    // Obtenez la hauteur de la barre de navigation
    const navbarHeight = navbar.offsetHeight;
    
    // Ajustez la position de l'en-tête en fonction du défilement
    header.style.marginTop = window.scrollY + 'px';
    
    // Ajustez la hauteur de la barre de navigation lorsqu'elle atteint l'en-tête
    if (window.scrollY >= navbarHeight) {
      header.style.marginTop = navbarHeight + 'px';
      header.style.height = '200px'; // Nouvelle hauteur de l'en-tête après que la barre de navigation soit passée
    } else {
      header.style.height = '300px'; // Hauteur d'origine de l'en-tête
    }
  });
  