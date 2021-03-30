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
            <item3>Item 3</item3>
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
    </pagesClientSide>
    <pagesAdminSide>
        <staffAccount>
            <pageTitle>Compte staff</pageTitle>
            <title>Espace Staff</title>
        </staffAccount>
    </pagesAdminSide>
</site>
XML;
?>