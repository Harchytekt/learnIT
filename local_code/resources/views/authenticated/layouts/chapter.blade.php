<div class="col-12 col-md-10 offset-md-1 vignette" id="chapterBlock">
    <img class="pushpin up left" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <img class="pushpin right up" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">

    <div style="padding: 20px">
        <h1>{{ $course->name }}</h1>
        <h2>{{ $chapter->name }}</h2>

        <h3>Qu’est-ce qu’un algorithme ?</h3>
        <p>
            <span class="bold underline">Voici une définition simple d’un algorithme</span> :
            c’est une <span class="bold">suite d’instructions</span> qui, quand elles
            sont exécutées correctement, aboutissent au résultat attendu.<br>
            C’est un énoncé dans un <span class="bold">langage clair</span>, bien
            <span class="bold">défini</span> et <span class="bold">ordonné</span> qui
            permet de <span class="bold">résoudre un problème</span>, le plus souvent par calcul.
        </p>
        <blockquote>
            L’algorithme est donc une recette pour qu’un programme d’ordinateur
            puisse donner un résultat donné.
        </blockquote>

        <h4> Mais encore ? 🤔</h4>

        <p>
            Un programme est écrit à l’aide de <span class="italic">langages de
                programmation</span> dont les instructions permettent, par exemple, de :
            <ul style="list-style-type: square;">
                <li>
                    réaliser des opérations mathématiques (additions, soustraction,...).
                </li>
                <li>
                    obtenir des données au clavier, depuis un fichier,...
                </li>
                <li>
                    afficher des données à l’écran ou écrire dans un fichier.
                </li>
                <li>
                    vérifier si certaines conditions sont respectées et exécuter la
                    séquence d’instructions appropriée.
                </li>
                <li>
                    réaliser une tâche de manière répétitive.
                </li>
            </ul>
        </p>

        <h3>Qu’est-ce qu’un langage de programmation ?</h3>

        <p>
            On distingue deux types de langages :
            <ul style="list-style-type: decimal;">
                <li>
                    <span class="bold">ceux de haut niveau</span>, compréhensibles par
                    l’humain : Python, Java, C, PHP, Perl,...<br>
                    <span class="italic">Il s’agit souvent d'un langage formel avec des
                    mots anglais.</span>
                </li>
                <li>
                    <span class="bold">ceux de bas niveau</span>, exécutables par un
                    ordinateur : Atmel, MIPS32,...<br>
                    <span class="italic">Nommés langages machine ou assembleur.</span>
                </li>
            </ul>
        </p>

        <p>
            Les avantages des langages de haut niveau sont :
            <ul>
                <li>
                    une facilité d’écriture et de <span class="italic">(re)</span>lecture,
                </li>
                <li>
                    une rapidité d’écriture,
                </li>
                <li>
                    un code plus court,
                </li>
                <li>
                    un code <span class="italic">portable</span> ou multi-plateforme.
                    <ul>
                        <li>
                            En effet, ils peuvent être utilisés sur différents types
                            d’ordinateurs avec peu ou pas de modifications.
                        </li>
                        <li>
                            À l’inverse des programmes de bas niveau qui ne sont
                            exécutables que sur un type bien particulier d’ordinateurs
                            et doivent être réécrits pour d’autres.
                        </li>
                    </ul>
                </li>
            </ul>
        </p>

        <blockquote>
            En plus de pouvoir crééer des programmes, le code  permet de créer des jeux
            et des sites web (<span class="bold">à l’aide de langages spécialisés</span>).
        </blockquote>

        <h3>Pourquoi apprendre le Python ?</h3>
        <p>
            <ul>
                <li>
                    <span class="bold">Simplicité</span> : le Python est simple.
                </li>
                <li>
                    <span class="bold">Portabilité</span> : il est indépendant de la
                    plateforme, il est même préinstallé sur la plupart des systèmes
                    d'exploitation.
                </li>
                <li>
                    <span class="bold">Bibliothèque</span> : le langage intègre de base
                    un ensemble de libraires très complet. Que ce soit pour faire du Web,
                    des calculs scientifiques ou même les deux.
                </li>
                <li>
                    <span class="bold">Lisibilité</span> : avec son principe d’indentation,
                    les codes Python sont généralement très simples à lire.
                </li>
                <li>
                    <span class="bold">Gratuité</span> : l'éditeur (IDLE) ainsi que
                    l'interpréteur sont gratuits.
                </li>
            </ul>
        </p>
    </div>

    <img class="pushpin bottom left" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
    <img class="pushpin right bottom" src="{{ asset('img/pushpin.svg') }}" alt="" height="52" width="52">
</div>
