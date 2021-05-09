#include <gtk/gtk.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stddef.h>
#include <curl/curl.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <errno.h>
#include <time.h>
#include <stdbool.h>
#include <unistd.h>
#include <stdint.h>
#include "qrcodegen.h"

#define LOCAL_FILE "file.csv"
#define UPLOAD_FILE_AS "while-uploading.tmp"
#define REMOTE_URL "ftp://Test:1234@localhost/" UPLOAD_FILE_AS
//#define RENAME_FILE_TO  "fileTest.csv"

//unsigned long long id = 0;

static void doBasicDemo(unsigned long long);
static void printQr(const uint8_t qrcode[]);

struct _info
{
    GtkWidget *window;
    GtkWidget *window2;
    GtkWidget *grid;
    GtkWidget *label;
    GtkWidget *submit_button;
    GtkWidget *back_button;
    /// ***
    GtkWidget *typeBox_label;
    /// ***
    GtkWidget *address_entry;
    GtkWidget *address_label;
    /// ***
    GtkWidget *companyName_entry;
    GtkWidget *companyName_label;
    /// ***
    GtkWidget *additionalInfo_entry;
    GtkWidget *additionalInfo_label;
    /// ***
    GtkWidget *weight_entry;
    GtkWidget *weight_label;
    /// ***
    GtkWidget *delivery_radio1;
    GtkWidget *delivery_radio2;
} info;

static guint flag = 0;

void submit_clicked(GtkWidget *widget);
GtkWidget *createWindow(const gint width, const gint height);
void activate_callback(GtkWidget *widget);
void page1(int argc, char *argv[]);

int main(int argc, char *argv[])
{
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
    info.address_label = gtk_label_new("Adresse : ");
    /// ***
    info.companyName_label = gtk_label_new("Nom de l'entreprise : ");
    /// ***
    info.additionalInfo_label = gtk_label_new("Infos supplémentaires : ");
    /// ***
    info.weight_label = gtk_label_new("Poids du colis : ");
    /// ***
    info.typeBox_label = gtk_label_new("Type de livraison : ");
    /// ***
    info.address_entry = gtk_entry_new();
    info.companyName_entry = gtk_entry_new();
    info.additionalInfo_entry = gtk_entry_new();
    info.weight_entry = gtk_entry_new();
    info.delivery_radio1 = gtk_radio_button_new_with_label(NULL,"STANDARD");
    info.delivery_radio2 = gtk_radio_button_new_with_label_from_widget(GTK_RADIO_BUTTON(info.delivery_radio1),"EXPRESS");
    /// ***
    g_signal_connect_swapped(info.address_entry, "activate", G_CALLBACK(activate_callback), info.address_entry);
    g_signal_connect_swapped(info.companyName_entry, "activate", G_CALLBACK(activate_callback), info.companyName_entry);
    g_signal_connect_swapped(info.additionalInfo_entry, "activate", G_CALLBACK(activate_callback), info.additionalInfo_entry);
    g_signal_connect_swapped(info.weight_entry, "activate", G_CALLBACK(activate_callback), info.weight_entry);
    /// ***
    info.submit_button = gtk_button_new_with_mnemonic("_Submit");
    gtk_widget_set_name(info.submit_button, "Valider");
    /// ***
    g_signal_connect_swapped(info.submit_button, "clicked", G_CALLBACK(submit_clicked), info.address_entry);
    g_signal_connect_swapped(info.submit_button, "clicked", G_CALLBACK(submit_clicked), info.companyName_entry);
    g_signal_connect_swapped(info.submit_button, "clicked", G_CALLBACK(submit_clicked), info.additionalInfo_entry);
    g_signal_connect_swapped(info.submit_button, "clicked", G_CALLBACK(submit_clicked), info.weight_entry);
    /// ***
    info.back_button = gtk_button_new_with_mnemonic("_Submit");
    gtk_widget_set_name(info.back_button, "Valider");
    g_signal_connect(info.back_button,"clicked",G_CALLBACK(page1), NULL);
    /// ***
    gtk_grid_attach(GTK_GRID(info.grid), info.label, 0, 0, 2, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.address_label, 0, 3, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.companyName_label, 0, 4, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.additionalInfo_label, 0, 5, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.weight_label, 0, 6, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.typeBox_label, 0, 7, 1, 1);
    /// ***
    gtk_grid_attach(GTK_GRID(info.grid), info.address_entry, 1, 3, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.companyName_entry, 1, 4, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.additionalInfo_entry, 1, 5, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.weight_entry, 1, 6, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.delivery_radio1, 1, 7, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.delivery_radio2, 2, 7, 1, 1);
    gtk_grid_attach(GTK_GRID(info.grid), info.submit_button, 1, 10, 1, 1);
    //gtk_grid_attach(GTK_GRID(info.grid), info.back_button, 1, 12, 1, 1);
    /// ***
    gtk_widget_set_sensitive(info.companyName_entry, FALSE);
    gtk_widget_set_sensitive(info.additionalInfo_entry, FALSE);
    gtk_widget_set_sensitive(info.weight_entry, FALSE);
    gtk_widget_set_sensitive(info.delivery_radio1, FALSE);
    gtk_widget_set_sensitive(info.delivery_radio2, FALSE);
    gtk_widget_set_sensitive(info.submit_button, FALSE);
    /// ***
    gtk_container_add(GTK_CONTAINER(info.window), info.grid);
    gtk_widget_show_all(info.window);
    gtk_main();
}

void activate_callback(GtkWidget *widget)
{
    const gchar *text = gtk_entry_get_text(GTK_ENTRY(widget));

    if (strlen(text) >= 0)
    {
        switch (flag)
        {
        case 0:
            gtk_widget_set_sensitive(info.companyName_entry, TRUE);
            gtk_widget_set_sensitive(info.address_entry, FALSE);
            flag++;
            break;
        case 1:
            gtk_widget_set_sensitive(info.additionalInfo_entry, TRUE);
            gtk_widget_set_sensitive(info.companyName_entry, FALSE);
            flag++;
            break;
        case 2:
            gtk_widget_set_sensitive(info.weight_entry, TRUE);
            gtk_widget_set_sensitive(info.additionalInfo_entry, FALSE);
            flag++;
            break;
        case 3:
            gtk_widget_set_sensitive(info.submit_button, TRUE);            gtk_widget_set_sensitive(info.delivery_radio1, TRUE);            gtk_widget_set_sensitive(info.delivery_radio2, TRUE);
            gtk_widget_set_sensitive(info.weight_entry, FALSE);
            gtk_window_set_focus(GTK_WINDOW(info.window), info.submit_button);
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
    char *table[9][25];

    if (status < 4)
    {
        g_print("%s\n", gtk_entry_get_text(GTK_ENTRY(widget)));
        strcpy(table[status], gtk_entry_get_text(GTK_ENTRY(widget)));
        status++;
    }

    if (status == 4)
    {
        gtk_widget_set_sensitive(info.delivery_radio1, FALSE);
        gtk_widget_set_sensitive(info.delivery_radio2, FALSE);
        if (gtk_toggle_button_get_active (GTK_TOGGLE_BUTTON(info.delivery_radio1))==TRUE){
            strcpy(table[4],"STANDARD");
            printf(table[4]);
        } else if (gtk_toggle_button_get_active (GTK_TOGGLE_BUTTON(info.delivery_radio2))==TRUE) {
            strcpy(table[4],"EXPRESS");
            printf(table[4]);
        }
        //unsigned long id = time( NULL );
        unsigned long long id = rand() % 10000000001;
        char idText[50];
        sprintf(idText, "%llu", id);
        char renameFileTo[50] = "RNTO fileTest";
        strcat(renameFileTo, idText);
        strcat(renameFileTo, ".csv");

        FILE *file = NULL;
        file = fopen("file.csv", "w+");
        // On l'écrit dans le fichier
        fprintf(file, "%s ;%s ;%s ;%s ;%s ;%llu", table[0], table[1], table[2], table[3], table[4], id);
        fclose(file); // On ferme le fichier qui a été ouvert

        doBasicDemo(id);

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
    //gtk_window_set_default_size(GTK_WINDOW(window), width, height);
    gtk_container_set_border_width(GTK_CONTAINER(window), 50);
    return window;
}

void page1(int argc, char *argv[]){
    gtk_init(&argc, &argv);
    info.window2 = createWindow(800, 600);
    gtk_widget_show_all(info.window2);
   // gtk_window_close(info.window2);
}

static void doBasicDemo(unsigned long long id) {
    char textId[10];
	char text[255] = "http://localhost:81/QuickBaluchon/QuickBaluchon/packageDelivered.php?package_id=";
	sprintf(textId,"%llu%",id);
	strcat(text,textId);
    // User-supplied text
	enum qrcodegen_Ecc errCorLvl = qrcodegen_Ecc_LOW;  // Error correction level

	// Make and print the QR Code symbol
	uint8_t qrcode[qrcodegen_BUFFER_LEN_MAX];
	uint8_t tempBuffer[qrcodegen_BUFFER_LEN_MAX];
	bool ok = qrcodegen_encodeText(text, tempBuffer, qrcode, errCorLvl,
		qrcodegen_VERSION_MIN, qrcodegen_VERSION_MAX, qrcodegen_Mask_AUTO, true);
	if (ok)
		printQr(qrcode);
}

/*---- Utilities ----*/

// Prints the given QR Code to the console.
static void printQr(const uint8_t qrcode[]) {
	int size = qrcodegen_getSize(qrcode);
	int border = 4;
	FILE *qrcodeFile;
	qrcodeFile = fopen("qrcode.txt","wb");
	for (int y = -border; y < size + border; y++) {
		for (int x = -border; x < size + border; x++) {
			fputs((qrcodegen_getModule(qrcode, x, y) ? "██" : "  "), qrcodeFile);
		}
		fputs("\n", qrcodeFile);
	}
	fputs("\n", qrcodeFile);
	fclose(qrcodeFile);
	printf("\nLe QRCode est dans le dossier du programme\n");
}
