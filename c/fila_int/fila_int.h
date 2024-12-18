#ifndef FILA_INT_H_INCLUDED
#define FILA_INT_H_INCLUDED

#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <malloc.h>
#include <stddef.h>
#include <stdarg.h>

typedef struct Nodo {
  int dato;
  struct Nodo* siguiente;
} Nodo;

typedef struct Fila {
  Nodo* primero;
  Nodo* ultimo;
} Fila;

Fila* crearFila();
Fila* crearNodo(int dato);
Fila* inicializarFila(int cantidad, ...);
bool esFilaVacia(Fila* fila);
Fila* agregarAlFinal(Fila* fila, Nodo* nuevoNodo);
Nodo* eliminarPrimero(Fila* fila);
Fila* ordenarFila(Fila* fila);
void mostrarNodo(Nodo* nodo);
void mostrarFila(Fila* fila);
void mostrarNodo_2(Nodo* nodo);
void mostrarFilaEnlazada(Fila* fila);
Nodo* buscarNodo(Fila* fila, Nodo* nodoBuscado);
Fila* actualizarNodo(Fila* fila, Nodo* nodoBuscado, int nuevoValor);
bool existeNodo(Fila* fila, Nodo* nodoBuscado);
Nodo* insertarNodoEnOrden(Fila* fila, Nodo* nuevoNodo);
Fila* eliminarFila(Fila* fila);

#endif // FILA_INT_H_INCLUDED
