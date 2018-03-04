<div class="col-12 col-md-8 offset-md-2 vignetteBg" id="commentsBlock">
    <img class="tape" id="up" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">

    <h2 class="grey">Commentaires</h2>

    <div class="outer">
        <div class="inner innerComment">
            <div id="commentList">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="green">
                            Formidable !
                        </div>
                        <span class="commentInfos">il y a 10 secondes, par <span class="commentAuthor">Dexnaw</span></span>
                    </li>
                    <li class="list-group-item">
                        <div class="green">
                            Sympa !
                        </div>
                        <span class="commentInfos">il y a 2 mois, par <span class="commentAuthor">floDV</span></span>
                    </li>
                    <li class="list-group-item">
                        <div class="green">
                            Super, j'adore le Python ! 🐍
                        </div>
                        <span class="commentInfos">il y a 4 mois, par <span class="commentAuthor">Harchytekt</span></span>
                    </li>
                </ul>
            </div>
            <hr>
            <div class="card-block">
                <form method="POST" action="/posts/3/comments/">
                    <input type="hidden" name="_token" value="XTmlUjIOGU6aC1NJ3mvJfBs8wVKGvWKE87GiI7rd">
                    <div class="form-group">
                        <textarea class="form-control" name="body" placeholder="Écrivez votre commentaire." required=""></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ajoutez votre commentaire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <img class="tape" id="bottom" src="{{ asset('img/tape.svg') }}" alt="" height="52" width="183.3">
</div>
