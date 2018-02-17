<div style="color: #FFF; text-align: center; width: 100%; margin-top: 25%;">
    <h3>C'est vide ici ! <i class="far fa-comment"></i></h3>
    @if (isset($view) && $view == 'preview')
        <a class="btn btn-info" href="/cours">Consultez les cours !</a>
    @else
        <a class="btn btn-info" href="/ecrire">Écrivez votre cours !</a>
    @endif
</div>
