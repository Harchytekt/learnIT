<?php
    $quoteList = array(
        "La capacité d'apprendre est un don.<br>La faculté d'apprendre est un talent.<br>La volonté d'apprendre est un choix.",
        "L'apprentissage n'épuise jamais l'esprit.",
        "Être ignorant n'est pas tant une honte que le refus d'apprendre.",
        "Le plaisir le plus noble est la joie de comprendre.",
        "Tu fais mal si tu fais l’éloge de quelque chose que tu ne comprends pas bien ; et si tu blâmes, tu fais plus mal encore.",
        "Tu me dis, j'oublie.<br>Tu m'enseignes, je me souviens.<br>Tu m'impliques, j'apprends.",
        "Savoir que l'on sait ce que l'on sait, et savoir que l'on ne sait pas ce que l'on ne sait pas : voilà la véritable science.",
        "Apprendre sans réfléchir est vain.<br>Réfléchir sans apprendre est dangereux.",
        "Une personne qui n’a jamais fait une erreur n'a jamais essayé quelque chose de nouveau.",
        "La joie dans la recherche et la compréhension est le plus beau cadeau de la nature.",
        "Un homme sage peut apprendre plus d’une question stupide qu’un fou peut apprendre d'une réponse sage.",
        "On n’apprend pas à marcher en suivant les règles.<br>On l’ apprend par la pratique et à travers les chutes.",
        "Vis comme si tu devais mourir demain.<br>Apprends comme si tu devais vivre éternellement.",
        "À l'instant même où tu cesses d'apprendre, je crois que tu es mort.",
        "L'homme qui a accompli tout ce qu'il pense digne, a commencé à mourir.",
        "Qu'est-ce que l'échec ?<br>Rien qu'un apprentissage; rien d'autre que le premier pas vers quelque chose de mieux.",
        "Quand nous sommes enthousiastes, notre compétence augmente à grande vitesse."
    );

    $authorList = array(
        "Brian Herbert",
        "Léonard de Vinci",
        "Benjamin Franklin",
        "Léonard de Vinci",
        "Don Herold",
        "Benjamin Franklin",
        "Confucius",
        "Confucius",
        "Albert Einstein",
        "Albert Einstein",
        "Bruce Lee",
        "Richard Branson",
        "Mahatma Gandhi",
        "Jack Nicholson",
        "E.T. Trigg",
        "Wendell Phillips",
        "André Stern"
    );

    $i = mt_rand(0, count($quoteList)-1)

?>
<div class="center">
    <blockquote class="card-blockquote">
        <p><i class="fa fa-angle-double-left" aria-hidden="true"></i>
            <?php echo $quoteList[$i]; ?>
            <i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
        <footer><?php echo $authorList[$i]; ?></footer>
    </blockquote>
</div>
