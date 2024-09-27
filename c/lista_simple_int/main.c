#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include "lista_simple_int.h"

int main() {

/*----------------------------------------*/

  /*** PRUEBA 1 ***/
/*
  // Crea e inicializa una lista con 5 valores.
  Nodo* listaPares = inicializarLista(5, 4,2,8,6,12);

  // Muestra el contenido de la lista.
  printf("\nLista Pares:\n");
  mostrarLista(listaPares);
  mostrarListaEnlazada(listaPares);

  // Cuenta el total de nodos en la lista pares.
  int totalNodosPares = contarNodos(listaPares);
  printf("Total nodos pares: %d\n", totalNodosPares);

  // Busca un nodo especifico en una lista y lo muestra.
  Nodo* buscado8 = crearNodo(8);

  printf("\nDato buscado: %d", buscado8->dato);

  if(existeNodo(listaPares, buscado8)) {
    printf("\nNodo encontrado.\n");
    mostrarNodo(buscarNodo(listaPares, buscado8));
  }
  else {
    printf("\nNodo no encontrado.\n");
  }

    // Elimina el contenido de una lista.
//  listaPares = eliminarLista(listaPares);
//  mostrarListaEnlazada(listaPares);

  // Elimina el contenido de una lista con puntero doble.
//  eliminarListaPD(&listaPares);
//  mostrarListaEnlazada(listaPares);

*/

/*----------------------------------------*/

  /*** PRUEBA 2 ***/
/*
  // Crea una lista vacia.
  Nodo* listaImpares = crearLista();

  // Crea nuevos nodos.
  Nodo* numero9 = crearNodo(9);
  Nodo* numero1 = crearNodo(1);
  Nodo* numero7 = crearNodo(7);
  Nodo* numero3 = crearNodo(3);

  // Agrega los nodos creados a la lista vacia.
  listaImpares = agregarAlFinal(listaImpares, numero9);
  listaImpares = agregarAlFinal(listaImpares, numero1);
  listaImpares = agregarAlFinal(listaImpares, numero7);
  listaImpares = agregarAlFinal(listaImpares, numero3);

    // Muestra el contenido de la lista.
  printf("\nLista Impares:\n");
  mostrarLista(listaImpares);
  mostrarListaEnlazada(listaImpares);

  // Crea y agrega nuevos nodos a la lista.
  Nodo* numero51 = crearNodo(51);
  Nodo* numero11 = crearNodo(11);

  listaImpares = agregarAlInicio(listaImpares, numero51);
  listaImpares = agregarAlFinal(listaImpares, numero11);

  // Muestra el contenido de una lista con nuevos nodos agregados.
  printf("\nLista Impares con nodos agregados al inicio (51) y al final (11):\n\n");
  mostrarLista(listaImpares);
  mostrarListaEnlazada(listaImpares);

  //Cuenta el total de nodos en la lista impares.
  int totalNodosImpares = contarNodos(listaImpares);
  printf("Total nodos impares: %d\n", totalNodosImpares);

  // Ordena el contenido de una lista.
  listaImpares = ordenarLista_2(listaImpares);

  printf("\nLista Impares ordenada:\n");
  mostrarLista(listaImpares);
  mostrarListaEnlazada(listaImpares);

    // Inserta un nuevo nodo ordenadamente en una lista.
  Nodo* numero33 = crearNodo(33);
  listaImpares = insertarNodoEnOrden(listaImpares, numero33);

  // Muestra el contenido de una lista.
  printf("\nLista Impares insertado ordenadamente nuevo nodo (33).\n");
  mostrarLista(listaImpares);
  mostrarListaEnlazada(listaImpares);
*/

/*----------------------------------------*/

  return 0;
}
