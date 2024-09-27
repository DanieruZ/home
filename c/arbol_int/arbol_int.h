#ifndef ARBOL_INT_H_INCLUDED
#define ARBOL_INT_H_INCLUDED

typedef struct {
  int dato;
  struct Arbol* izquierda;
  struct Arbol* derecha;
} Arbol;

Arbol* crearArbol();
Arbol* crearNodoArbol(int dato);

Arbol* agregarNodoArbol(Arbol* arbol, Arbol* nuevoNodo);
Arbol* agregarNodoArbolSinRepetir(Arbol* arbol, Arbol* nuevoNodo);
Arbol* inicializarArbol(int cantidad, ...);

void mostrarNodoArbol(Arbol* nodo);
void mostrarArbolPreOrden(Arbol* arbol);
void mostrarArbolInOrden(Arbol* arbol);
void mostrarArbolPosOrden(Arbol* arbol);
void mostrarArbol(Arbol* arbol, int* ejeX, int ejeY);

Arbol* buscarNodoArbol(Arbol* arbol, Arbol* nodoBuscado);
Arbol* buscarNodoArbol_2(Arbol* arbol, Arbol* nodoBuscado);
Arbol* buscarUltimoIzquierdaArbol(Arbol* arbol);
Arbol* buscarUltimoDerechaArbol(Arbol* arbol);

Arbol* actualizarNodoArbol(Arbol* arbol, Arbol* nodoBuscado, int nuevoValor);

Arbol* eliminarArbol(Arbol* arbol);
void eliminarArbolPD(Arbol** arbol);
Arbol* eliminarNodoArbol(Arbol* arbol, Arbol* nodoBuscado);

bool existeNodoArbol(Arbol* arbol, Arbol* nodoBuscado);
bool esHoja(Arbol* arbol);
bool esHoja_2(Arbol* arbol);
int esHoja_3(Arbol* arbol);

int calcularAlturaArbol(Arbol* arbol);
int contarArbol(Arbol* arbol);
int contarArbol_2(Arbol* arbol);

#endif // ARBOL_INT_H_INCLUDED
