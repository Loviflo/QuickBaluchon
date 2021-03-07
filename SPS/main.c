#include <gtk/gtk.h>
#include <stdio.h>
#include <string.h>

#include <curl/curl.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <errno.h>
//#include <time.h>
#ifdef WIN32
#include <io.h>
#else
#include <unistd.h>
#endif

/* <DESC>
 * Performs an FTP upload and renames the file just after a successful
 * transfer.
 * </DESC>
 */

#define LOCAL_FILE      "file.csv"
#define UPLOAD_FILE_AS  "while-uploading.tmp"
#define REMOTE_URL      "ftp://Test:1234@localhost/"  UPLOAD_FILE_AS
#define RENAME_FILE_TO  "fileTest.csv"

static size_t read_callback(char *ptr, size_t size, size_t nmemb, void *stream)
{
  curl_off_t nread;
  /* in real-world cases, this would probably get this data differently
     as this fread() stuff is exactly what the library already would do
     by default internally */
  size_t retcode = fread(ptr, size, nmemb, stream);

  nread = (curl_off_t)retcode;

  fprintf(stderr, "*** We read %" CURL_FORMAT_CURL_OFF_T
          " bytes from file\n", nread);
  return retcode;
}

struct _info
{
    GtkWidget *window;
    GtkWidget *grid;
    GtkWidget *label;
    GtkWidget *submit_button;
    /// ***
    GtkWidget *name_entry;
    GtkWidget *name_label;
    /// ***
    GtkWidget *userName_entry;
    GtkWidget *userName_label;
    /// ***
    GtkWidget *password_entry;
    GtkWidget *password_label;
    /// ***
    GtkWidget *email_entry;
    GtkWidget *email_label;
} info;

static guint flag = 0;

gboolean zero_to_nine_keys_callback ( GtkWidget *widget, GdkEventKey *event );
void submit_clicked ( GtkWidget *widget );
void load_css ( void );
GtkWidget *createWindow ( const gint width, const gint height );
void activate_callback ( GtkWidget *widget );

int main ( int argc, char *argv[] )
{
    gtk_init ( &argc, &argv );
    load_css();
    info.window = createWindow ( 800, 600 );
    info.grid = gtk_grid_new();
    gtk_container_set_border_width ( GTK_CONTAINER ( info.grid ), 15 );
    gtk_widget_set_name ( info.grid, "myGrid" );
    gtk_grid_set_column_spacing ( GTK_GRID ( info.grid ), 5 );
    gtk_grid_set_row_spacing ( GTK_GRID ( info.grid ), 5 );
    /// ***
    info.label = gtk_label_new ( "Please enter your Information:" );
    gtk_widget_set_margin_top ( info.label, 25 );
    /// ***
    info.password_label = gtk_label_new ( "Password: " );
    /// ***
    info.name_label = gtk_label_new ( "Your Name: " );
    /// ***
    info.userName_label = gtk_label_new ( "Username: " );
    /// ***
    info.email_label = gtk_label_new ( "Email: " );
    /// ***
    info.name_entry     = gtk_entry_new();
    info.userName_entry = gtk_entry_new();
    info.password_entry = gtk_entry_new();
    info.email_entry    = gtk_entry_new();
    /// ***
    g_signal_connect_swapped ( info.name_entry,     "activate", G_CALLBACK ( activate_callback ), info.name_entry );
    g_signal_connect_swapped ( info.userName_entry, "activate", G_CALLBACK ( activate_callback ), info.userName_entry );
    g_signal_connect_swapped ( info.password_entry, "activate", G_CALLBACK ( activate_callback ), info.password_entry );
    g_signal_connect_swapped ( info.email_entry,    "activate", G_CALLBACK ( activate_callback ), info.email_entry );
    /// ***
    info.submit_button = gtk_button_new_with_mnemonic ( "_Submit" );
    gtk_widget_set_name ( info.submit_button, "myButton" );
    /// ***
    g_signal_connect_swapped ( info.submit_button, "clicked", G_CALLBACK ( submit_clicked ), info.name_entry );
    g_signal_connect_swapped ( info.submit_button, "clicked", G_CALLBACK ( submit_clicked ), info.userName_entry );
    g_signal_connect_swapped ( info.submit_button, "clicked", G_CALLBACK ( submit_clicked ), info.password_entry );
    g_signal_connect_swapped ( info.submit_button, "clicked", G_CALLBACK ( submit_clicked ), info.email_entry );
    /// ***
    gtk_grid_attach ( GTK_GRID ( info.grid ), info.label,           0, 0, 2, 1 );
    gtk_grid_attach ( GTK_GRID ( info.grid ), info.name_label,      0, 1, 1, 1 );
    gtk_grid_attach ( GTK_GRID ( info.grid ), info.userName_label,  0, 2, 1, 1 );
    gtk_grid_attach ( GTK_GRID ( info.grid ), info.password_label,  0, 3, 1, 1 );
    gtk_grid_attach ( GTK_GRID ( info.grid ), info.email_label,     0, 4, 1, 1 );
    /// ***
    gtk_grid_attach ( GTK_GRID ( info.grid ), info.name_entry,      1, 1, 1, 1 );
    gtk_grid_attach ( GTK_GRID ( info.grid ), info.userName_entry,  1, 2, 1, 1 );
    gtk_grid_attach ( GTK_GRID ( info.grid ), info.password_entry,  1, 3, 1, 1 );
    gtk_grid_attach ( GTK_GRID ( info.grid ), info.email_entry,     1, 4, 1, 1 );
    gtk_grid_attach ( GTK_GRID ( info.grid ), info.submit_button,   1, 6, 1, 1 );
    /// ***
    gtk_widget_set_sensitive ( info.userName_entry,  FALSE );
    gtk_widget_set_sensitive ( info.password_entry,  FALSE );
    gtk_widget_set_sensitive ( info.email_entry,     FALSE );
    gtk_widget_set_sensitive ( info.submit_button,   FALSE );
    /// ***
    gtk_container_add ( GTK_CONTAINER ( info.window ), info.grid );
    gtk_widget_show_all ( info.window );
    gtk_main();
}

void activate_callback ( GtkWidget *widget )
{
    const gchar *text = gtk_entry_get_text ( GTK_ENTRY ( widget ) );

    if ( strlen ( text ) > 0 )
    {
        switch ( flag )
        {
        case 0:
            gtk_widget_set_sensitive ( info.userName_entry, TRUE );
            gtk_widget_set_sensitive ( info.name_entry,  FALSE );
            flag++;
            break;

        case 1:
            gtk_widget_set_sensitive ( info.password_entry, TRUE );
            gtk_widget_set_sensitive ( info.userName_entry,  FALSE );
            flag++;
            break;

        case 2:
            gtk_widget_set_sensitive ( info.email_entry, TRUE );
            gtk_widget_set_sensitive ( info.password_entry,  FALSE );
            flag++;
            break;

        case 3:
            gtk_widget_set_sensitive ( info.submit_button, TRUE );
            gtk_window_set_focus ( GTK_WINDOW ( info.window ), info.submit_button );
            gtk_widget_set_sensitive ( info.email_entry,  FALSE );
            flag++;
            break;
        default:
            flag = 4;
        }
    }
}

void submit_clicked ( GtkWidget *widget )
{

    static guchar status = 0;
    char *table[5][25];
    /*
    unsigned long id = time( NULL );
    char idText[50];
    sprintf (idText, "%ld", id);
    char renameFileTo[50] = "RNTO fileTest";
    strcat(renameFileTo,idText);
    strcat(renameFileTo,".csv");
    */

    if ( status < 4  )
    {
        g_print ( "%s\n", gtk_entry_get_text ( GTK_ENTRY ( widget ) ) );
        strcpy(table[status],gtk_entry_get_text ( GTK_ENTRY ( widget ) ));
        status++;
    }

    if (status == 4) {
        FILE* file = NULL;
        file = fopen("file.csv", "w+");
        // On l'écrit dans le fichier
        fprintf(file, "%s ;%s ;%s ;%s", table[0],table[1],table[2],table[3]);
        fclose(file); // On ferme le fichier qui a été ouvert
        CURL *curl;
          CURLcode res;
  FILE *hd_src;
  struct stat file_info;
  curl_off_t fsize;

  struct curl_slist *headerlist = NULL;
  static const char buf_1 [] = "RNFR " UPLOAD_FILE_AS;
  static const char buf_2 [] = "RNTO " RENAME_FILE_TO;

  /* get the file size of the local file */
  if(stat(LOCAL_FILE, &file_info)) {
    printf("Couldn't open '%s': %s\n", LOCAL_FILE, strerror(errno));
    return 1;
  }
  fsize = (curl_off_t)file_info.st_size;

  printf("Local file size: %" CURL_FORMAT_CURL_OFF_T " bytes.\n", fsize);

  /* get a FILE * of the same file */
  hd_src = fopen(LOCAL_FILE, "rb");

  /* In windows, this will init the winsock stuff */
  curl_global_init(CURL_GLOBAL_ALL);

  /* get a curl handle */
  curl = curl_easy_init();
  if(curl) {
    /* build a list of commands to pass to libcurl */
    headerlist = curl_slist_append(headerlist, buf_1);
    headerlist = curl_slist_append(headerlist, buf_2);

    /* we want to use our own read function */
    curl_easy_setopt(curl, CURLOPT_READFUNCTION, read_callback);

    /* enable uploading */
    curl_easy_setopt(curl, CURLOPT_UPLOAD, 1L);

    /* specify target */
    curl_easy_setopt(curl, CURLOPT_URL, REMOTE_URL);

    /* pass in that last of FTP commands to run after the transfer */
    curl_easy_setopt(curl, CURLOPT_POSTQUOTE, headerlist);

    /* now specify which file to upload */
    curl_easy_setopt(curl, CURLOPT_READDATA, hd_src);

    /* Set the size of the file to upload (optional).  If you give a *_LARGE
       option you MUST make sure that the type of the passed-in argument is a
       curl_off_t. If you use CURLOPT_INFILESIZE (without _LARGE) you must
       make sure that to pass in a type 'long' argument. */
    curl_easy_setopt(curl, CURLOPT_INFILESIZE_LARGE,
                     (curl_off_t)fsize);

    /* Now run off and do what you've been told! */
    res = curl_easy_perform(curl);
    /* Check for errors */
    if(res != CURLE_OK)
      fprintf(stderr, "curl_easy_perform() failed: %s\n",
              curl_easy_strerror(res));

    /* clean up the FTP commands list */
    curl_slist_free_all(headerlist);

    /* always cleanup */
    curl_easy_cleanup(curl);
  }
  fclose(hd_src); /* close the local file */

  curl_global_cleanup();
    }
}

void load_css ( void )
{
    GtkCssProvider *provider;
    GdkDisplay     *display;
    GdkScreen      *screen;
    /// ***
    const gchar *css_style_file = "style.css";
    GFile *css_fp               = g_file_new_for_path ( css_style_file );
    GError *error               = 0;
    /// ***
    provider = gtk_css_provider_new ();
    display  = gdk_display_get_default ();
    screen   = gdk_display_get_default_screen ( display );
    /// ***
    gtk_style_context_add_provider_for_screen   ( screen, GTK_STYLE_PROVIDER ( provider ), GTK_STYLE_PROVIDER_PRIORITY_APPLICATION );
    gtk_css_provider_load_from_file             ( provider, css_fp, &error );
    /// ***
    g_object_unref ( provider );
}

GtkWidget *createWindow ( const gint width, const gint height )
{
    GtkWidget *window = gtk_window_new  ( GTK_WINDOW_TOPLEVEL );
    g_signal_connect        ( window, "destroy", gtk_main_quit, window );
    gtk_widget_set_events   ( window, GDK_KEY_PRESS_MASK );
    /// ***
    gtk_window_set_default_size     ( GTK_WINDOW ( window ), width, height );
    gtk_container_set_border_width  ( GTK_CONTAINER ( window ), 50 );
    return window;
}
