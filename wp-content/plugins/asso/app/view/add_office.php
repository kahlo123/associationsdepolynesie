<div class="wrap">
    <h2>Ajouter un bureau</h2>
    <form>
        Date de prise de fonction <input type="date" value="<?php echo date("Y-m-d");?>"><br>
        Date de fin de prise de fonction <input type="date" value="<?php echo date("Y-m-d");?>""><br>

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
                Nom <input type="text"><br>
                Prénom <input type="text"><br>
                Date de naissance <input type="date"><br>
                Tel <input type="tel"><br>
                Adresse <input type="text"><br>
                Email <input type="email"><br>
                Fonction
                <select>
                    <option>Président</option>
                    <option>Vice-président</option>
                    <option>Trésorier</option>
                    <option>Secrétaire</option>
                </select>
                <br>
            </div>
        </div>
        <br><br><button type="submit">Envoyer</button>
    </form>
</div>