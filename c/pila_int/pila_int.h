#ifndef PILA_INT_H_INCLUDED
#define PILA_INT_H_INCLUDED

#include <stdio.h>
#include <stdlib.h>
#include <malloc.h>
#include <stdbool.h>

typedef struct {
  int* datos;
  int tope;
} Pila;

void crearPila(Pila* pila);
void inicializarPila(Pila* pila, int cantidad, ...);

void agregarEnPila(Pila* pila);
void apilarPila(Pila* pila, int dato);
int desapilarPila(Pila* pila);

int buscarTope(Pila* pila);
int buscarDatoPila(Pila* pila, int datoBuscado);

void eliminarPila(Pila* pila);

void mostrarPilaH(Pila* pila);
void mostrarPilaV(Pila* pila);

bool esPilaVacia(Pila* pila);
bool existeDatoPila(Pila* pila, int datoBuscado);

Pila copiarPila(Pila* original);
int contarPila(Pila* pila);
bool actualizarDatoPila(Pila* pila, int datoBuscado, int nuevoValor);

#endif // PILA_INT_H_INCLUDED
