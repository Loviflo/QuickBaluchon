#include <gtk/gtk.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <curl/curl.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <errno.h>
//#include <time.h>
#include <unistd.h>

#define LOCAL_FILE "file.csv"
#define UPLOAD_FILE_AS "while-uploading.tmp"
#define REMOTE_URL "ftp://Test:1234@localhost/" UPLOAD_FILE_AS
//#define RENAME_FILE_TO  "fileTest.csv"

struct _info
{
    GtkWidget *window;
    GtkWidget *window2;
    GtkWidget *grid;
    GtkWidget *label;
    GtkWidget *submit_button;
    GtkWidget *back_button;
    /// ***
    GtkWidget *firstName_entry;
    GtkWidget *firstName_label;
    /// ***
    GtkWidget *lastName_entry;
    GtkWidget *lastName_label;
    /// ***
    GtkWidget *typeBox_entry;
    GtkWidget *typeBox_label;
    /// ***
    GtkWidget *QRCode_entry;
    GtkWidget *QRCode_label;
} info;

static guint flag = 0;

void submit_clicked(GtkWidget *widget);
GtkWidget *createWindow(const gint width, const gint height);
void activate_callback(GtkWidget *widget);
void page1(int argc, char *argv[]);

void page1(int argc, char *argv[]){
    gtk_init(&argc, &argv);
    info.window2 = createWindow(800, 600);
    gtk_widget_show_all(info.window2);
    gtk_main();
}

int main(int argc, char *argv[])
{
    page1(argc,*argv);

    srand(time(NULL));
    gtk_init(&argc, &argv);
    info.window = createWindow(800, 600);
    info.grid = gtk_grid_new();
    gtk_container_set_border_width(GTK_CONTAINER(info.grid), 15);
    gtk_widget_set_name(info.grid, "myGrid");
    gtk_grid_set_column_spacing(GTK_GRID(info.grid), 5);
    gtk_grid_set_row_spacing(GTK_GRID(info.grid), 5);
    /// ***
    info.label = gtk_label_new("Entrez les informations :");
    gtk_widget_set_margin_top(info.label, 25);
    /// ***
    info.firstName_label = gtk_label_new("Prenom : ");
    /// ***
    info.lastName_label = gtk_label_new("Nom : ");
    /// ***
    info.typeBox_label = gtk_label_new("Type de colis : ");
    /// ***
    info.QRCode_label = gtk_label_new("QRCode (Oui ou Non) : ");
    /// ***
    info.firstName_entry = gtk_entry_new();
    info.lastName_entry = gtk_entry_new();
    info.typeBox_entry = gtk_entry_new();
    info.QRCode_entry = gtk_entry_new();
    /// ***
    g_signal_connect_swapped(info.firstName_entry, "activate", G_CALLBACK(activate_callback), info.firstName_entry);
    g_signal_connect_swapped(info.lastName_entry, "activate", G_CALLBACK(activate_callback), info.lastName_entry);
    g_signal_connect_swapped(info.typeBox_entry, "activate", G_CALLBACK(activate_callback), info.typeBox_entry);
    g_signal_connect_swapped(info.QRCode_entry, "activate", G_CALLBACK(activate_callback), info.QRCode_entry);
    /// ***
    info.submit_button = gtk_button_new_with_mnemonic("_Submit");
    gtk_widget_set_name(info.submit_button, "Valider");
    /// ***
    g_signal_connect_swapped(info.submit_button, "clicked", G_CALLBACK(submit_clicked), info.firstName_entry);
    g_signal_connect_swapped(info.submit_button, "clicked", G_CALLBACK(submit_clicked), info.lastName_entry);
    g_signal_connect_swapped(info.submit_button, "clicked", G_CALLBACK(submit_clicked), info.typeBox_entry);
    g_signal_connect_swapped(info.submit_button, "clicked", G_CALLBACK(submit_clicked), info.QRCode_entry);
    /// ***
    info.back_button = gtk_button_new_with_mnemonic("_Submit");
    gtk_widget_set_name(info.back_button, "Valider");
    gtk_signal_connect(info.back_button,"clicked",G_CALLBACK(page1), NULL);
    /// ***
    gtk_grid_attach(GTK_GRID(info.grid), info.label, 0, 0, 2, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.firstName_label, 0, 1, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.lastName_label, 0, 2, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.typeBox_label, 0, 3, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.QRCode_label, 0, 4, 1, 1);
    /// ***
    gtk_grid_attach(GTK_GRID(info.grid), info.firstName_entry, 1, 1, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.lastName_entry, 1, 2, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.typeBox_entry, 1, 3, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.QRCode_entry, 1, 4, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.submit_button, 1, 6, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.back_button, 1, 8, 1, 1);
    /// ***
    gtk_widget_set_sensitive(info.lastName_entry, FALSE);
    gtk_widget_set_sensitive(info.typeBox_entry, FALSE);
    gtk_widget_set_sensitive(info.QRCode_entry, FALSE);
    gtk_widget_set_sensitive(info.submit_button, FALSE);
    /// ***
    gtk_container_add(GTK_CONTAINER(info.window), info.grid);
    gtk_widget_show_all(info.window);
    gtk_main();
}

void activate_callback(GtkWidget *widget)
{
    const gchar *text = gtk_entry_get_text(GTK_ENTRY(widget));

    if (strlen(text) > 0)
    {
        switch (flag)
        {
        case 0:
            gtk_widget_set_sensitive(info.lastName_entry, TRUE);
            gtk_widget_set_sensitive(info.firstName_entry, FALSE);
            flag++;
            break;
        case 1:
            gtk_widget_set_sensitive(info.typeBox_entry, TRUE);
            gtk_widget_set_sensitive(info.lastName_entry, FALSE);
            flag++;
            break;
        case 2:
            gtk_widget_set_sensitive(info.QRCode_entry, TRUE);
            gtk_widget_set_sensitive(info.typeBox_entry, FALSE);
            flag++;
            break;
        case 3:
            gtk_widget_set_sensitive(info.submit_button, TRUE);
            gtk_window_set_focus(GTK_WINDOW(info.window), info.submit_button);
            gtk_widget_set_sensitive(info.QRCode_entry, FALSE);
            flag++;
            break;
        default:
            flag = 4;
        }
    }
}

void submit_clicked(GtkWidget *widget)
{
    static guchar status = 0;
    char *table[5][25];

    if (status < 4)
    {
        g_print("%s\n", gtk_entry_get_text(GTK_ENTRY(widget)));
        strcpy(table[status], gtk_entry_get_text(GTK_ENTRY(widget)));
        status++;
    }

    if (status == 4)
    {
        //unsigned long id = time( NULL );
        unsigned long long id = rand() % 100000001;
        char idText[50];
        sprintf(idText, "%llu", id);
        char renameFileTo[50] = "RNTO fileTest";
        strcat(renameFileTo, idText);
        strcat(renameFileTo, ".csv");

        FILE *file = NULL;
        file = fopen("file.csv", "w+");
        // On l'écrit dans le fichier
        fprintf(file, "%s ;%s ;%s ;%s", table[0], table[1], table[2], table[3]);
        fclose(file); // On ferme le fichier qui a été ouvert
        CURL *curl;
        CURLcode res;
        FILE *file_src;
        struct stat file_info;
        curl_off_t file_size;

        struct curl_slist *headerlist = NULL;
        static const char buf_1[] = "RNFR " UPLOAD_FILE_AS;
        //static const char buf_2 [] = "RNTO " RENAME_FILE_TO;

        /* get the file size of the local file */
        if (stat(LOCAL_FILE, &file_info))
        {
            printf("Couldn't open '%s': %s\n", LOCAL_FILE, strerror(errno));
            return 1;
        }
        file_size = (curl_off_t)file_info.st_size;

        printf("Local file size: %" CURL_FORMAT_CURL_OFF_T " bytes.\n", file_size);

        /* get a FILE * of the same file */
        file_src = fopen(LOCAL_FILE, "rb");

        /* In windows, this will init the winsock stuff */
        curl_global_init(CURL_GLOBAL_ALL);

        /* get a curl handle */
        curl = curl_easy_init();
        if (curl)
        {
            /* build a list of commands to pass to libcurl */
            headerlist = curl_slist_append(headerlist, buf_1);
            headerlist = curl_slist_append(headerlist, renameFileTo);

            /* we want to use our own read function */
            //curl_easy_setopt(curl, CURLOPT_READFUNCTION, read_callback);

            /* enable uploading */
            curl_easy_setopt(curl, CURLOPT_UPLOAD, 1L);

            /* specify target */
            curl_easy_setopt(curl, CURLOPT_URL, REMOTE_URL);

            /* pass in that last of FTP commands to run after the transfer */
            curl_easy_setopt(curl, CURLOPT_POSTQUOTE, headerlist);

            /* now specify which file to upload */
            curl_easy_setopt(curl, CURLOPT_READDATA, file_src);

            /* Set the size of the file to upload (optional).  If you give a *_LARGE
            option you MUST make sure that the type of the passed-in argument is a
            curl_off_t. If you use CURLOPT_INFILESIZE (without _LARGE) you must
            make sure that to pass in a type 'long' argument. */
            curl_easy_setopt(curl, CURLOPT_INFILESIZE_LARGE,
                             (curl_off_t)file_size);

            /* Now run off and do what you've been told! */
            res = curl_easy_perform(curl);
            /* Check for errors */
            if (res != CURLE_OK)
                fprintf(stderr, "curl_easy_perform() failed: %s\n",
                        curl_easy_strerror(res));

            /* clean up the FTP commands list */
            curl_slist_free_all(headerlist);

            /* always cleanup */
            curl_easy_cleanup(curl);
        }
        fclose(file_src); /* close the local file */

        curl_global_cleanup();
        status++;
    }
}

GtkWidget *createWindow(const gint width, const gint height)
{
    GtkWidget *window = gtk_window_new(GTK_WINDOW_TOPLEVEL);
    g_signal_connect(window, "destroy", gtk_main_quit, window);
    gtk_widget_set_events(window, GDK_KEY_PRESS_MASK);
    /// ***
    gtk_window_set_default_size(GTK_WINDOW(window), width, height);
    gtk_container_set_border_width(GTK_CONTAINER(window), 50);
    return window;
}
