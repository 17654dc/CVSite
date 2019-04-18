<?php
if (!isset($login)) $login= "";
?>

<div class="container">
    <div class="col-md-8">
            <form method="post" action="index.php?page=admin">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
        <label for="login">Login&nbsp;: </label>
        <input type="text" class="form-control" id="login" name="login" value="<?=$login?>" />
                        </div>
                        <div>
        <label for="mdp">Mot de passe&nbsp&nbsp;: </label>
        <input type="password" id="mdp" name="mdp" class="form-control">
                        </div><br />
                        <div class="col-md-12">
                            <input type="submit" value="Envoyer" class="btn btn-primary pull-right">

                            <input type="reset" value="Effacer" class="btn btn-primary pull-right">
                        </div>
                    </div>
                </div>
    <input type="hidden" name="admin" />
            </form>
    </div>
</div>

