#include <stdio.h>
#include <stdlib.h>
#include <stddef.h>
#include <stdarg.h>
#include <stdbool.h>
#include <malloc.h>
#include "arbol_int.h"


int main() {

/*----------------------------------------*/

  /*** PRUEBA 1 ***/

  // Crea un nuevo arbol.
  Arbol* pino = crearArbol();

  // Comprueba si el arbol esta vacio.
  if(!pino) {  // if(pino == NULL)
    printf("Arbol vacio.\n");
  }

  // Crea nuevos nodos.
  Arbol* numero15 = crearNodoArbol(15);
  Arbol* numero24 = crearNodoArbol(24);
  Arbol* numero8 = crearNodoArbol(8);

  // Agrega nodos creados al arbol.
  pino = agregarNodoArbol(pino, numero15);
  pino = agregarNodoArbol(pino, numero24);
  pino = agregarNodoArbol(pino, numero8);

  // Crea y agrega nuevos nodos directamente.
  pino = agregarNodoArbol(pino, crearNodoArbol(5));
  pino = agregarNodoArbol(pino, crearNodoArbol(61));
  pino = agregarNodoArbol(pino, crearNodoArbol(28));
  pino = agregarNodoArbol(pino, crearNodoArbol(11));
  pino = agregarNodoArbol(pino, crearNodoArbol(18));
  pino = agregarNodoArbol(pino, crearNodoArbol(99));
  pino = agregarNodoArbol(pino, crearNodoArbol(2));
  pino = agregarNodoArbol(pino, crearNodoArbol(31));
  pino = agregarNodoArbol(pino, crearNodoArbol(4));

  // Muestra el contenido del arbol en distintos ordenes.
  printf("\n\nPre-Orden: \n");
  mostrarArbolPreOrden(pino);

  printf("\n\nIn-Orden: \n");
  mostrarArbolInOrden(pino);

  printf("\n\nPos-Orden: \n");
  mostrarArbolPosOrden(pino);

  // Calcula la altura de un arbol.
  int alturaPino = calcularAlturaArbol(pino);
  printf("\n\nAltura arbol: %d\n", alturaPino);

  // Busca un nodo especifico en un arbol.
  Arbol* buscado = crearNodoArbol(11);

  // Busca un nodo en un arbol.
  Arbol* encontrado = buscarNodoArbol(pino, buscado);

  // Muestra el nodo encontrado o un mensaje indicando lo contrario.
  if(encontrado) {  // if(encontrado != NULL)
    printf("\nNodo encontrado: %d\n", encontrado->dato);
  }
  else {
    printf("\nNodo no encontrado.\n");
  }

  // Comprueba si existe un nodo especifico en un arbol.
  Arbol* buscado2 = crearNodoArbol(31);

  // Muestra un mensaje indicando si existe o no.
  if(existeNodoArbol(pino, buscado2)) {
    printf("\nEl nodo existe.\n");
  }
  else {
    printf("\nEl nodo no existe.\n");
  }

  // Agrega un nuevo nodo si no existe en un arbol.
  pino = agregarNodoArbolSinRepetir(pino, crearNodoArbol(28));

  printf("\nArbol sin repetidos: \n");
  mostrarArbolPreOrden(pino);

  // Calcula el total de nodos en un arbol.
  int totalNodos = 0;
  totalNodos = contarArbol(pino);
  printf("\n\nTotal de nodos: %d\n", totalNodos);

  // Elimina el contenido de un arbol.
  pino = eliminarArbol(pino);

  // Agrega nuevos nodos al arbol vaciado.
  pino = agregarNodoArbol(pino, crearNodoArbol(30));
  pino = agregarNodoArbol(pino, crearNodoArbol(40));
  pino = agregarNodoArbol(pino, crearNodoArbol(20));

  printf("\nArbol eliminado con nuevos datos: \n");
  mostrarArbolPreOrden(pino);


/*----------------------------------------*/

  /*** PRUEBA 2 ***/
/*
  // Crea un nuevo arbol.
  Arbol* arbolito = crearArbol();

  // Inicializa un array de enteros.
  int numeros[]= {50,25,75,22,26,28,27,29,30,16,1,69,35,73,18,56,33,99,88,36,100};

  // Calcula el total de elementos del array.
  int vNumeros = sizeof(numeros) / sizeof(int);

  // Agrega el contenido de array al arbol creado.
  for(int i = 0; i < vNumeros; i++) {
    arbolito = agregarNodoArbol(arbolito, crearNodoArbol(numeros[i]));
  }

  // Puntero al ejeX para que se reinicialize.
  int* ejeX = 0;

  // Muestra el contenido del arbol.
  gotoxy(45,0);
  printf("Arbol Binario");
  gotoxy(44,1);
  printf("===============");
  mostrarArbol(arbolito, &ejeX, 0);
  gotoxy(46,20);
  printf("\nPresionar tecla [ENTER] para continuar.");
  getchar();
*/

/*----------------------------------------*/

  /*** PRUEBA 3 ***/
/*
  // Crea un nuevo arbol.
  Arbol* arbolon = crearArbol();

  // Inicializa el arbol con datos.
  arbolon = inicializarArbol(9, 50,44,65,63,47,23,71,15,83);

  // Puntero al ejeX para que se reinicialize.
  int* ejeX = 0;

  // Muestra el contenido del arbol.
  gotoxy(45,0);
  printf("Arbol Binario");
  gotoxy(44,1);
  printf("===============");
  mostrarArbol(arbolon, &ejeX, 0);

  // Busca un nodo especifico en un arbol.
  Arbol* buscado = buscarNodoArbol(arbolon, crearNodoArbol(23));

  // Evalua si un nodo buscado es hoja en un arbol.
  gotoxy(0,15);
  if(esHoja(buscado)) {
    printf("\nEl nodo %d es hoja.\n", buscado->dato);
  }
  else {
    printf("\nEl nodo %d no es hoja.\n", buscado->dato);
  }

  // Calcula el total de hojas en un arbol
  gotoxy(0,16);
  int totalHojas = contarHojasArbol(arbolon);
  printf("\nTotal hojas: %d\n", totalHojas);

  // Busca el ultimo nodo a la izquierda en un arbol.
  gotoxy(0,17);
  Arbol* ultimoIzquierda = buscarUltimoIzquierdaArbol(arbolon);
  printf("\nUltimo nodo izquierda: %d\n", ultimoIzquierda->dato);

  // Busca el ultimo nodo a la derecha en un arbol.
  gotoxy(0,18);
  Arbol* ultimoDerecha = buscarUltimoDerechaArbol(arbolon);
  printf("\nUltimo nodo derecha: %d\n", ultimoDerecha->dato);

  // Busca y actualiza el valor de un nodo en un arbol.
  Arbol* buscado3 = crearNodoArbol(44);
  int nuevoValor = 100;
  arbolon = actualizarNodoArbol(arbolon, buscado3, nuevoValor);

  // Muestra el nodo actualizado.
  gotoxy(0,19);
  printf("\nNodo buscado: %d\n", buscado3->dato);
  gotoxy(0,20);
  printf("\nValor actualizado: %d\n", nuevoValor);

  // Elimina un nodo especifico en un arbol.
  Arbol* buscado2 = crearNodoArbol(63);
  arbolon = eliminarNodoArbol(arbolon, buscado2);

  // Muestra el nodo eliminado.
  gotoxy(0,21);
  printf("\nNodo eliminado: %d\n", buscado2->dato);


  // Muestra el contenido del arbol sin el nodo eliminado junto al original.
  mostrarArbol(arbolon, &ejeX, 0);

  gotoxy(0,23);
  printf("\n\nPresionar tecla [ENTER] para continuar.");
  getchar();
*/

/*----------------------------------------*/

  return 0;
}
