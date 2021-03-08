#include <stdio.h>
#include <stdlib.h>
#include <windows.h>
#include <dirent.h>

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
        printf(directory);
        FILE* file = NULL;
        strcpy(fileName,directory);
        strcat(fileName,dir->d_name);
        //printf("\n%s",fileName);
        file = fopen(fileName, "r");
        if(file==NULL){
            printf("\nOuverture fichier impossible");
        }
        char *table[5][25];
        char line[50];
        fgets(line,60,file);
        sscanf(line,"%s ;%s ;%s ;%s",table[0],table[1],table[2],table[3]);
        fclose(file);
        printf("\n%s\n",table[0]);
        printf("%s\n",table[1]);
        printf("%s\n",table[2]);
        printf("%s\n",table[3]);
        strcpy(fileNameBAK,"BAK\\");
        strcat(fileNameBAK,dir->d_name);
        rename(fileName,fileNameBAK);
        dir = readdir(rep);
    }
    Sleep(300000);
}
}
