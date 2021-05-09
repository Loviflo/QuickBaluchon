#include <stdio.h>
#include <stdlib.h>
#include <windows.h>
#include <dirent.h>
#include <winsock.h>
#include <MYSQL/mysql.h>


int main()
{
struct dirent *dir;
char directory[50] = "files\\";
char fileName[50];
char fileNameBAK[50];
while(1==1){
    DIR* rep = opendir("files");
    dir = readdir(rep);
    dir = readdir(rep);
    dir = readdir(rep);

    while(dir) {
        FILE* file = NULL;
        strcpy(fileName,directory);
        strcat(fileName,dir->d_name);
        //printf("\n%s",fileName);
        file = fopen(fileName, "r");
        if(file==NULL){
            printf("\nOuverture fichier impossible");
        }
        char table[9][50];
        char line[255];
        fgets(line,255,file);
        int i = 0;
        char * strToken = strtok ( line, ";" );
        //sscanf(line,"%s;%s;%s;%s;%s;%s",table[0],table[1],table[2],table[3], table[4], table[5]);
        //printf("\n%s\n",table[0]);
        //printf("%s\n",table[1]);
        //printf("%s\n",table[2]);
        //printf("%s\n",table[3]);
        //printf("%s\n",table[4]);
        //printf("%s\n",table[5]);
        while ( strToken != NULL ) {
            strcpy(table[i],strToken);
            printf("%s\n",table[i]);
            i++;
            // On demande le token suivant.
            strToken = strtok ( NULL, ";" );
        }
        int longueur = strlen(table[3]);
        table[3][longueur-1] = '\0';
        fclose(file);

        MYSQL *mysql = mysql_init(NULL);
        mysql_options(mysql,MYSQL_READ_DEFAULT_GROUP,"option");
        MYSQL_RES *result = NULL;
        MYSQL_ROW row;

        if(mysql_real_connect(mysql,"localhost","root","root","quickbaluchon",3307,NULL,0)){
            char req[1500] = "";
            sprintf(req, "SELECT id_client FROM client WHERE company_name = '%s'",table[1]);
            printf(req);
            mysql_query(mysql, req);
            result = mysql_use_result(mysql);
            //num_champs = mysql_num_fields(result);
            printf("\n");
            row = mysql_fetch_row(result);
            strcpy(table[1],row[0]);
            mysql_free_result(result);

            sprintf(req, "INSERT INTO package (destination,additional_info,weight,delivery_type,tracking_id,id_client) VALUES('%s','%s','%s','%s','%s','%s')",table[0],table[2],table[3],table[4],table[5],table[1]);
            printf(req);
            mysql_query(mysql, req);
            printf("\nOK");
            mysql_close(mysql);
        } else {
            printf("\nErreur");
        }
        strcpy(fileNameBAK,"BAK\\");
        strcat(fileNameBAK,dir->d_name);
        rename(fileName,fileNameBAK);
        dir = readdir(rep);
    }
    Sleep(300000);
}
}
