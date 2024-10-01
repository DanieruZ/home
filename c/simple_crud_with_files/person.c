#include "person.h"

// Creates a person.
Person addPerson() {
  Person person;
  person.id = getLastId() + 1;
  char dni[SIZE];

  printf("Firstname: ");
  fflush(stdin);
  gets(person.firstname);

  printf("Lastname: ");
  fflush(stdin);
  gets(person.lastname);

  do {
    printf("DNI: ");
    fflush(stdin);
    gets(person.dni);

    if(existPersonDNI(person.dni)) {
      printf("\nDNI already exist.\n\n");
    }

  } while(existPersonDNI(person.dni));

  printf("Email: ");
  fflush(stdin);
  gets(person.email);

  person.isActive = true;

  return person;
}


// Shows the table headers.
void showHeadersTable() {
  printf("+-----+--------------+--------------+--------------+----------------------+--------+\n");
  printf("| %-3s | %-12s | %-12s | %-12s | %-20s | %-6s |\n",
  "ID", "Firstname", "Lastname", "DNI", "Email", "Active");
  printf("+-----+--------------+--------------+--------------+----------------------+--------+\n");
}


// Shows a person.
void showPerson(Person person) {
  printf("| %-3d | %-12.12s | %-12.12s | %-12.12s | %-20.20s |",
    person.id,
    person.firstname,
    person.lastname,
    person.dni,
    person.email);
    person.isActive ? printf("   OK   |\n") : printf("   NO   |\n");

  printf("+-----+--------------+--------------+--------------+----------------------+--------+\n");
}


// Update data in a record.
Person updatePerson(Person person) {
  Person tmp;
  int updateOption;
  int option;

  do {
    int updateOption = updateMenu();
    system("color 6");
    system("cls");

    switch(updateOption) {
      case 1:
        system("cls");
        printf("\nFirstname: ");
        fflush(stdin);
        gets(tmp.firstname);
        strcpy(person.firstname, tmp.firstname);
        break;

      case 2:
        system("cls");
        printf("Lastname: ");
        fflush(stdin);
        gets(tmp.lastname);
        strcpy(person.lastname, tmp.lastname);
        break;

      case 3:
        system("cls");
        printf("DNI: ");
        fflush(stdin);
        gets(tmp.dni);
        strcpy(person.dni, tmp.dni);
        break;

      case 4:
        system("cls");
        printf("Email: ");
        fflush(stdin);
        gets(tmp.email);
        strcpy(person.email, tmp.email);
        break;

      case 5:
        system("cls");
        printf("Active: \n\n");
        printf("[1] OK.\n");
        printf("[2] NO.\n\n");
        printf("Choose an option: ");
        fflush(stdin);
        scanf("%d", &option);
        person.isActive = (option == 1 ? (option == 2 ? false : true) : false);
        break;

      case 0:
        system("cls");
        return person;
        main();
        break;

      default:
        system("cls");
        printf("Wrong option, try again.\n");
        printf("\nPress any key to continue.");
        getch();
    }
  } while(updateOption != 0);
}


// Shows update menu.
int updateMenu() {
  int updateOption;
  system("color 6");

  printf("\n\t_______________________________");
  printf("\n");
  printf("\n\t    UPDATE MENU");
  printf("\n\t_______________________________\n");
  printf("\n\t   [1] Change firstname.");
  printf("\n\t   [2] Change lastname.");
  printf("\n\t   [3] Change DNI.");
  printf("\n\t   [4] Change email.");
  printf("\n\t   [5] Change availability.");
  printf("\n\t_______________________________");
  printf("\n");
  printf("\n\t   [0] Finish update.");
  printf("\n\t_______________________________");
  printf("\n\n\t  Choose an option: ");

  scanf("%d", &updateOption);
  return updateOption;
}
