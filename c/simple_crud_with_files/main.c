#include "person.h"
#include "personFile.h"

int main() {

  Person person;
  char menuOption;
  char dni[SIZE];
  int totalRecords = 0;

  do {
    menuOption = menu();

    switch(menuOption) {
      case 1:
        system("cls");
        addPersonToFile();
        break;

      case 2:
        system("cls");
        printf("\t\t\t==========   PERSON LIST   ==========\n\n");
        showPersonFile(menuOption);
        totalRecords = getFileLength();
        printf("\n\nTotal records: %d \n", totalRecords);
        printf("\nPress any key to continue.");
        getch();
        break;

      case 3:
        system("cls");
        printf("\t\t\t==========   PERSON LIST   ==========\n\n");
        showPersonFile(menuOption);

        printf("\nPress any key to continue.");
        getch();
        break;

      case 4:
        system("cls");
        printf("\t\t\t==========   PERSON LIST   ==========\n\n");
        showPersonFile(menuOption);
        printf("\nPress any key to continue.");
        getch();
        break;

      case 5:
        do {
          system("cls");
          printf("Search person by DNI.\n");
          printf("Input DNI: ");
          fflush(stdin);
          gets(dni);

          if(!existPersonDNI(dni)) {
            printf("\nDNI not found.\n");
          }
          else {
            printf("\n");
            showHeadersTable();
            showPerson(getPersonByDNI(dni));
          }
          printf("\nPress [ESC] to exit or any key to continue.");
          menuOption = getch();

        } while(menuOption != ESC);
        break;

      case 6:
        system("cls");
        printf("Update person info.\n");
        printf("Input DNI: ");
        fflush(stdin);
        gets(dni);

        do {
          if(!existPersonDNI(dni)) {
            printf("\nDNI not found.\n");
            getch();
          }
          else {
            printf("\n");
            showHeadersTable();
            showPerson(getPersonByDNI(dni));
            updatePersonToFile(getPersonByDNI(dni));
          }
          system("cls");
          printf("\nDo you wish to continue updating?\n");
          printf("\nPress [ESC] to exit or any key to continue.");
          menuOption = getch();
          system("cls");

        } while(menuOption != ESC);
        break;

      case 7:
        do {
          system("cls");
          printf("Delete person.\n");
          printf("Input DNI: ");
          fflush(stdin);
          gets(dni);

          if(!existPersonDNI(dni)) {
            printf("\nDNI not found.\n");
          }
          else {
            deletePersonByDNI(dni);
            printf("\nRecord successfully deleted.\n");
          }
          printf("\nPress [ESC] to exit or any key to continue.");
          menuOption = getch();

        } while(menuOption != ESC);
        break;

      case 0:
        system("cls");
        printf("Ending program...");

        for(int i = 0; i < 5; i++) {
          Sleep(500);
          printf(".");
        }
        system("cls");
        break;

      default:
        system("cls");
        printf("Wrong option, try again.\n");
        printf("\nPress any key to continue.");
        getch();
    }

  } while(menuOption != 0);

  return 0;
}

// Shows main menu.
int menu() {
  int menuOption;
  system("color 6");
  system("cls");

  printf("\n\t_______________________________");
  printf("\n");
  printf("\n\t    MAIN MENU");
  printf("\n\t_______________________________\n");
  printf("\n\t   [1] Add new person.");
  printf("\n\t   [2] Person list.");
  printf("\n\t   [3] Available person list.");
  printf("\n\t   [4] Unavailable person list.");
  printf("\n\t   [5] Search person by DNI.");
  printf("\n\t   [6] Update person info.");
  printf("\n\t   [7] Delete person.");
  printf("\n\t_______________________________");
  printf("\n");
  printf("\n\t   [0] Exit program.");
  printf("\n\t_______________________________");
  printf("\n\n\t  Choose an option: ");

  scanf("%d", &menuOption);
  return menuOption;
}
