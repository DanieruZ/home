#ifndef PERSONFILE_H_INCLUDED
#define PERSONFILE_H_INCLUDED

#include "person.h"

int getLastId();
void savePersonToFile(Person person);
void addPersonToFile();
void showPersonFile(int option);
int getFileLength();
bool existPersonDNI(const char* dni);
Person getPersonByDNI(const char* dni);
Person updatePersonToFile(Person person);
void deletePersonByDNI(const char* dni);

#endif // PERSONFILE_H_INCLUDED
