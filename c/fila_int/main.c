#include "fila_int.h"

int main() {

/*----------------------------------------*/

  /*** PRUEBA 1 ***/
/*
  // Crea e inicializa una fila con 5 valores.
  Fila* filaA = inicializarFila(5, 8,2,7,4,10);

  // Muestra el contenido de la fila.
  printf("\Fila A:\n");
  mostrarFila(filaA);
  mostrarFilaEnlazada(filaA);

  // Busca un nodo especifico en una fila y lo muestra.
  Nodo* buscado = crearNodo(4);

  printf("\nDato buscado: %d", buscado->dato);

  if(existeNodo(filaA, buscado)) {
    printf("\nNodo encontrado.\n");
    mostrarNodo(buscarNodo(filaA, buscado));
  }
  else {
    printf("\nNodo no encontrado.\n");
  }

  // Elimina el contenido de una fila.
  filaA = eliminarFila(filaA);
  printf("\nContenido de la fila eliminado.\n");
  mostrarFilaEnlazada(filaA);
*/

/*----------------------------------------*/

  /*** PRUEBA 2 ***/
/*
  // Crea una fila vacia.
  Fila* filaB = crearFila();

  // Crea nuevos nodos.
  Nodo* nodo9 = crearNodo(9);
  Nodo* nodo1 = crearNodo(1);
  Nodo* nodo7 = crearNodo(7);
  Nodo* nodo3 = crearNodo(3);

  // Agrega los nodos creados a la fila vacia.
  filaB = agregarAlFinal(filaB, nodo9);
  filaB = agregarAlFinal(filaB, nodo1);
  filaB = agregarAlFinal(filaB, nodo7);
  filaB = agregarAlFinal(filaB, nodo3);

    // Muestra el contenido de la fila.
  printf("\Fila B:\n");
  mostrarFila(filaB);
  mostrarFilaEnlazada(filaB);

  // Elimina el primer nodo y agrega nuevos a la fila.
  Nodo* nodo21 = crearNodo(21);
  Nodo* nodo13 = crearNodo(13);

  Nodo* nodoEliminado = eliminarPrimero(filaB);
  filaB = agregarAlFinal(filaB, nodo21);
  filaB = agregarAlFinal(filaB, nodo13);

  // Muestra el contenido de la fila con nuevos nodos agregados.
  printf("\Fila B agregados nodos (21) y (13); eliminado el primer nodo:\n\n");
  printf("Nodo eliminado: %d \n", nodoEliminado->dato);
  mostrarFila(filaB);
  mostrarFilaEnlazada(filaB);

  // Actualiza el valor de un nodo.
  printf("\nSe modifica el valor 3 por 30:");
  int nuevoValor = 30;
  filaB = actualizarNodo(filaB, nodo3, nuevoValor);
  mostrarFilaEnlazada(filaB);

  // Ordena el contenido de la fila.
  filaB = ordenarFila(filaB);

  printf("\nFila B ordenada:\n");
  mostrarFila(filaB);
  mostrarFilaEnlazada(filaB);

  // Inserta un nuevo nodo ordenadamente a la fila.
  Nodo* nodo12 = crearNodo(12);
  filaB = insertarNodoEnOrden(filaB, nodo12);

  // Muestra el contenido de la fila.
  printf("\nFila B insertado ordenadamente nuevo nodo (12).\n");
  mostrarFila(filaB);
  mostrarFilaEnlazada(filaB);
*/

/*----------------------------------------*/

  return 0;
}
