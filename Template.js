 // Mobile menu toggle (only relevant on mobile)
 const mobileMenu = document.getElementById('mobile-menu');
 const navMenu = document.querySelector('.nav-menu');
 
 if (mobileMenu) {
     mobileMenu.addEventListener('click', function() {
         mobileMenu.classList.toggle('active');
         navMenu.classList.toggle('active');
         document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
     });

     // Close menu when clicking on a link
     document.querySelectorAll('.nav-link').forEach(link => {
         link.addEventListener('click', () => {
             navMenu.classList.remove('active');
             mobileMenu.classList.remove('active');
             document.body.style.overflow = '';
         });
     });
 }