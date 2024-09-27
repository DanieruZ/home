#ifndef ARCHIVO_INT_H_INCLUDED
#define ARCHIVO_INT_H_INCLUDED

int agregarDato();
void guardarEnArchivo(const char* nombreArchivo, int dato);
void agregarEnArchivo(const char* nombreArchivo);
void mostrarArchivo(const char* nombreArchivo);
void inicializarArchivo(const char* nombreArchivo, int cantidad, ...);
int contarArchivo(const char* nombreArchivo);
int buscarEnArchivo(const char* nombreArchivo, int datoBuscado);
bool existeEnArchivo(const char* nombreArchivo, int datoBuscado);
bool actualizarEnArchivo(const char* nombreArchivo, int datoBuscado, int nuevoValor);

#endif // ARCHIVO_INT_H_INCLUDED
