#include <stdio.h>
#include <stdlib.h>
#include <stddef.h>
#include <stdarg.h>
#include <stdbool.h>
#include <malloc.h>
#include "arbol_int.h"

// Crea un nuevo arbol vacio.
Arbol* crearArbol() {
  return NULL;
}


// Crea un nuevo nodo.
Arbol* crearNodoArbol(int dato) {
  Arbol* nuevoNodo = (Arbol*) malloc(sizeof(Arbol));
  nuevoNodo->dato = dato;
  nuevoNodo->izquierda = NULL;
  nuevoNodo->derecha = NULL;
  return nuevoNodo;
}


// Agrega un nuevo nodo a un arbol.
Arbol* agregarNodoArbol(Arbol* arbol, Arbol* nuevoNodo) {
  if(!arbol) {
    arbol = nuevoNodo;
  }
  else if(arbol->dato > nuevoNodo->dato) {
    arbol->izquierda = agregarNodoArbol(arbol->izquierda, nuevoNodo);
  }
  else {
    arbol->derecha = agregarNodoArbol(arbol->derecha, nuevoNodo);
  }
  return arbol;
}


// Agrega un nuevo nodo si no existe a un arbol.
Arbol* agregarNodoArbolSinRepetir(Arbol* arbol, Arbol* nuevoNodo) {
  bool existeNodo = existeNodoArbol(arbol, nuevoNodo);

  if(!arbol) {
    arbol = nuevoNodo;
  }
  else if(existeNodo == false && arbol->dato > nuevoNodo->dato) {
    arbol->izquierda = agregarNodoArbol(arbol->izquierda, nuevoNodo);
  }
  else if(existeNodo == false && arbol->dato < nuevoNodo->dato) {
    arbol->derecha = agregarNodoArbol(arbol->derecha, nuevoNodo);
  }
  return arbol;
}


/*
 * Crea e inicializa un arbol con valores enteros.
 * parametros: cantidad de valores a agregar.
 * parametros: numeros enteros.
 */
Arbol* inicializarArbol(int cantidad, ...) {
  Arbol* arbol = crearArbol();
  va_list args;  // Crea la lista de argumentos.
  va_start(args, cantidad);  // Inicializa la lista de argumentos.

  for(int i = 0; i < cantidad; i++) {
    int dato = va_arg(args, int);  // Obtiene el siguiente argumento.
    arbol = agregarNodoArbol(arbol, crearNodoArbol(dato));
  }
  va_end(args);  // Finaliza el uso de la lista de argumentos.
  return arbol;
}


// Muestra el dato de un nodo.
void mostrarNodoArbol(Arbol* nodo) {
  if(nodo) {
    printf(" %d -", nodo->dato);
  }
}


// Muestra el contenido de un arbol en Pre-Orden (Raiz-Izquierda-Derecha).
void mostrarArbolPreOrden(Arbol* arbol) {
  if(arbol) {
    mostrarNodoArbol(arbol);
//    printf(" %d -", arbol->dato);
    mostrarArbolPreOrden(arbol->izquierda);
    mostrarArbolPreOrden(arbol->derecha);
  }
}


// Muestra el contenido de un arbol en In-Orden (Izquierda-Raiz-Derecha).
void mostrarArbolInOrden(Arbol* arbol) {
  if(arbol) {
    mostrarArbolInOrden(arbol->izquierda);
    mostrarNodoArbol(arbol);
    mostrarArbolInOrden(arbol->derecha);
  }
}


// Muestra el contenido de un arbol en Pos-Orden (Izquierda-Derecha-Raiz).
void mostrarArbolPosOrden(Arbol* arbol) {
  if(arbol) {
    mostrarArbolPosOrden(arbol->izquierda);
    mostrarArbolPosOrden(arbol->derecha);
    mostrarNodoArbol(arbol);
  }
}


// Muestra el contenido de un arbol graficamente.
void mostrarArbol(Arbol* arbol, int* ejeX, int ejeY) {
  if (!arbol) {
    return;  // Arbol vacio, nada que mostrar.
  }
  (*ejeX) += 5;  // Variable que permite posicionarse en el eje X.
  mostrarArbol(arbol->izquierda, ejeX, ejeY + 2);  // SubArbol izquierdo.
  gotoxy(0 + (*ejeX) - ejeY, ejeY + 3);  // Posiciona el nodo.
  printf("[%d]\n\n", arbol->dato);
  mostrarArbol(arbol->derecha, ejeX, ejeY + 2);  // SubArbol derecho.
}


// Busca un nodo especifico en un arbol.
Arbol* buscarNodoArbol(Arbol* arbol, Arbol* nodoBuscado) {
  Arbol* nodoEncontrado = NULL;

  if(arbol) {
    if(arbol->dato == nodoBuscado->dato) {
      nodoEncontrado = arbol;
    }
    else if(arbol->dato > nodoBuscado->dato) {
      nodoEncontrado = buscarNodoArbol(arbol->izquierda, nodoBuscado);
    }
    else {
      nodoEncontrado = buscarNodoArbol(arbol->derecha, nodoBuscado);
    }
  }
  return nodoEncontrado;
}


// Busca un nodo especifico en un arbol con ternario.
Arbol* buscarNodoArbol_2(Arbol* arbol, Arbol* nodoBuscado) {
  return
    arbol
      ? (arbol->dato == nodoBuscado->dato
        ? arbol
        : (arbol->dato > nodoBuscado->dato
          ? buscarNodoArbol(arbol->izquierda, nodoBuscado)
          : buscarNodoArbol(arbol->derecha, nodoBuscado)))
      : NULL;
}


// Comprueba si un nodo existe en un arbol.
bool existeNodoArbol(Arbol* arbol, Arbol* nodoBuscado) {
  bool existe = false;

  if(arbol) {
    if(arbol->dato == nodoBuscado->dato) {
      existe = true;
    }
    else if(arbol->dato > nodoBuscado->dato) {
      existe = buscarNodoArbol(arbol->izquierda, nodoBuscado);
    }
    else {
      existe = buscarNodoArbol(arbol->derecha, nodoBuscado);
    }
  }
  return existe;
}


// Busca el nodo que se encuentra mas a la izquierda.
Arbol* buscarUltimoIzquierdaArbol(Arbol* arbol) {
  while(arbol->izquierda) {
    arbol = arbol->izquierda;
  }
  return arbol;
}


// Busca el nodo que se encuentra mas a la derecha.
Arbol* buscarUltimoDerechaArbol(Arbol* arbol) {
  while(arbol->derecha) {
    arbol = arbol->derecha;
  }
  return arbol;
}


// Elimina el contenido de un arbol.
Arbol* eliminarArbol(Arbol* arbol) {
  if(arbol) {
    arbol->izquierda = eliminarArbol(arbol->izquierda);
    arbol->derecha = eliminarArbol(arbol->derecha);
    free(arbol);
    return NULL;
  }
}


// Elimina el contenido de un arbol con puntero doble.
void eliminarArbolPD(Arbol** arbol) {
  if(*arbol) {
    eliminarArbol(&(*arbol)->izquierda);
    eliminarArbol(&(*arbol)->derecha);
    free(*arbol);
    *arbol = NULL;
  }
}


// Eliminar un nodo especifico en un arbol.
Arbol* eliminarNodoArbol(Arbol* arbol, Arbol* nodoBuscado) {
  if(arbol) {
    if(arbol->dato == nodoBuscado->dato) {
      if(esHoja(arbol)) {
        free(arbol);
        arbol = NULL;
      }
      else if(arbol->izquierda) {
        Arbol* ultimoIzquierda = buscarUltimoIzquierdaArbol(arbol->izquierda);
        arbol->dato = ultimoIzquierda->dato;
        arbol->izquierda = eliminarNodoArbol(arbol->izquierda, ultimoIzquierda);
      }
      else if(arbol->derecha) {
        Arbol* ultimoDerecha = buscarUltimoDerechaArbol(arbol->derecha);
        arbol->dato = ultimoDerecha->dato;
        arbol->derecha = eliminarNodoArbol(arbol->derecha, ultimoDerecha);
      }
    }
    else if(arbol->dato > nodoBuscado->dato) {
      arbol->izquierda = eliminarNodoArbol(arbol->izquierda, nodoBuscado);
    }
    else {
      arbol->derecha = eliminarNodoArbol(arbol->derecha, nodoBuscado);
    }
  }
  return arbol;
}


// Actualiza el valor de un nodo en un arbol.
Arbol* actualizarNodoArbol(Arbol* arbol, Arbol* nodoBuscado, int nuevoValor) {
  Arbol* nodoActualizar = buscarNodoArbol(arbol, nodoBuscado);

  if(nodoActualizar) {
    nodoActualizar->dato = nuevoValor;
  }
  return arbol;
}


// Evalua si el nodo es una hoja con booleano ternario.
bool esHoja(Arbol* arbol) {
  return (!arbol->izquierda && !arbol->derecha) ? true : false;
}


// Evalua si el nodo es una hoja con booleano.
bool esHoja_2(Arbol* arbol) {
  bool hoja = false;

  if(!arbol->izquierda && !arbol->derecha) {
    hoja = true;
  }
  return hoja;
}


// Evalua si el nodo es una hoja con bandera (flag).
int esHoja_3(Arbol* arbol) {
  int hoja = 0;

  if(!arbol->izquierda && !arbol->derecha) {
    hoja = 1;
  }
  return hoja;
}


// Calcula el total de nodos hoja en un arbol.
int contarHojasArbol(Arbol* arbol) {
  int contador = 0;

  if(arbol) {
    if(esHoja(arbol)) {
      contador++;
    }
    else {
      contador = contarHojasArbol(arbol->izquierda) + contarHojasArbol(arbol->derecha);
    }
  }
  return contador;
}


// Calcula la altura de un arbol.
int calcularAlturaArbol(Arbol* arbol) {
  if(!arbol) {
    return 0;
  }
  int alturaIzquierda = calcularAlturaArbol(arbol->izquierda);
  int alturaDerecha = calcularAlturaArbol(arbol->derecha);

  return (alturaIzquierda > alturaDerecha
           ? alturaIzquierda
           : alturaDerecha) + 1;
}


// Calcula el total de nodos en un arbol.
int contarArbol(Arbol* arbol) {
  return (arbol)
    ? contarArbol(arbol->izquierda) + contarArbol(arbol->derecha) + 1
    : 0;
}


// Calcula el total de nodos en un arbol.
int contarArbol_2(Arbol* arbol) {
  int contador = 0;

  if(arbol) {
    contador++;
    contador += contarArbol(arbol->izquierda);
    contador += contarArbol(arbol->derecha);
  }
  return contador;
}

