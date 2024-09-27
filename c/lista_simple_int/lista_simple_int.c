#include <stddef.h>
#include <stdarg.h>
#include <stdbool.h>
#include <malloc.h>
#include "lista_simple_int.h"

// Crea una lista vacia.
Nodo* crearLista() {
  return NULL;
}


/*
 * Comprueba si una lista esta vacia.
 * Retorna 1 (verdadero) si la lista esta vacia.
 * Retorna 0 (falso) en caso contrario.
 */
int esListaVacia(Nodo* lista) {
  return lista == NULL;
}


/*
 * Comprueba si una lista esta vacia.
 * Retorna true (verdadero) si la lista esta vacia.
 * Retorna false (falso) en caso contrario.
 */
bool esListaVaciaBool(Nodo* lista) {
  return lista == NULL;
}


/*
 * Crea e inicializa una lista con valores enteros.
 * parametros: cantidad de valores a agregar.
 * parametros: numeros enteros.
 */
Nodo* inicializarLista(int cantidad, ...) {
  Nodo* lista = NULL;
  Nodo* nodoAnterior = NULL;
  va_list args;
  va_start(args, cantidad); // Inicializa la lista de argumentos

  for (int i = 0; i < cantidad; i++) {
    Nodo* nuevoNodo = (Nodo*) malloc(sizeof(Nodo));
    nuevoNodo->dato = va_arg(args, int);  // Obtiene el siguiente argumento
    nuevoNodo->siguiente = NULL;

    if(!lista) {
      lista = nuevoNodo;
    }
    else {
      nodoAnterior->siguiente = nuevoNodo;
    }
    nodoAnterior = nuevoNodo;
  }
  va_end(args);  // Finaliza el uso de la lista de argumentos
  return lista;
}


// Crea un nuevo nodo.
Nodo* crearNodo(int dato) {
  Nodo* nuevoNodo = (Nodo*) malloc(sizeof(Nodo));
  nuevoNodo->dato = dato;
  nuevoNodo->siguiente = NULL;
  return nuevoNodo;
}

// Cuenta el total de nodos en una lista.
int contarNodos(Nodo* lista) {
  int contador = 0;

  while(lista) {
    contador++;
    lista = lista->siguiente;
  }
  return contador;
}


// Comprueba si el dato existe en una lista.
bool existeNodo(Nodo* lista, Nodo* nodoBuscado) {
  bool existe = false;

  if(lista) {
    while(existe == false && lista) {
      if(lista->dato == nodoBuscado->dato) {
        existe = true;
      }
      lista = lista->siguiente;
    }
  }
  return existe;
}


// Muestra un nodo y su direccion en memoria.
void mostrarNodo(Nodo* nodo) {
  if(nodo) {
    printf("nodo: %-3d -  nodo->siguiente: %p\n", nodo->dato, (void*)nodo->siguiente);
  }
}

// Muestra el dato de un nodo.
void mostrarNodo_2(Nodo* nodo) {
  if(nodo) {
    printf("|  %-3d |  ->  ", nodo->dato);
  }
}


// Muestra todo el contenido de una lista.
void mostrarListaEnlazada(Nodo* lista) {
  printf("\n| HEAD | =================================================================================================== | TAIL |\n\n");
//  printf("       ");

  while(lista) {
    mostrarNodo_2(lista);
    lista = lista->siguiente;
  }

  printf("\n\n| HEAD | =================================================================================================== | TAIL |\n\n");
}


// Muestra todo el contenido de una lista.
void mostrarLista(Nodo* lista) {
  while(lista) {
    mostrarNodo(lista);
    lista = lista->siguiente;
  }
}


// Agrega un nuevo nodo al inicio de una lista.
Nodo* agregarAlInicio(Nodo* lista, Nodo* nuevoNodo) {
  if(!lista) {  // if(lista == NULL)
    lista = nuevoNodo;
  }
  else {
    nuevoNodo->siguiente = lista;
    lista = nuevoNodo;
  }
  return lista;
}


// Agrega un nuevo nodo al inicio de una lista.
Nodo* agregarAlInicio_2(Nodo* lista, Nodo* nuevoNodo) {
  nuevoNodo->siguiente = lista;
  return nuevoNodo;
}


// Agrega un nuevo nodo al inicio de una lista con puntero doble.
void agregarAlInicioPD(Nodo** lista, Nodo* nuevoNodo) {
  nuevoNodo->siguiente = (*lista);
  (*lista) = nuevoNodo;
}


// Busca el ultimo nodo de una lista.
Nodo* buscarUltimoNodo(Nodo* lista) {
  while(lista->siguiente) {  // while(nodo->siguiente != NULL)
    lista = lista->siguiente;
  }
  return lista;
}


// Agrega un nuevo nodo al final de una lista.
Nodo* agregarAlFinal(Nodo* lista, Nodo* nuevoNodo) {
  if(!lista) {
    lista = nuevoNodo;
  }
  else {
    Nodo* ultimoNodo = buscarUltimoNodo(lista);
    ultimoNodo->siguiente = nuevoNodo;
  }
  return lista;
}


// Agrega un nuevo nodo al final de una lista con puntero doble.
void agregarAlFinalPD(Nodo** lista, Nodo* nuevoNodo) {
  if(!*lista) {
    *lista = nuevoNodo;
  }
  else {
    Nodo* ultimoNodo = buscarUltimoNodo(*lista);
    ultimoNodo->siguiente = nuevoNodo;
  }
}


// Busca un nodo especifico en una lista.
Nodo* buscarNodo(Nodo* lista, Nodo* nodoBuscado) {
  Nodo* nodoEncontrado = NULL;

  while(lista) {
    if(lista->dato == nodoBuscado->dato) {
      nodoEncontrado = lista;
    }
    lista = lista->siguiente;
  }
    return nodoEncontrado;
}


// Elimina un nodo especifico en una lista.
Nodo* eliminarNodo(Nodo* lista, Nodo* nodoBuscado) {
  Nodo* nodoEliminar = buscarNodo(lista, nodoBuscado);

  if(lista == nodoEliminar) {
    lista = eliminarPrimerNodo(lista);
  }
  else {
    Nodo* nodoActual = lista;

    while(nodoActual->siguiente != nodoEliminar) {
      nodoActual = nodoActual->siguiente;
    }
   nodoActual->siguiente = nodoEliminar->siguiente;
   free(nodoEliminar);
  }
  return lista;
}


// Elimina un nodo especifico en una lista con puntero doble.
void eliminarNodoPD(Nodo** lista, Nodo* nodoBuscado) {
  Nodo* nodoEliminar = buscarNodo(*lista, nodoBuscado);

  if(*lista == nodoEliminar) {
    *lista = eliminarPrimerNodo(*lista);
  }
  else {
    Nodo* nodoActual = *lista;

    while(nodoActual->siguiente != nodoEliminar) {
      nodoActual = nodoActual->siguiente;
    }
   nodoActual->siguiente = nodoEliminar->siguiente;
   free(nodoEliminar);
  }
}


// Elimina todo el contenido de una lista.
Nodo* eliminarLista(Nodo* lista){
  Nodo* nodoActual = lista;
  Nodo* nodoSiguiente = NULL;

  while(nodoActual) {
    nodoSiguiente = nodoActual->siguiente;
    free(nodoActual);
    nodoActual = nodoSiguiente;
  }
  return nodoActual;
}


// Elimina todo el contenido de una lista con puntero doble.
void eliminarListaPD(Nodo** lista) {
  Nodo* nodoActual = *lista;
  Nodo* nodoSiguiente = NULL;

  while(nodoActual) {
    nodoSiguiente = nodoActual->siguiente;
    free(nodoActual);
    nodoActual = nodoSiguiente;
  }
  *lista = NULL;
}


// Elimina el primer nodo de una lista.
Nodo* eliminarPrimerNodo(Nodo* lista){
  Nodo* aux = lista;
  lista = lista->siguiente;
  free(aux);
  return lista;
}


// Elimina el primer nodo de una lista con puntero doble.
void eliminarPrimerNodoPD(Nodo** lista){
  Nodo* aux = *lista;
  *lista = (*lista)->siguiente;
  free(aux);
}


// Elimina el ultimo nodo de una lista.
Nodo* eliminarUltimoNodo(Nodo* lista){
  Nodo* ultimoNodo = buscarUltimoNodo(lista);

  if(lista == ultimoNodo) {
    free(ultimoNodo);
    lista = NULL;
  }
  else {
    Nodo* nodoActual = lista;

    while(nodoActual->siguiente != ultimoNodo) {
      nodoActual = nodoActual->siguiente;
    }
    nodoActual->siguiente = NULL;
    free(ultimoNodo);
  }
  return lista;
}

// Elimina el ultimo nodo de una lista con puntero doble.
void eliminarUltimoNodoPD(Nodo** lista){
  Nodo* ultimoNodo = buscarUltimoNodo(*lista);

  if(*lista == ultimoNodo) {
    free(ultimoNodo);
    *lista = NULL;
  }
  else {
    Nodo* nodoActual = *lista;

    while(nodoActual->siguiente != ultimoNodo) {
      nodoActual = nodoActual->siguiente;
    }
    nodoActual->siguiente = NULL;
    free(ultimoNodo);
  }
}


// Ordena los elementos en una lista.
Nodo* ordenarLista(Nodo* lista) {
  Nodo* nodoActual = lista;

  while(nodoActual) {
    Nodo* nodoMenor = nodoActual;
    Nodo* nodoSiguiente = nodoActual->siguiente;

    // Buscar el nodo con el menor dato en la parte no ordenada
    while(nodoSiguiente) {
      if(nodoSiguiente->dato < nodoMenor->dato) {
        nodoMenor = nodoSiguiente;
      }
      nodoSiguiente = nodoSiguiente->siguiente;
    }

    // Intercambiar los datos si se encontro un nodo menor
    if(nodoMenor != nodoActual) {
      int temp = nodoActual->dato;
      nodoActual->dato = nodoMenor->dato;
      nodoMenor->dato = temp;
    }
    nodoActual = nodoActual->siguiente;  // Mover al siguiente nodo
  }
  return lista;
}


// Ordena los elementos de una lista con Algoritmo Bubble Sort.
Nodo* ordenarLista_2(Nodo* lista) {
  int intercambios;

  do {
    intercambios = 0;
    Nodo* nodoActual = lista;
    Nodo* nodoSiguiente = NULL;

    while(nodoActual->siguiente) {
      if(nodoActual->dato > nodoActual->siguiente->dato) {
        intercambiarNodos(nodoActual);  // Intercambiar los datos
        intercambios = 1;   // Se realizo un intercambio
      }
      nodoActual = nodoActual->siguiente;
    }
    nodoSiguiente = nodoActual;  // Reducir el rango de comparacion

  } while(intercambios);  // Repetir mientras haya intercambios

  return lista;
}


// Actualiza el valor de un nodo en una lista.
Nodo* actualizarNodo(Nodo* lista, Nodo* buscado, int nuevoValor) {
  Nodo* nodoActualizar = buscarNodo(lista, buscado);

  if(nodoActualizar) {
    nodoActualizar->dato = nuevoValor;
  }
  return lista;
}


// Funcion para intercambiar los datos entre dos nodos.
void intercambiarNodos(Nodo* nodoActual) {
  int aux = nodoActual->dato;
  nodoActual->dato = nodoActual->siguiente->dato;
  nodoActual->siguiente->dato = aux;
}


// Inserta un nuevo nodo ordenadamente en una lista.
Nodo* insertarNodoEnOrden(Nodo* lista, Nodo* nuevoNodo) {
  if(!lista) {
    lista = nuevoNodo;
  }
  else if(nuevoNodo->dato < lista->dato) {
    lista = agregarAlInicio(lista, nuevoNodo);
  }
  else {
    Nodo* nodoActual = lista;
    Nodo* nodoSiguiente = lista->siguiente;
    //  2 -> 4 -> 6 -> 8 -> null   4 -> 5 -> 6  ac=4  sg=6  nv=5
    while(nodoSiguiente && nuevoNodo->dato > nodoSiguiente->dato) {
      nodoActual = nodoSiguiente;
      nodoSiguiente = nodoSiguiente->siguiente;
    }
    nuevoNodo->siguiente = nodoSiguiente;
    nodoActual->siguiente = nuevoNodo;
  }
  return lista;
}

