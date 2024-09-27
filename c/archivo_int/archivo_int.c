#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <conio.h>
#include <windows.h>
#include "archivo_int.h"

#define ESC 27

// Agrega nuevos datos.
int agregarDato() {
  int dato = 0;

  printf("Ingresar un numero entero: ");
  fflush(stdin);
  scanf("%d", &dato);
  return dato;
}


// Guarda un dato en un archivo.
void guardarEnArchivo(const char* nombreArchivo, int dato) {
  FILE* archivo = fopen(nombreArchivo, "ab");

  if(archivo) { // if(archivo) != NULL
    fwrite(&dato, sizeof(int), 1, archivo);
    fclose(archivo);
  }
  else {
    printf("Error: No se pudo abrir el archivo para guardar el dato.\n");
  }
}


// Carga y guarda nuevos datos a un archivo.
void agregarEnArchivo(const char* nombreArchivo) {
  int dato = 0;
  char opcion;

  do {
    dato = agregarDato();
    guardarEnArchivo(nombreArchivo, dato);

    printf("\nDesea agregar otro numero?\n");
    printf("\nPresionar [ESC] para salir o [ENTER] para continuar.");
    opcion = getch();
    system("cls");

  } while(opcion != ESC);
}


// Muestra el contenido de un archivo.
void mostrarArchivo(const char* nombreArchivo) {  // char nombreArchivo[]
  FILE* archivo = fopen(nombreArchivo, "rb");
  int dato;

  if(archivo) {
    //    while(fread(&dato, sizeof(int), 1, archivo)) == 1) {
    while(fread(&dato, sizeof(int), 1, archivo) > 0) {
      printf("%d - ", dato);
    }
    fclose(archivo);
  }
}


// Inicializa un archivo, si el archivo tiene datos los elimina.
void inicializarArchivo(const char* nombreArchivo, int cantidad, ...) {
  FILE* archivo = fopen(nombreArchivo, "wb");
  va_list args;
  va_start(args, cantidad); // Inicializa la lista de argumentos

  for(int i = 0; i < cantidad; i++) {
    int dato = va_arg(args, int);  // Obtiene el siguiente argumento
    fwrite(&dato, sizeof(int), 1, archivo);
  }
  va_end(args); // Finaliza el uso de la lista de argumentos.
  fclose(archivo);
}


  // Calcula  el total de elementos en un archivo.
int contarArchivo(const char* nombreArchivo) {
  FILE* archivo = fopen(nombreArchivo, "rb");
  long contador = 0;

  if(archivo) {
    fseek(archivo, 0, SEEK_END);
    contador = ftell(archivo) / sizeof(int);
    fclose(archivo);
  }
  return contador;
}


// Busca un dato especifico en un archivo y retorna su posicion.
int buscarEnArchivo(const char* nombreArchivo, int datoBuscado) {
  FILE* archivo = fopen(nombreArchivo, "rb");
  int dato;
  long posicionEncontrado = -1;

  if(archivo) {
    while(fread(&dato, sizeof(int), 1, archivo) > 0) {
      if(dato == datoBuscado) {
        posicionEncontrado = ftell(archivo) - sizeof(int);
      }
    }
  }
   fclose(archivo);
   return posicionEncontrado;
}


// Verifica si existe un dato especifico en un archivo.
bool existeEnArchivo(const char* nombreArchivo, int datoBuscado) {
  FILE* archivo = fopen(nombreArchivo, "rb");
  int dato;
  bool existe = false;

  if(archivo) {
    while(fread(&dato, sizeof(int), 1, archivo) > 0) {
      if(dato == datoBuscado) {
        existe = true;
      }
    }
  }
   fclose(archivo);
   return existe;
}

/*
* Actualiza el valor de un dato en un archivo.
* Retorna (true) si actualizo con el nuevo valor o (false) si no.
*/
bool actualizarEnArchivo(const char* nombreArchivo, int datoBuscado, int nuevoValor) {
  FILE* archivo = fopen(nombreArchivo, "r+b");
  int dato;
  bool seActualizo = false;
  long posicionBuscado = buscarEnArchivo(nombreArchivo, datoBuscado);

  if(archivo) {
    if(posicionBuscado != -1) {
      fseek(archivo, posicionBuscado, SEEK_SET);
      fwrite(&nuevoValor, sizeof(int), 1, archivo);
      seActualizo = true;
    }
    fclose(archivo);
  }
  return seActualizo;
}

