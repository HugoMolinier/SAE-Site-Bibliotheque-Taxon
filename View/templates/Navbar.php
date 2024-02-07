   
    <nav id="navbar" >
        <div id="menu-mobile">
        </div>
        <div class="nav-wrapper">
            <div>
                <!-- Navbar Logo -->
                <div class="logo">
                    <a href="./index.php"><img src="../Static/images/logo/logo.png" alt="Logo Oiseau"></a>
                </div>

                <!-- Input Search -->
                <form action="Recherche.php" method="GET" >
                    <div class="search__container">
                        <input class="search__input" name="query" type="text" placeholder="Rechercher..." >
                        <input type='hidden' name='rechercheES' value=1>
                    </div>
                </form>
            </div>
            <div>
                <!-- Burger button on Mobile -->
                <svg 
                    id="test"
                    width="24px"
                    height="24px"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <rect width="24" height="4" rx="2" fill="#333" />
                    <rect y="10" width="24" height="4" rx="2" fill="#333" />
                    <rect y="20" width="24" height="4" rx="2" fill="#333" />
                </svg>

                <!-- Menu Navbar on Desktop -->
                <ul id="menu">
                    <li>
                        <a href="./index.php">
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="./Recherche.php">
                            Recherche
                        </a>
                    </li>
                    <li>
                        <a href="./Collection_membre.php">
                            Collection membre
                        </a>
                    </li>
                    <div class="holder-dropdown">                   
                        <?php
                        require_once __DIR__ . '/../../Model/ModelSession.php';
                        $session = Session::getInstance();
                        if ($session->contient('nom')) {
                            echo '<li><a href="#" id="bienvenue-dropdown">Bienvenue ' . htmlspecialchars(substr($session->lire('nom'), 0, 15)) . '</a>';'</li>';
                            echo '<ul id="dropdown-menu">';
                                echo '<li><a href="./Collection_Utilisateur.php">Ma collection</a></li>';
                                echo '<br>';
                                echo '<li><a href="deconnexion_session.php">Déconnexion</a></li>';
                            echo '</ul>';
                        } else {
                            echo '<li><a href="./connexion.php">Connexion</a></li>';
                        }
                        ?>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>

    <script src="../Static/js/burger.js"></script>

