#include <stdio.h>
#include <stdlib.h>
#include <stdarg.h>
#include <stdbool.h>
#include "pila_int.h"

#define PILA_DIM 10

// Crea una pila nueva.
void crearPila(Pila* pila) {
  pila->datos = (int*) malloc(PILA_DIM * sizeof(int));
  pila->tope = 0;
}


// Crea e inicializa una pila.
void inicializarPila(Pila* pila, int cantidad, ...) {
  crearPila(pila);
  va_list args;
  va_start(args, cantidad); // Inicializa la lista de argumentos

  for(int i = 0; i < cantidad; i++) {
    if(pila->tope < PILA_DIM) {  // Verifica que no se exceda el tamaño de la pila
      pila->datos[pila->tope] = va_arg(args, int);  // Obtiene el siguiente argumento
      pila->tope++; // Incrementa el tope
    }
    else {
      printf("Error: La pila esta llena. No se pueden agregar mas elementos.\n");
      break;
    }
  }
  va_end(args); // Finaliza el uso de la lista de argumentos.
}


// Evalua si la pila tiene elementos.
bool esPilaVacia(Pila* pila) {
  return pila->tope == 0;
}


// Agrega un nuevo dato a una pila.
void apilarPila(Pila* pila, int dato) {
  int i = pila->tope;
  pila->datos[i] = dato;
  pila->tope = pila->tope + 1;
}


// Desapila el tope de una pila.
int desapilarPila(Pila* pila) {
  int tope = pila->datos[pila->tope - 1];
  pila->tope--;
  return tope;
}


// Obtiene el valor del tope de una pila.
int buscarTope(Pila* pila) {
  return pila->datos[pila->tope - 1];
}


// Elimina el contenido de una pila.
void eliminarPila(Pila* pila) {
  free(pila->datos);  // Libera la memoria asignada
  pila->tope = 0;  // Reinicia el tope
}


// Agrega nuevos datos a una pila por consola.
void agregarEnPila(Pila* pila) {
  int aux = 0;

  if(pila->tope < PILA_DIM) {
    printf("Ingresar un numero entero: ");
    fflush(stdin);
    scanf("%d", &aux);
    apilarPila(pila, aux);
  }
  else {
    printf("Error: La pila esta llena. No se pueden agregar mas elementos.\n");
  }
}


// Calcula el total de elementos en una pila.
int contarPila(Pila* pila) {
  return pila->tope;
}


// Muestra el contenido de una pila horizontalmente.
void mostrarPilaH(Pila* pila) {
  printf("\n| BASE |=================================================================================================== | TOPE |\n\n");
  printf("       ");

  for(int i = 0; i < pila->tope; i++) {
    printf("| %d ", pila->datos[i]);
  }
  printf("\n\n| BASE |=================================================================================================== | TOPE |\n\n");
}


// Muestra el contenido de una pila verticalmente.
void mostrarPilaV(Pila* pila) {
  printf("\n\t| TOPE |\n");

  for(int i = pila->tope - 1; i > -1; --i) {
    printf("\t+------+\n");
    printf("\t|  %-2d  |\n", pila->datos[i]);
  }
  printf("\t+------+\n");
  printf("\t| BASE |\n\n");
}


// Copia el contenido de una pila en otra pila.
Pila copiarPila(Pila* original) {
  Pila copia;
  crearPila(&copia);

  for (int i = 0; i < original->tope; i++) {
    copia.datos[i] = original->datos[i];  // Copiar los elementos
  }
  copia.tope = original->tope;  // Establecer el tope de la pila copiada
  return copia;
}


// Verifica si existe un dato especifico en una pila.
bool existeDatoPila(Pila* pila, int datoBuscado) {
  bool existeDato = false;

  for(int i = pila->tope - 1; i > -1; --i) {
    if(pila->datos[i] == datoBuscado) {
      existeDato = true;
    }
  }
  return existeDato;
}


// Busca un dato especifico en una pila y retorna su posicion.
int buscarDatoPila(Pila* pila, int datoBuscado) {
  int posicionEncontrado = -1;

  for(int i = pila->tope - 1; i > -1; --i) {
    if(pila->datos[i] == datoBuscado) {
      posicionEncontrado = i;
    }
  }
  return posicionEncontrado;
}


/*
* Actualiza el valor de un dato en una pila.
* Retorna true si actualizo el nuevo valor o false si no.
*/
bool actualizarDatoPila(Pila* pila, int datoBuscado, int nuevoValor) {
  bool seActualizo = false;
  int posicionBuscado = buscarDatoPila(pila, datoBuscado);

  if(posicionBuscado != -1) {
    pila->datos[posicionBuscado] = nuevoValor;
    seActualizo = true;
  }
  return seActualizo;
}


