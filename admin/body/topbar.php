<nav class="light-blue">
    <div class="container">
        <div class="nav-wrapper"> 
            <a href="index.php?page=home" class="brand-logo">Blog 2.0 </a>
             
           

            <ul class="right hide-on-med-and-down">
                <!-- Ici on utilise une fonction ternaire si c'est la page home alors la classe sinon c'est une chaine de caractère vide   -->
                <li class="<?php echo($page=="dashboard")?"active" : "";  ?>"><a href="index.php?page=dashboard"> <i class="material-icons">dashboard </i> </a></li>
                <li class="<?php echo($page=="blog")?"active" : "";  ?>"> <a href="index.php?page=blog"> Blog </a></li>

            </ul>
            <ul class="side-nav" id="mobile-menu">
                 

            </ul>

        </div>

    </div>
</nav>