#include <stdio.h>
#include <stdlib.h>
#include <windows.h>


// Cambia la combinacion de color de fondo y frente.
void color(int x) {  
  SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), x);
}


// Cambia las coordenadas del cursor.
void gotoxy(int X,int Y) {  
  HANDLE hcon;
  hcon = GetStdHandle(STD_OUTPUT_HANDLE);
  COORD dwPos;
  dwPos.X = X;
  dwPos.Y = Y;
  SetConsoleCursorPosition(hcon, dwPos);
}


// Devuelve la posicion de X.
int whereX() {             
  CONSOLE_SCREEN_BUFFER_INFO sbi;
  GetConsoleScreenBufferInfo (GetStdHandle(STD_OUTPUT_HANDLE), &sbi);
  return sbi.dwCursorPosition.X;
}


// Devuelve la posicion de Y.
int whereY() {    
  CONSOLE_SCREEN_BUFFER_INFO sbi;
  GetConsoleScreenBufferInfo (GetStdHandle(STD_OUTPUT_HANDLE), &sbi);
  return sbi.dwCursorPosition.Y;
}


// Funcion para mostrar u ocultar el cursor.
void hidecursor(int ver){     
  HANDLE consoleHandle = GetStdHandle(STD_OUTPUT_HANDLE);
  CONSOLE_CURSOR_INFO info;
  info.dwSize = 1;
  info.bVisible = ver;
  SetConsoleCursorInfo(consoleHandle, &info);
}

