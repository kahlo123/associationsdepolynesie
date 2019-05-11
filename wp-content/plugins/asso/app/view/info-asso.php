<div class="wrap">
    <h2>Information de l'association</h2>
    <form method="post" action="./admin.php?page=asso_plugin" id="form_info_asso">
        Nom de l'association : <input type="text" name="name"><br>
        Adresse: <input type="text" name="address"><br>
        Boite postal: <input type="text" name="pb"><br>
        Code postal: <input type="text" name="pc"><br>
        Numéro tahiti: <input type="text" name="num_tahiti"><br>

        Type de l'association :
        <select name="asso_type">
            <option>Sport</option>
            <option>Jeunesse</option>
            <option>Culturelle</option>
        </select>
        <br>
        Date de création : <input type="date" name="date_crea"><br>
        Les status de l'association : <input name="statut" type="file"><br>
        Procès verbal d'assemblé constitutive : <input name="minutes" type="file"><br>
        Règlement intérieur : <input name="reg_int" type="file"><br>
        <button type="submit">Envoyer</button>
    </form>
</div>