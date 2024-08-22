<?php
wp_nav_menu(array(
    'theme_location' => 'primary', // Ubicación del menú registrada en functions.php
    'container' => 'nav', // Envolver el menú en un elemento <nav>
    'container_class' => 'container', // Clase CSS para el contenedor
    'menu_class' => 'menu', // Clase CSS para el <ul> del menú
));
?>