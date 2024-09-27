#ifndef LISTA_SIMPLE_INT_H_INCLUDED
#define LISTA_SIMPLE_INT_H_INCLUDED

#include <malloc.h>
#include <stdbool.h>

typedef struct _nodo {
  int dato;
  struct _nodo* siguiente;
} Nodo;

Nodo* crearLista();
Nodo* crearNodo(int dato);
Nodo* inicializarLista(int cantidad, ...);

int esListaVacia(Nodo* lista);
bool esListaVaciaBool(Nodo* lista);
bool existeNodo(Nodo* lista, Nodo* nodoBuscado);

Nodo* buscarNodo(Nodo* lista, Nodo* nodoBuscado);
Nodo* buscarUltimoNodo(Nodo* lista);

void mostrarNodo(Nodo* nodo);
void mostrarNodo_2(Nodo* nodo);
void mostrarLista(Nodo* lista);
void mostrarListaEnlazada(Nodo* lista);

Nodo* agregarAlInicio(Nodo* lista, Nodo* nuevoNodo);
Nodo* agregarAlInicio_2(Nodo* lista, Nodo* nuevoNodo);
void agregarAlInicioPD(Nodo** lista, Nodo* nuevoNodo);
Nodo* agregarAlFinal(Nodo* lista, Nodo* nuevoNodo);
void agregarAlFinalPD(Nodo** lista, Nodo* nuevoNodo);
Nodo* insertarNodoEnOrden(Nodo* lista, Nodo* nuevoNodo);

Nodo* eliminarNodo(Nodo* lista, Nodo* nodoBuscado);
void eliminarNodoPD(Nodo** lista, Nodo* nodoBuscado);
Nodo* eliminarLista(Nodo* lista);
void eliminarListaPD(Nodo** lista);
Nodo* eliminarPrimerNodo(Nodo* lista);
void eliminarPrimerNodoPD(Nodo** lista);
Nodo* eliminarUltimoNodo(Nodo* lista);
void eliminarUltimoNodoPD(Nodo** lista);

Nodo* ordenarLista(Nodo* lista);
Nodo* ordenarLista_2(Nodo* lista);
Nodo* actualizarNodo(Nodo* lista, Nodo* buscado, int nuevoValor);
int contarNodos(Nodo* lista);
void intercambiarNodos(Nodo* nodoActual);

#endif // LISTA_SIMPLE_INT_H_INCLUDED
