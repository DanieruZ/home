#include "personFile.h"

// Gets the id of the last record added.
int getLastId() {
  Person person;
  int lastId = 0;
  FILE* file = fopen(PERSON_FILE, "rb");

  if(file) {
    fseek(file, (-1) * sizeof(Person), SEEK_END);

    if(fread(&person, sizeof(Person), 1, file) > 0) {
      lastId = person.id;
    }
  }
  return lastId;
}


// Save a record in the file.
void savePersonToFile(Person person) {
  FILE* file = fopen(PERSON_FILE, "ab");

  if(file) {
    fwrite(&person, sizeof(Person), 1, file);
    fclose(file);
  }
}


// Load and save records to file.
void addPersonToFile() {
  Person person;
  char option;

  do {
    person = addPerson();
    savePersonToFile(person);

    printf("\nPress [ESC] to exit or any key to continue.");
    option = getch();
    system("cls");

  } while(option != ESC);
}


// Shows the contents of the file.
void showPersonFile(int option) {
  Person person;
  FILE* file = fopen(PERSON_FILE, "rb");

  if(file) {
    showHeadersTable();

    while(fread(&person, sizeof(Person), 1, file) > 0) {
      if(option == 2) {
        showPerson(person);
      }
      if(option == 3 && person.isActive) {
        showPerson(person);
      }
      if(option == 4 && (!person.isActive)) {
        showPerson(person);
      }
    }
    fclose(file);
  }
}


// Counts the total number of records in the file.
int getFileLength() {
  Person person;
  long counter = 0;
  FILE* file = fopen(PERSON_FILE, "rb");

  if(file) {
    fseek(file, 0, SEEK_END);
    counter = ftell(file) / sizeof(person);
    fclose(file);
  }
  return counter;
}


// Evaluates if the searched dni exists in the file.
bool existPersonDNI(const char* dni) {
  Person person;
  bool exist = false;
  FILE* file = fopen(PERSON_FILE, "rb");

  if(file) {
    while(exist == false && fread(&person, sizeof(Person), 1 , file) > 0) {
      if(strcmp(person.dni, dni) == 0) {
        exist = true;
      }
    }
    fclose(file);
  }
  return exist;
}


// Search for a record by dni.
Person getPersonByDNI(const char* dni) {
  Person person;
  FILE* file = fopen(PERSON_FILE, "rb");

  if(file) {
    while(fread(&person, sizeof(Person), 1 , file) > 0) {
      if(strcmp(person.dni, dni) == 0) {
        return person;
      }
    }
    fclose(file);
  }
}


// Updates the data of a record in the file.
Person updatePersonToFile(Person person) {
  char option;
  FILE* file = fopen(PERSON_FILE, "rb+");

  if(file) {
    fseek(file, (person.id - 1) * sizeof(Person), SEEK_SET);
    person = updatePerson(person);
    fwrite(&person, sizeof(Person), 1, file);
    fclose(file);
  }
}


// Deletes a record searched by dni from the file.
void deletePersonByDNI(const char* dni) {
  Person person;
  FILE* file = fopen(PERSON_FILE, "rb");
  FILE* fileTmp = fopen(PERSON_TMP_FILE, "wb");

  if(file && fileTmp) {
    while(fread(&person, sizeof(Person), 1 , file) > 0) {
      if(strcmp(person.dni, dni) != 0) {
        fwrite(&person, sizeof(Person), 1, fileTmp);
      }
    }
    fclose(file);
    fclose(fileTmp);
  }
  remove(PERSON_FILE);
  rename(PERSON_TMP_FILE, PERSON_FILE);
}

