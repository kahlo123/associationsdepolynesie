<div class="wrap">
    <h2>Ajouter un bureau</h2>
    <form id="form_office" method="post">
        Date de prise de fonction <input type="date" name="date_start" value="<?php echo date("Y-m-d");?>"><br>
        Date de fin de prise de fonction <input type="date" name="date_end" value="<?php echo date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 366 day"));?>""><br>

        <br><br><br>
        <button type="button" id="add_member">+</button><br>
        <div id="members">
            <div class="member">
                Civilité
                <select>
                    <option>Mr.</option>
                    <option>Mlle</option>
                    <option>Mme</option>
                </select><br>
                Nom <input name="membre[0][lastname]" type="text" value="AH-LO"><br>
                Prénom <input name="membre[0][firstname]" type="text" value="Kyle"><br>
                Date de naissance <input name="membre[0][dateOfBirth]" type="date" value="1992-09-19"><br>
                Tel <input name="membre[0][tel]" type="tel" value="87382102"><br>
                Adresse <input name="membre[0][address]" type="text"value="adresse"><br>
                Email <input name="membre[0][mail]" type="email" value="kyle@gmail.com"><br>
                Fonction
                <select name="membre[0][situation]">
                    <option value="pr">Président</option>
                    <option value="v-pr">Vice-président</option>
                    <option value="tr">Trésorier</option>
                    <option value="compt">Comptable</option>
                    <option value="secr">Secrétaire</option>
                </select>
                <br>
            </div>
        </div>
        <br><br><button type="submit">Envoyer</button>
    </form>
</div>