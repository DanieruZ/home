#include "fila_int.h"

// Crea una fila vacia.
Fila* crearFila() {
  Fila* fila = (Fila*) malloc(sizeof(Fila));
  fila->primero = NULL;
  fila->ultimo = NULL;
  return fila;
}


/*
 * Crea e inicializa una fila con valores enteros.
 * parametros: cantidad de valores a agregar.
 * parametros: numeros enteros.
 */
Fila* inicializarFila(int cantidad, ...) {
  Fila* fila = (Fila*) malloc(sizeof(Fila));
  fila->primero = NULL;
  fila->ultimo = NULL;
  va_list args;
  va_start(args, cantidad); // Inicializa la lista de argumentos.

  for(int i = 0; i < cantidad; i++) {
    Nodo* nuevoNodo = (Nodo*) malloc(sizeof(Nodo));
    nuevoNodo->dato = va_arg(args, int); // Obtiene el siguiente argumento.
    nuevoNodo->siguiente = NULL;

    if(fila->ultimo) {
      fila->ultimo->siguiente = nuevoNodo; // Enlaza el nuevo nodo al final.
    }
    fila->ultimo = nuevoNodo; // Actualiza el ultimo nodo.

    if(!fila->primero) {
      fila->primero = nuevoNodo; // Si la fila estaba vacia, el nuevo nodo es el primero.
    }
  }
  va_end(args); // Finaliza el uso de la lista de argumentos.
  return fila;
}


// Crea un nuevo nodo.
Fila* crearNodo(int dato) {
  Nodo* nuevoNodo = (Nodo*) malloc(sizeof(Nodo));
  nuevoNodo->dato = dato;
  nuevoNodo->siguiente = NULL;
  return nuevoNodo;
}


// Agrega un nuevo nodo al final de una fila.
Fila* agregarAlFinal(Fila* fila, Nodo* nuevoNodo) {
  if(!fila->primero) {
    fila->primero = nuevoNodo;
    fila->ultimo = nuevoNodo;
  }
  else {
    fila->ultimo->siguiente = nuevoNodo;
    fila->ultimo = nuevoNodo;
  }
  return fila;
}


// Elimina el primer nodo de una fila y lo retorna.
Nodo* eliminarPrimero(Fila* fila) {
  Nodo* aux = NULL;

  if(fila) {
    aux = fila->primero;
    fila->primero = fila->primero->siguiente;

    if(!fila->primero) {
      fila->ultimo = NULL;
    }
  }
  return aux;
}


// Evalua si una fila esta vacia.
bool esFilaVacia(Fila* fila) {
  return fila == NULL || fila->primero == NULL;
}


// Muestra un nodo y su direccion en memoria.
void mostrarNodo(Nodo* nodo) {
  if(nodo) {
    printf("nodo: %-3d -  nodo->siguiente: %p\n", nodo->dato, (void*)nodo->siguiente);
  }
}


// Muestra el contenido de una fila.
void mostrarFila(Fila* fila) {
  Nodo* nodoActual = fila->primero;

  while(nodoActual) {
    mostrarNodo(nodoActual);
    nodoActual = nodoActual->siguiente;
  }
}


// Muestra el dato de un nodo.
void mostrarNodo_2(Nodo* nodo) {
  if(nodo) {
    printf("|  %-3d |  ->  ", nodo->dato);
  }
}


// Muestra todo el contenido de una lista.
void mostrarFilaEnlazada(Fila* fila) {
  printf("\n| HEAD | =================================================================================================== | TAIL |\n\n");
  Nodo* nodoActual = fila->primero;

  while(nodoActual) {
    mostrarNodo_2(nodoActual);
    nodoActual = nodoActual->siguiente;
  }

  printf("\n\n| HEAD | =================================================================================================== | TAIL |\n\n");
}


// Ordena el contenido de una fila.
Fila* ordenarFila(Fila* fila) {
  Nodo* nodoActual = fila->primero;

  while(nodoActual) {
    Nodo* nodoMenor = nodoActual;
    Nodo* nodoSiguiente = nodoActual->siguiente;

    while(nodoSiguiente) {
      if(nodoMenor->dato > nodoSiguiente->dato) {
        nodoMenor = nodoSiguiente;
      }
      nodoSiguiente = nodoSiguiente->siguiente;
    }

    if(nodoMenor != nodoActual) {
      int aux = nodoActual->dato;
      nodoActual->dato = nodoMenor->dato;
      nodoMenor->dato = aux;
    }
    nodoActual = nodoActual->siguiente;
  }
  return fila;
}


// Busca un nodo especifico en una fila.
Nodo* buscarNodo(Fila* fila, Nodo* nodoBuscado) {
  Nodo* nodoEncontrado = NULL;
  Nodo* nodoActual = fila->primero;

  while(nodoActual) {
    if(nodoActual->dato == nodoBuscado->dato) {
      nodoEncontrado = nodoActual;
    }
    nodoActual = nodoActual->siguiente;
  }
  return nodoEncontrado;
}


// Actualiza el valor de un nodo en una fila.
Fila* actualizarNodo(Fila* fila, Nodo* nodoBuscado, int nuevoValor) {
  Nodo* nodoActualizar = buscarNodo(fila, nodoBuscado);

  if(nodoActualizar) {
    nodoActualizar->dato = nuevoValor;
  }
  return fila;
}


// Evalua si un nodo especifico existe en una fila.
bool existeNodo(Fila* fila, Nodo* nodoBuscado) {
  Nodo* nodoActual = fila->primero;
  bool existeNodo = false;

  while(nodoActual) {
    if(nodoActual->dato == nodoBuscado->dato) {
      existeNodo = true;
    }
    nodoActual = nodoActual->siguiente;
  }
  return existeNodo;
}


Nodo* insertarNodoEnOrden(Fila* fila, Nodo* nuevoNodo) {
  if(!fila) {
    fila->primero = nuevoNodo;
    fila->ultimo = nuevoNodo;
  }
  else if(nuevoNodo->dato < fila->primero->dato) {
    fila = agregarAlFinal(fila, nuevoNodo);
  }
  else {
    Nodo* nodoActual = fila->primero;
    Nodo* nodoSiguiente = nodoActual->siguiente;

    while(nodoSiguiente && nuevoNodo->dato > nodoSiguiente->dato) {
      nodoActual = nodoSiguiente;
      nodoSiguiente = nodoSiguiente->siguiente;
    }
    nuevoNodo->siguiente = nodoSiguiente;
    nodoActual->siguiente = nuevoNodo;
  }
  return fila;
}


// Elimina todo el contenido de una fila.
Fila* eliminarFila(Fila* fila) {
  Nodo* nodoActual = fila->primero;
  Nodo* nodoSiguiente = NULL;

  while(nodoActual) {
    nodoSiguiente = nodoActual->siguiente;
    free(nodoActual);
    nodoActual = nodoSiguiente;
  }
  fila->primero = NULL;
  fila->ultimo = NULL;
  return fila;
}
