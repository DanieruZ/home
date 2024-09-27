#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <stdarg.h>
#include <conio.h>
#include "pila_int.h"

#define PILA_DIM 10
#define ESC 27

int main() {

/*----------------------------------------*/

  /*** PRUEBA 1 ***/
/*
  // Crea e inicializa una pila con datos.
  Pila pares;
  inicializarPila(&pares, 5, 8,22,6,4,14);

  // Elimina el contenido de una pila.
//  eliminarPila(&pares);

  // Muestra el contenido de una pila.
  printf("\nPila Pares:\n");
  mostrarPilaH(&pares);
  mostrarPilaV(&pares);

  // Calcula el total de elementos de una pila.
  printf("Total de elementos en la pila pares: %d \n", contarPila(&pares));

  // Muestra el tope de una pila.
  printf("Tope de pila pares: %d \n", buscarTope(&pares));

  // Evalua si una pila tiene elementos o no.
  if(esPilaVacia(&pares)) {
    printf("La pila esta vacia.\n");
  }
  else {
    printf("La pila no esta vacia.\n");
  }
*/

/*----------------------------------------*/

  /*** PRUEBA 2 ***/

  // Crea una nueva pila.
  Pila impares;
  crearPila(&impares);

  // Agrega nuevos datos a una pila.
  apilarPila(&impares, 15);
  apilarPila(&impares, 33);
  apilarPila(&impares, 21);
  apilarPila(&impares, 3);
  apilarPila(&impares, 7);

  // Muestra el contenido de una pila.
  printf("\nPila Impares: \n");
  mostrarPilaH(&impares);
  mostrarPilaV(&impares);

  // Verifica si existe un dato especifico en una pila.
  int buscado = 60;

  // Muestra si existe o no el dato en una pila.
  if(existeDatoPila(&impares, buscado)) {
    printf("El dato %d existe en la pila.\n", buscado);
  }
  else {
    printf("El dato %d no existe en la pila.\n", buscado);
  }

  // Busca un dato especifico en una pila.
  int buscado2 = 82;
  int posicionEncontrado = -1;

  // La funcion devuelve la posicion del dato o (-1) si no lo encuentra.
  posicionEncontrado = buscarDatoPila(&impares, buscado2);

  // Muestra el dato buscado en una pila.
  if(posicionEncontrado != -1) {
    printf("Dato encontrado: %d\n", impares.datos[posicionEncontrado]);
  }
  else {
    printf("El dato %d no se encuentra en la pila.\n", buscado2);
  }

  // Actualiza el valor de un dato en una pila.
  int buscado3 = 15;
  int nuevoValor = 50;

  // Opcion 1: Actualiza el dato en la pila y luego la muestra.
//  actualizarDatoPila(&impares, buscado3, nuevoValor);
//
//  printf("\nPila modificada: \n\n");
//  printf("Dato buscado %d: \n", buscado3);
//  printf("Nuevo valor: %d: \n", nuevoValor);
//  mostrarPilaV(&impares);


  /*
  * Opcion 2: La funcion retorna true o false si modifico el dato o no.
  * Muestra el mensaje si se actualizo el dato o no.
  * Si es correcto muestra la pila modificada.
  */
  if(actualizarDatoPila(&impares, buscado3, nuevoValor)) {
    printf("\nDato actualizado correctamente.\n");
    printf("Dato buscado %d: \n", buscado3);
    printf("Nuevo valor: %d: \n", nuevoValor);
    mostrarPilaV(&impares);
  }
  else {
    printf("Error: No fue posible actualizar el dato.\n");
  }


/*----------------------------------------*/

  /*** PRUEBA 3 ***/
/*
  // Crea un ciclo para cargar datos a una pila.
  Pila numeros;
  crearPila(&numeros);
  int opcion;

  do {
    system("cls");

    agregarEnPila(&numeros);

    printf("\nDesea agregar otro numero?\n");
    printf("\nPresionar [ESC] para salir.");
    fflush(stdin);
    opcion = getch();

  } while(opcion != ESC);

  printf("\n\nPila Numeros: \n");
  mostrarPilaH(&numeros);
  mostrarPilaV(&numeros);

*/

/*----------------------------------------*/

  /*** PRUEBA 4 ***/
/*
  // Crea una nueva pila y agrega datos.
  Pila prueba;
  crearPila(&prueba);

  prueba.datos[0] = 44;
  prueba.datos[1] = 77;
  prueba.datos[2] = 22;
  prueba.datos[3] = 46;
  prueba.datos[4] = 91;
  prueba.tope = 5;

  // Muestra el contenido de una pila.
  printf("\nPila Prueba: \n");
  mostrarPilaV(&prueba);

  // Crea una nueva pila y copia el conteniso de otra pila.
  Pila copia;
  copia = copiarPila(&prueba);

  // Muestra el contenido de una pila.
  printf("\nPila Copia: \n");
  mostrarPilaV(&copia);

*/

/*----------------------------------------*/

  return 0;
}
