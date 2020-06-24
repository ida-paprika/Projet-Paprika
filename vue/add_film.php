
<?php $titre = "Ajout Film"; ?>

<div id="addFilm">
    <section>
        <h1>Ajouter un film dans la <a href="?action=Films">vidéothèque</a></h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Quam, odio, minus quas minima enim quo quidem rerum alias odit a 
            laborum velit magnam amet omnis dicta! Ad atque deleniti assumenda.
        </p>
    </section>
    <section>
        <div class="formArticle blocForm">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?= $user; ?>">
                <div>
                    <label for="img_bg">Image de l'en-tête</label>
                    <input type="file" name="img_bg" accept="image/*" maxlength="50" required>
                </div>
                <div>
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" maxlength="60" placeholder="Titre du film" required>
                </div>
                <div>
                    <label for="police">Police du titre</label>
                    <select name="police" id="">
                        <option value="BacktoSchool">BacktoSchool</option>
                        <option value="Capsmall">Capsmall</option>
                        <option value="F25">F25</option>
                        <option value="Januszowski">Januszowski</option>
                        <option value="Oceanside">Oceanside</option>
                    </select>
                </div>
                <div>
                    <label for="affiche">Affiche du film</label>
                    <input type="file" name="affiche" accept="image/*" maxlength="50" required>
                </div>
                <div>
                    <label for="realisateur">Réalisateur</label>
                    <input type="text" name="realisateur" maxlength="50" placeholder="prénom et nom du réalisateur" required>
                </div>
                <div>
                    <label for="">Genre(s)</label>
                    <div class="liste_genres">
                    <?php foreach($genre as $key => $value): ?>
                        <div class="check_genre">
                            <input type="checkbox" id="scales" name="genre[]" value="<?= $value->getId(); ?>">
                            <label for="genre"><?= $value->getDesignation(); ?></label>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div>
                    <label for="duree">Durée</label>
                    <input type="text" name="duree" maxlength="10" placeholder="00 h 00 min" required>
                </div>
                <div>
                    <label for="nationalite">Nationalité</label>
                    <input type="text" name="nationalite" list="pays" maxlength="70" placeholder="Pays, ...">
                    <datalist id="pays">
                        <option value="Afghane">Afghane</option>
                        <option value="Albanaise">Albanaise</option>
                        <option value="Algérienne">Algerienne</option>
                        <option value="Allemande">Allemande</option>
                        <option value="Américaine">Américaine</option>
                        <option value="Andorrane">Andorrane</option>
                        <option value="Angolaise">Angolaise</option>
                        <option value="Antiguaise-et-Barbudienne">Antiguaise-et-Barbudienne</option>
                        <option value="Argentine">Argentine</option>
                        <option value="Armenienne">Armenienne</option>
                        <option value="Australienne">Australienne</option>
                        <option value="Autrichienne">Autrichienne</option>
                        <option value="Azerbaïdjanaise">Azerbaïdjanaise</option>
                        <option value="Bahamienne">Bahamienne</option>
                        <option value="Bahreinienne">Bahreinienne</option>
                        <option value="Bangladaise">Bangladaise</option>
                        <option value="Barbadienne">Barbadienne</option>
                        <option value="Belge">Belge</option>
                        <option value="Belizienne">Belizienne</option>
                        <option value="Béninoise">Béninoise</option>
                        <option value="Bhoutanaise">Bhoutanaise</option>
                        <option value="Biélorusse">Biélorusse</option>
                        <option value="Birmane">Birmane</option>
                        <option value="Bissau-Guinéenne">Bissau-Guinéenne</option>
                        <option value="Bolivienne">Bolivienne</option>
                        <option value="Bosnienne">Bosnienne</option>
                        <option value="Botswanaise">Botswanaise</option>
                        <option value="Brésilienne">Brésilienne</option>
                        <option value="Britannique">Britannique</option>
                        <option value="Brunéienne">Brunéienne</option>
                        <option value="Bulgare">Bulgare</option>
                        <option value="Burkinabée">Burkinabée</option>
                        <option value="Burundaise">Burundaise</option>
                        <option value="Cambodgienne">Cambodgienne</option>
                        <option value="Camerounaise">Camerounaise</option>
                        <option value="Canadienne">Canadienne</option>
                        <option value="Cap-verdienne">Cap-verdienne</option>
                        <option value="Centrafricaine">Centrafricaine</option>
                        <option value="Chilienne">Chilienne</option>
                        <option value="Chinoise">Chinoise</option>
                        <option value="Chypriote">Chypriote</option>
                        <option value="Colombienne">Colombienne</option>
                        <option value="Comorienne">Comorienne</option>
                        <option value="Congolaise">Congolaise</option>
                        <option value="Congolaise">Congolaise</option>
                        <option value="Cookienne">Cookienne</option>
                        <option value="Costaricaine">Costaricaine</option>
                        <option value="Croate">Croate</option>
                        <option value="Cubaine">Cubaine</option>
                        <option value="Danoise">Danoise</option>
                        <option value="Djiboutienne">Djiboutienne</option>
                        <option value="Dominicaine">Dominicaine</option>
                        <option value="Dominiquaise">Dominiquaise</option>
                        <option value="Égyptienne">Égyptienne</option>
                        <option value="Émirienne">Émirienne</option>
                        <option value="Équato-guineenne">Équato-guineenne</option>
                        <option value="Équatorienne">Équatorienne</option>
                        <option value="Érythréenne">Érythréenne</option>
                        <option value="Espagnole">Espagnole</option>
                        <option value="Est-timoraise">Est-timoraise</option>
                        <option value="Estonienne">Estonienne</option>
                        <option value="Éthiopienne">Éthiopienne</option>
                        <option value="Fidjienne">Fidjienne</option>
                        <option value="Finlandaise">Finlandaise</option>
                        <option value="Française">Française</option>
                        <option value="Gabonaise">Gabonaise</option>
                        <option value="Gambienne">Gambienne</option>
                        <option value="Georgienne">Georgienne</option>
                        <option value="Ghanéenne">Ghanéenne</option>
                        <option value="Grecque">Grecque</option>
                        <option value="Grenadienne">Grenadienne</option>
                        <option value="Guatémaltèque">Guatémaltèque</option>
                        <option value="Guinéenne">Guinéenne</option>
                        <option value="Guyanienne">Guyanienne</option>
                        <option value="Haïtienne">Haïtienne</option>
                        <option value="Hondurienne">Hondurienne</option>
                        <option value="Hongroise">Hongroise</option>
                        <option value="Indienne">Indienne</option>
                        <option value="Indonésienne">Indonésienne</option>
                        <option value="Irakienne">Irakienne</option>
                        <option value="Iranienne">Iranienne</option>
                        <option value="Irlandaise">Irlandaise</option>
                        <option value="Islandaise">Islandaise</option>
                        <option value="Israélienne">Israélienne</option>
                        <option value="Italienne">Italienne</option>
                        <option value="Ivoirienne">Ivoirienne</option>
                        <option value="Jamaïcaine">Jamaïcaine</option>
                        <option value="Japonaise">Japonaise</option>
                        <option value="Jordanienne">Jordanienne</option>
                        <option value="Kazakhstanaise">Kazakhstanaise</option>
                        <option value="Kenyane">Kenyane</option>
                        <option value="Kirghize">Kirghize</option>
                        <option value="Kiribatienne">Kiribatienne</option>
                        <option value="Kittitienne et Névicienne">Kittitienne et Névicienne</option>
                        <option value="Koweïtienne">Koweïtienne</option>
                        <option value="Laotienne">Laotienne</option>
                        <option value="Lesothane">Lesothane</option>
                        <option value="Lettone">Lettone</option>
                        <option value="Libanaise">Libanaise</option>
                        <option value="Libérienne">Libérienne</option>
                        <option value="Libyenne">Libyenne</option>
                        <option value="Liechtensteinoise">Liechtensteinoise</option>
                        <option value="Lituanienne">Lituanienne</option>
                        <option value="Luxembourgeoise">Luxembourgeoise</option>
                        <option value="MKD">Macédonienne (Macédoine)</option>
                        <option value="MYS">Malaisienne (Malaisie)</option>
                        <option value="MWI">Malawienne (Malawi)</option>
                        <option value="MDV">Maldivienne (Maldives)</option>
                        <option value="MDG">Malgache (Madagascar)</option>
                        <option value="MLI">Maliennes (Mali)</option>
                        <option value="MLT">Maltaise (Malte)</option>
                        <option value="MAR">Marocaine (Maroc)</option>
                        <option value="MHL">Marshallaise (Îles Marshall)</option>
                        <option value="MUS">Mauricienne (Maurice)</option>
                        <option value="MRT">Mauritanienne (Mauritanie)</option>
                        <option value="MEX">Mexicaine (Mexique)</option>
                        <option value="FSM">Micronésienne (Micronésie)</option>
                        <option value="MDA">Moldave (Moldovie)</option>
                        <option value="MCO">Monegasque (Monaco)</option>
                        <option value="MNG">Mongole (Mongolie)</option>
                        <option value="MNE">Monténégrine (Monténégro)</option>
                        <option value="MOZ">Mozambicaine (Mozambique)</option>
                        <option value="NAM">Namibienne (Namibie)</option>
                        <option value="NRU">Nauruane (Nauru)</option>
                        <option value="NLD">Néerlandaise (Pays-Bas)</option>
                        <option value="NZL">Néo-Zélandaise (Nouvelle-Zélande)</option>
                        <option value="NPL">Népalaise (Népal)</option>
                        <option value="NIC">Nicaraguayenne (Nicaragua)</option>
                        <option value="NGA">Nigériane (Nigéria)</option>
                        <option value="NER">Nigérienne (Niger)</option>
                        <option value="NIU">Niuéenne (Niue)</option>
                        <option value="PRK">Nord-coréenne (Corée du Nord)</option>
                        <option value="NOR">Norvégienne (Norvège)</option>
                        <option value="OMN">Omanaise (Oman)</option>
                        <option value="UGA">Ougandaise (Ouganda)</option>
                        <option value="UZB">Ouzbéke (Ouzbékistan)</option>
                        <option value="PAK">Pakistanaise (Pakistan)</option>
                        <option value="PLW">Palaosienne (Palaos)</option>
                        <option value="PSE">Palestinienne (Palestine)</option>
                        <option value="PAN">Panaméenne (Panama)</option>
                        <option value="PNG">Papouane-Néo-Guinéenne (Papouasie-Nouvelle-Guinée)</option>
                        <option value="PRY">Paraguayenne (Paraguay)</option>
                        <option value="PER">Péruvienne (Pérou)</option>
                        <option value="PHL">Philippine (Philippines)</option>
                        <option value="POL">Polonaise (Pologne)</option>
                        <option value="PRT">Portugaise (Portugal)</option>
                        <option value="QAT">Qatarienne (Qatar)</option>
                        <option value="ROU">Roumaine (Roumanie)</option>
                        <option value="RUS">Russe (Russie)</option>
                        <option value="RWA">Rwandaise (Rwanda)</option>
                        <option value="LCA">Saint-Lucienne (Sainte-Lucie)</option>
                        <option value="SMR">Saint-Marinaise (Saint-Marin)</option>
                        <option value="VCT">Saint-Vincentaise et Grenadine (Saint-Vincent-et-les Grenadines)</option>
                        <option value="SLB">Salomonaise (Îles Salomon)</option>
                        <option value="SLV">Salvadorienne (Salvador)</option>
                        <option value="WSM">Samoane (Samoa)</option>
                        <option value="STP">Santoméenne (Sao Tomé-et-Principe)</option>
                        <option value="SAU">Saoudienne (Arabie saoudite)</option>
                        <option value="SEN">Sénégalaise (Sénégal)</option>
                        <option value="SRB">Serbe (Serbie)</option>
                        <option value="SYC">Seychelloise (Seychelles)</option>
                        <option value="SLE">Sierra-Léonaise (Sierra Leone)</option>
                        <option value="SGP">Singapourienne (Singapour)</option>
                        <option value="SVK">Slovaque (Slovaquie)</option>
                        <option value="SVN">Slovène (Slovénie)</option>
                        <option value="SOM">Somalienne (Somalie)</option>
                        <option value="SDN">Soudanaise (Soudan)</option>
                        <option value="LKA">Sri-Lankaise (Sri Lanka)</option>
                        <option value="ZAF">Sud-Africaine (Afrique du Sud)</option>
                        <option value="KOR">Sud-Coréenne (Corée du Sud)</option>
                        <option value="SSD">Sud-Soudanaise (Soudan du Sud)</option>
                        <option value="SWE">Suédoise (Suède)</option>
                        <option value="CHE">Suisse (Suisse)</option>
                        <option value="SUR">Surinamaise (Suriname)</option>
                        <option value="SWZ">Swazie (Swaziland)</option>
                        <option value="SYR">Syrienne (Syrie)</option>
                        <option value="TJK">Tadjike (Tadjikistan)</option>
                        <option value="TZA">Tanzanienne (Tanzanie)</option>
                        <option value="TCD">Tchadienne (Tchad)</option>
                        <option value="CZE">Tchèque (Tchéquie)</option>
                        <option value="THA">Thaïlandaise (Thaïlande)</option>
                        <option value="TGO">Togolaise (Togo)</option>
                        <option value="TON">Tonguienne (Tonga)</option>
                        <option value="TTO">Trinidadienne (Trinité-et-Tobago)</option>
                        <option value="TUN">Tunisienne (Tunisie)</option>
                        <option value="TKM">Turkmène (Turkménistan)</option>
                        <option value="TUR">Turque (Turquie)</option>
                        <option value="TUV">Tuvaluane (Tuvalu)</option>
                        <option value="UKR">Ukrainienne (Ukraine)</option>
                        <option value="URY">Uruguayenne (Uruguay)</option>
                        <option value="VUT">Vanuatuane (Vanuatu)</option>
                        <option value="VAT">Vaticane (Vatican)</option>
                        <option value="VEN">Vénézuélienne (Venezuela)</option>
                        <option value="VNM">Vietnamienne (Viêt Nam)</option>
                        <option value="YEM">Yéménite (Yémen)</option>
                        <option value="ZMB">Zambienne (Zambie)</option>
                         <option value="ZWE">Zimbabwéenne (Zimbabwe)</option>
                    </datalist>
                </div>
                <div>
                    <label for="date_sortie">Date de sortie</label>
                    <input type="text" name="date_sortie" maxlength="20" placeholder="00 mois 0000" required>
                </div>
                <div>
                    <label for="acteurs">Acteur(s)</label>
                    <input type="text" name="acteurs" maxlength="120" placeholder="Prénom Nom, ..." required>
                </div>
                <div>
                    <label for="resume">Résumé</label>
                    <textarea name="resume" id="" cols="20" maxlength="1500" required>Résumé du film</textarea>
                </div>
                <div>
                    <label for="avis">Avis</label>
                    <textarea name="avis" id="" cols="20" maxlength="1500" required>Pourquoi vous recommandez ce film</textarea>
                </div>
                <div>
                    <label for="lien">Lien</label>
                    <p>https:// <input type="text" maxlength="60" placeholder="www.pagedufilm.com" required></p>
                </div>
                <div>
                    <button type="button">Voir l'aperçu de la fiche</button>
    <!--  APERCU DE L'ARTICLE  -->
                    <div id="apercu_hide_show">
                        <div class="test_accordion">Titre du film<p></p></div>

                        <div class="test_panel">
                            <img src="images/affoches/" alt="affiche du film" class="affiche">
                            <div class="real">
                                <p><span>Réalisateur :</span>&ensp;Nom Réalisateur</p>
                            </div>
                            <div class="genre">
                                <p><span>Genre :</span>&ensp;
                                    Genre
                                </p>
                            </div>
                            <div class="duree">
                                <p><span>Durée :</span>&ensp;00 h 00 min</p>
                            </div>
                            <div class="nat">
                                <p><span>Nationalité : :</span>&ensp;Nationalité</p>
                            </div>
                            <div class="sorti">
                                <p><span>Sorti le :</span>&ensp;00 mois 0000</p>
                            </div>
                            <div class="act">
                                <p><span>Avec :</span>&ensp;Nom Acteur</p>
                            </div>
                            <div class="resume">
                                <p><span>Résumé :</span>&ensp;Résumé</p>
                            </div>
                            <div class="avis">
                                <p><span>Avis :</span>&ensp;Avis</p>
                            </div>
                            <div class="lien">
                                <p>Voir la page du film</p>
                            </div>
                            <p>Voir les commentaires</p>
                        </div>
                    </div>
    <!--  FIN DE L'APERCU  -->
                </div>
                <div class="action_addArticle">
                    <input type="submit" name="ajout_film" value="Ajouter">
                    <input type="button" name="annuler" value="Annuler" onclick='location.href="index.php?action=addFilm"'>
                </div>
            </form>
        </div>
        
    </section>
    
    
</div>