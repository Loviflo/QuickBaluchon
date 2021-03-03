#include <stdlib.h>
#include <stdio.h>
#include <gtk/gtk.h>
#define EXEMPLE_1 0
#define EXEMPLE_2 1
#define EXEMPLE_3 2


void OnDestroy(GtkWidget *pWidget, gpointer pData);
void AddBtn(GtkWidget *pWindow, gint iExemple);
int page2(int argc,char **argv);
void on_activate_entry(GtkWidget *pEntry, gpointer data);
void on_copier_button(GtkWidget *pButton, gpointer data);




int main(int argc,char **argv)
{
    /* Déclaration du widget */
    GtkWidget *pWindow;
    GtkWidget *pLabel;
    GtkWidget *pQuitBtn;
    GtkWidget *pBtn2;
    GtkWidget *pTable;
    GtkWidget *pEntry;
    GtkWidget *pButton;
    GtkWidget *pLabel2;
    GtkWidget *Grid;
    gchar* sUtf8;

    gtk_init(&argc,&argv);

    FILE* file = NULL;
    int age = 0;
    file = fopen("file.csv", "w+");

    if (file != NULL)
    {
        /* On utilise les balises */
        sUtf8 = g_locale_to_utf8("<span face=\"Courier New\" foreground=\"#e07a26\"><b>OK</b></span>",
        -1, NULL, NULL, NULL);
        printf("Quel age avez-vous ? ");
        scanf("%d", &age);
        // On l'écrit dans le fichier
        fprintf(file, "Le Monsieur qui utilise le programme, il a %d ans;nnnnn;aaaa", age);
        fclose(file); // On ferme le fichier qui a été ouvert
    }
    else
    {
        /* On utilise les balises */
        sUtf8 = g_locale_to_utf8("<span face=\"Courier New\" foreground=\"#e07a26\"><b>KO</b></span>",
        -1, NULL, NULL, NULL);
    }


    /* Création de la fenêtre */
    pWindow = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    /* Creation du label avec g_locale_to_utf8 */
    pLabel=gtk_label_new(NULL);

    gtk_label_set_markup(GTK_LABEL(pLabel), sUtf8);
    g_free(sUtf8);
    /* On centre le texte */
    gtk_label_set_justify(GTK_LABEL(pLabel), GTK_JUSTIFY_CENTER);
    /* Insertion du bouton */
    /* Creation et insertion de la table 3 lignes 2 colonnes */
    pTable=gtk_table_new(10,2,TRUE);
    gtk_container_add(GTK_CONTAINER(pWindow), GTK_WIDGET(pTable));
    pQuitBtn = gtk_button_new_with_mnemonic("_Quitter");
    pBtn2 = gtk_button_new_with_mnemonic("_Ouvrir");
    gtk_table_attach(GTK_TABLE(pTable), pQuitBtn,
    0, 1, 0, 1,
    GTK_EXPAND | GTK_FILL, GTK_EXPAND | GTK_FILL,
    1, 0);
    gtk_table_attach(GTK_TABLE(pTable), pBtn2,
    1, 2, 0, 1,
    GTK_EXPAND | GTK_FILL, GTK_EXPAND | GTK_FILL,
    1, 0);
    /* Connexion du signal "clicked" du bouton */
    g_signal_connect(G_OBJECT(pQuitBtn), "clicked", G_CALLBACK(page2), NULL);
    /* Insertion du bouton dans la fenêtre */
    gtk_container_add(GTK_CONTAINER(pWindow), pQuitBtn);
    gtk_container_add(GTK_CONTAINER(pWindow), pBtn2);
    /* Creation du GtkEntry */
    pEntry = gtk_entry_new();
    pButton = gtk_button_new_with_label("Entrer");
    pLabel = gtk_label_new(NULL);
    gtk_table_attach(GTK_TABLE(pTable), pEntry,
    0, 2, 1, 2,
    GTK_EXPAND | GTK_FILL, GTK_EXPAND | GTK_FILL,
    1, 0);
    gtk_table_attach(GTK_TABLE(pTable), pButton,
    0, 2, 2, 3,
    GTK_EXPAND | GTK_FILL, GTK_EXPAND | GTK_FILL,
    1, 0);
    /*gtk_table_attach(GTK_TABLE(pTable), pLabel2,
    0, 2, 3, 4,
    GTK_EXPAND | GTK_FILL, GTK_EXPAND | GTK_FILL,
    1, 0);*/
    gtk_container_add(GTK_CONTAINER(pWindow), pEntry);
    gtk_container_add(GTK_CONTAINER(pWindow), pButton);
    //gtk_container_add(GTK_CONTAINER(pWindow), pLabel2);
    /* Connexion du signal "activate" du GtkEntry */
    //g_signal_connect(G_OBJECT(pEntry), "activate", G_CALLBACK(on_activate_entry), (GtkWidget*) pLabel2);

    /* Connexion du signal "clicked" du GtkButton */
    /* La donnée supplémentaire est la GtkVBox pVBox */
    //g_signal_connect(G_OBJECT(pButton), "clicked", G_CALLBACK(on_copier_button), (GtkWidget*) pTable);
    /* Définition de la position */
    gtk_window_set_position(GTK_WINDOW(pWindow), GTK_WIN_POS_CENTER);
    /* Définition de la taille de la fenêtre */
    gtk_window_set_default_size (GTK_WINDOW (pWindow), 800, 600);
    /* Titre de la fenêtre */
    gtk_window_set_title (GTK_WINDOW (pWindow), "SPS");
    /* Connexion du signal "destroy" */
    g_signal_connect(G_OBJECT(pWindow), "destroy", G_CALLBACK(OnDestroy), NULL);
    /* On ajoute le label a l'intérieur de la fenêtre */
    gtk_container_add(GTK_CONTAINER(pWindow), pLabel);
    /* Affichage de la fenêtre */
    gtk_widget_show_all(pWindow);
    /* Démarrage de la boucle évènementielle */
    gtk_main();

    return EXIT_SUCCESS;
}

void OnDestroy(GtkWidget *pWidget, gpointer pData)
{
    /* Arrêt de la boucle évènementielle */
    gtk_main_quit();
}

int page2(int argc,char **argv)
{
    /* Déclaration du widget */
    GtkWidget *pWindow;
    GtkWidget *pLabel;
    GtkWidget *pQuitBtn;
    gchar* sUtf8;

    gtk_init(&argc,&argv);

    /* Création de la fenêtre */
    pWindow = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    /* Creation du label avec g_locale_to_utf8 */
    pLabel=gtk_label_new(NULL);
    /* On utilise les balises */
    sUtf8 = g_locale_to_utf8("<span face=\"Courier New\" foreground=\"#e07a26\"><b>Page 2</b></span>",
        -1, NULL, NULL, NULL);
    gtk_label_set_markup(GTK_LABEL(pLabel), sUtf8);
    g_free(sUtf8);
    /* On centre le texte */
    gtk_label_set_justify(GTK_LABEL(pLabel), GTK_JUSTIFY_CENTER);
    /* Définition de la position */
    gtk_window_set_position(GTK_WINDOW(pWindow), GTK_WIN_POS_CENTER);
    /* Définition de la taille de la fenêtre */
    gtk_window_set_default_size(GTK_WINDOW(pWindow), 800, 600);
    /* Titre de la fenêtre */
    gtk_window_set_title(GTK_WINDOW(pWindow), "Page 2 - SPS");
    /* Connexion du signal "destroy" */
    g_signal_connect(G_OBJECT(pWindow), "destroy", G_CALLBACK(OnDestroy), NULL);
    /* On ajoute le label a l'intérieur de la fenêtre */
    gtk_container_add(GTK_CONTAINER(pWindow), pLabel);
    /* Affichage de la fenêtre */
    gtk_widget_show_all(pWindow);
    /* Démarrage de la boucle évènementielle */
    gtk_main();

    return EXIT_SUCCESS;
}

/* Fonction callback execute lors du signal "activate" */
void on_activate_entry(GtkWidget *pEntry, gpointer data)
{
    const gchar *sText;

    /* Recuperation du texte contenu dans le GtkEntry */
    sText = gtk_entry_get_text(GTK_ENTRY(pEntry));

    /* Modification du texte contenu dans le GtkLabel */
    gtk_label_set_text(GTK_LABEL((GtkWidget*)data), sText);
}

/* Fonction callback executee lors du signal "clicked" */
void on_copier_button(GtkWidget *pButton, gpointer data)
{
    GtkWidget *pTempEntry;
    GtkWidget *pTempLabel;
    GList *pList;
    const gchar *sText;

    /* Récupération de la liste des éléments que contient la GtkVBox */
    pList = gtk_container_get_children(GTK_CONTAINER((GtkWidget*)data));

    /* Le premier élément est le GtkEntry */
    pTempEntry = GTK_WIDGET(pList->data);

    /* Passage à l élément suivant : le GtkButton */
    pList = g_list_next(pList);

    /* Passage à l élément suivant : le GtkLabel */
    pList = g_list_next(pList);

    /* Cet élément est le GtkLabel */
    pTempLabel = GTK_WIDGET(pList->data);

    /* Recuperation du texte contenu dans le GtkEntry */
    sText = gtk_entry_get_text(GTK_ENTRY(pTempEntry));

    /* Modification du texte contenu dans le GtkLabel */
    gtk_label_set_text(GTK_LABEL(pTempLabel), sText);

    /* Libération de la mémoire utilisée par la liste */
    g_list_free(pList);
}
