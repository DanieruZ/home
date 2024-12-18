#ifndef PERSON_H_INCLUDED
#define PERSON_H_INCLUDED

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdbool.h>

#define PERSON_FILE "person_file.dat"
#define ESC 27
#define SIZE 50
#define DNI 10

typedef struct {
  int id;
  char firstname[SIZE];
  char lastname[SIZE];
  char dni[DNI];
  char email[SIZE];
  bool isActive;
} Person;

Person addPerson();
void showPerson(Person person);
void showHeadersTable();
Person updatePerson(Person person);
int updateMenu();

#endif // PERSON_H_INCLUDED
