#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <conio.h>
#include <windows.h>
#include "archivo_int.h"

#define ARCHIVO_NUMEROS "archivo_numeros.dat"
#define ARCHIVO_PARES "archivo_pares.dat"
#define ARCHIVO_IMPARES "archivo_impares.dat"
#define ESC 27

int main() {

/*----------------------------------------*/

  /*** PRUEBA 1 ***/
/*
  // Agrega nuevos datos a un archivo.
  agregarEnArchivo(ARCHIVO_NUMEROS);

  // Muestra el contenido de un archivo.
  printf("Archivo Numeros:\n");
  mostrarArchivo(ARCHIVO_NUMEROS);
*/

/*----------------------------------------*/

  /*** PRUEBA 2 ***/
/*
  // Inicializa un archivo, si el archivo tiene datos los elimina.
  inicializarArchivo(ARCHIVO_PARES,10 , 28,29,30,16,44,62,70,18,56,36);

  // Muestra el contenido de un archivo.
  printf("Archivo Pares:\n");
  mostrarArchivo(ARCHIVO_PARES);

  // Calcula  el total de elementos en un archivo.
  int totalPares = contarArchivo(ARCHIVO_PARES);

  // Muestra el total de datos en un archivo.
  printf("\n\nTotal Pares: %d \n", totalPares);

  // Busca un dato especifico en un archivo.
  int buscado = 44;

  int posicionEncontrado = buscarEnArchivo(ARCHIVO_PARES, buscado);

  // Muestra el dato buscado y su posicion.
  if(posicionEncontrado != -1) {
    printf("Encontrado: %d en la posicion: %d\n", buscado, posicionEncontrado);
  }
  else {
    printf("El dato %d no fue encontrado en el archivo.\n", buscado);
  }
*/

/*----------------------------------------*/

  /*** PRUEBA 3 ***/
/*
  // Inicializa un archivo, si el archivo tiene datos los elimina.
  inicializarArchivo(ARCHIVO_IMPARES,7, 9,3,7,1,21,33,17);

  // Muestra el contenido de un archivo.
  printf("\nArchivo Impares:\n");
  mostrarArchivo(ARCHIVO_IMPARES);

  // Verifica si existe un dato especifico en un archivo.
  int buscado2 = 25;

  // Muestra si existe o no el dato en un archivo.
  if(existeEnArchivo(ARCHIVO_IMPARES, buscado2)) {
    printf("\n\nEl dato %d existe en el archivo.\n", buscado2);
  }
  else {
    printf("\n\nEl dato %d no existe en el archivo.\n", buscado2);
  }

  // Actualiza el valor de un dato en un archivo.
  int buscado3 = 1;
  int nuevoValor = 55;

  // Opcion 1: Actualiza el dato en un archivo o no.
//  actualizarEnArchivo(ARCHIVO_IMPARES, buscado3, nuevoValor);

//  printf("\nDato buscado %d: \n", buscado3);
//  printf("Nuevo valor: %d: \n", nuevoValor);

    // Muestra el archivo con el dato actualizado o no.
//  printf("\nArchivo impares: \n");
//  mostrarArchivo(ARCHIVO_IMPARES);

  //
  // Opcion 2: La funcion retorna (true) o (false) si modifico el dato o no.
  // Muestra el mensaje si se actualizo el dato o no.
  // Si es correcto muestra el archivo modificado.
  //
  if(actualizarEnArchivo(ARCHIVO_IMPARES, buscado3, nuevoValor)) {
    printf("\nDato actualizado correctamente.\n");
    printf("Dato buscado %d: \n", buscado3);
    printf("Nuevo valor: %d: \n\n", nuevoValor);

    printf("Archivo actualizado: \n");
    mostrarArchivo(ARCHIVO_IMPARES);
  }
  else {
    printf("\nError: No fue posible actualizar el dato.\n");
  }
*/

/*----------------------------------------*/

  return 0;
}
