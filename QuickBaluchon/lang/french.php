<?php
$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<site>
    <headers>
        <header>
            <item1>Item 1</item1>
            <item2>Item 2</item2>
            <item3>Item 3</item3>
            <item4>Item 4</item4>
            <item5>Item 5</item5>
            <itemLogIn>
                <title>Connexion</title>
                <client>Client</client>
                <deliveryman>Livreur</deliveryman>
            </itemLogIn>
            <itemSignIn>
                <title>Inscription</title>
                <client>Client</client>
                <deliveryman>Livreur</deliveryman>
            </itemSignIn>
            <itemClientSpace>
                <client>Compte Client</client>
                <deliveryman>Compte Livreur</deliveryman>
                <staff>Compte Staff</staff>
            </itemClientSpace>
            <itemDisconnect>Déconnexion</itemDisconnect>
        </header>
        <headerStaff>
            <item1>Gestion des comptes client</item1>
            <item2>Gestion des comptes livreur</item2>
            <item3>Gestion des candidatures</item3>
            <item4>Item 4</item4>
            <item5>Item 5</item5>
            <staffSpace>Compte Staff</staffSpace>
            <itemDisconnect>Déconnexion</itemDisconnect>
        </headerStaff>
    </headers>
    <footer>
        <contact>
            <title>Contactez-nous</title>
            <buttonName>Contact</buttonName>
        </contact>
        <copyright>
            <title>© 2021 Copyright :</title>
            <linkName>SPS</linkName>
        </copyright>
        <staffLogIn>
            <buttonName>Connexion staff</buttonName>
            <form>
                <usernameInput>
                    <title>Nom d'utilisateur</title>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </usernameInput>
                <passwordInput>
                    <title>Mot de passe</title>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </passwordInput>
                <validation>Connexion</validation>
            </form>
        </staffLogIn>
    </footer>
    <pagesClientSide>
        <index>
            <pageTitle>Page d'accueil</pageTitle>
            <title>Accueil</title>
            <subtitle>Ceci est un sous-titre</subtitle>
            <text></text>
        </index>
        <logInClient>
            <pageTitle>Page de connexion - Client</pageTitle>
            <title>Connexion à votre compte client</title>
            <form>
                <usernameInput>
                    <title>Nom de l'entreprise</title>
                    <placeholder>Nom...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </usernameInput>
                <passwordInput>
                    <title>Mot de passe</title>
                    <placeholder>Mot de passe...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </passwordInput>
                <validation>Envoyer</validation>
            </form>
        </logInClient>
        <logInDeliveryman>
            <pageTitle>Page de connexion - Livreur</pageTitle>
            <title>Connexion à votre compte livreur</title>
            <form>
                <usernameInput>
                    <title>Votre nom</title>
                    <placeholder>Nom...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </usernameInput>
                <passwordInput>
                    <title>Mot de passe</title>
                    <placeholder>Mot de passe...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </passwordInput>
                <validation>Envoyer</validation>
            </form>
        </logInDeliveryman>
        <signInClient>
            <pageTitle>Page d'inscription - Client</pageTitle>
            <title>Création de compte client</title>
            <form>
                <usernameInput>
                    <title>Nom de l'entreprise</title>
                    <placeholder>Nom...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </usernameInput>
                <passwordInput>
                    <title>Mot de passe</title>
                    <placeholder>Mot de passe...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </passwordInput>
                <passwordInputVerification>
                    <title>Confirmation du mot de passe</title>
                    <placeholder>Confirmation du mot de passe...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </passwordInputVerification>
                <emailInput>
                    <title>Mail</title>
                    <placeholder>Mail...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </emailInput>
                <siretNumberInput>
                    <title>Numéro de SIRET</title>
                    <placeholder>SIRET...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </siretNumberInput>
                <motivesInput>
                    <title>Vos motivations</title>
                    <placeholder>Motivations...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </motivesInput>
                <validation>Envoyer</validation>
            </form>
        </signInClient>
        <signInDeliveryman>
            <pageTitle>Page d'inscription - Livreur</pageTitle>
            <title>Création de compte livreur</title>
            <form>
                <usernameInput>
                    <title>Nom d'utilisateur</title>
                    <placeholder>Nom...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </usernameInput>
                <deliveryRangeInput>
                    <title>Distance maximum de livraison</title>
                    <placeholder>Distance (en km) ...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </deliveryRangeInput>
                <ibanInput>
                    <title>Votre IBAN (pour de futures transactions)</title>
                    <placeholder>IBAN ...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </ibanInput>
                <vehicleTypeInput>
                    <title>Votre type de véhicule</title>
                    <option0> -- Séléctionnez une option -- </option0>
                    <option1>Citadine</option1>
                    <option2>Berline</option2>
                    <option3>Break</option3>
                    <option4>Autre</option4>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </vehicleTypeInput>
                <vehicleBrandInput>
                    <title>Marque du véhicule</title>
                    <placeholder>Marque ...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </vehicleBrandInput>
                <vehicleCapacityInput>
                    <title>Capacité de stockage du véhicule (afin d'estimer combien de colis peuvent vous être attribués)</title>
                    <placeholder>Stockage (en m^3) ...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </vehicleCapacityInput>
                <passwordInput>
                    <title>Mot de passe</title>
                    <placeholder>Mot de passe...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </passwordInput>
                <passwordInputVerification>
                    <title>Confirmation du mot de passe</title>
                    <placeholder>Confirmation du mot de passe...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </passwordInputVerification>
                <emailInput>
                    <title>Mail</title>
                    <placeholder>Mail...</placeholder>
                    <valid>Ok !</valid>
                    <invalid>Valeur incorrecte</invalid>
                </emailInput>
                <fileInput>
                    <title>Votre CV</title>
                </fileInput>
                <validation>Envoyer</validation>
            </form>
        </signInDeliveryman>
        <clientSpace>
            <pageTitle>Espace Client</pageTitle>
            <title>Espace Client</title>
            <downloadButton>Télécharger votre outil de création de colis</downloadButton>
            <deliverymanList>Liste des livreurs</deliverymanList>
            <trackingId>ID de suivi</trackingId>
            <destination>Destination</destination>
            <weight>Poids</weight>
            <deliveryType>Type de livraison</deliveryType>
            <status>État</status>
            <assignPackage>Assigner le colis</assignPackage>
            <successAssignement>Colis assigné avec succès</successAssignement>
            <errorAssignement>Erreur lors de l'assignement du colis</errorAssignement>
            <billButton>Générer ma facture</billButton>
        </clientSpace>
        <deliverymanSpace>
            <pageTitle>Espace Livreur</pageTitle>
            <title>Espace Livreur</title>
        </deliverymanSpace>
    </pagesClientSide>
    <pagesAdminSide>
        <staffAccount>
            <pageTitle>Compte staff</pageTitle>
            <title>Espace Staff</title>
        </staffAccount>
        <clientAccountsManagement>
            <pageTitle>Gestion des comptes client</pageTitle>
            <title>Gestion des comptes client</title>
            <table>
                <th1>Nom de l'entreprise</th1>
                <th2>Actions</th2>
                <modal>
                    <title>Suppresion de compte</title>
                    <text>Etes-vous sûr de vouloir supprimer ce compte ?</text>
                    <cancelButton>Annuler</cancelButton>
                    <confirmButton>Confirmer</confirmButton>
                </modal>
            </table>
        </clientAccountsManagement>
        <clientAccountManagement>
            <pageTitle>Gestion du compte client</pageTitle>
            <title>Gestion du compte</title>
            <card>
                <username>Nom de l'entreprise : </username>
                <mail>Mail : </mail>
                <billingAddress>Adresse de facturation : </billingAddress>
                <siretNumber>Numéro de SIRET : </siretNumber>
                <motives>Motivations : </motives>
            </card>
        </clientAccountManagement>
        <deliverymanAccountsManagement>
            <pageTitle>Gestion des comptes livreur</pageTitle>
            <title>Gestion des comptes livreur</title>
            <table>
                <th1>Nom d'utilisateur</th1>
                <th2>Actions</th2>
                <modal>
                    <title>Suppresion de compte</title>
                    <text>Etes-vous sûr de vouloir supprimer ce compte ?</text>
                    <cancelButton>Annuler</cancelButton>
                    <confirmButton>Confirmer</confirmButton>
                </modal>
            </table>
        </deliverymanAccountsManagement>
        <deliverymanAccountManagement>
            <pageTitle>Gestion du compte livreur</pageTitle>
            <title>Gestion du compte</title>
            <card>
                <username>Nom d'utilisateur : </username>
                <mail>Mail : </mail>
                <deliveryDistance>Distance de livraison : </deliveryDistance>
                <kilometersNumber>Nombre de kilomètres : </kilometersNumber>
                <packagesNumber>Nombre de colis : </packagesNumber>
                <IBAN>IBAN : </IBAN>
                <vehicleType>Type de véhicule : </vehicleType>
                <vehicleBrand>Marque du véhicule : </vehicleBrand>
                <vehicleCapacity>Capacité du véhicule : </vehicleCapacity>
            </card>
        </deliverymanAccountManagement>
        <applicationManagement>
            <pageTitle>Gestion des candidatures</pageTitle>
            <title>Gestion des candidatures</title>
            <subtitle1>Clients</subtitle1>
            <subtitle2>Livreurs</subtitle2>
            <table>
                <th1>Nom d'utilisateur</th1>
                <th2>Actions</th2>
                <modal>
                    <title>Suppresion de compte</title>
                    <text>Etes-vous sûr de vouloir supprimer ce compte ?</text>
                    <cancelButton>Annuler</cancelButton>
                    <confirmButton>Confirmer</confirmButton>
                </modal>
            </table>
        </applicationManagement>
    </pagesAdminSide>
</site>
XML;
?>