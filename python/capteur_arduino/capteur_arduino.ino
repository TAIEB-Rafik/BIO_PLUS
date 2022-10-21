#include <MQ135.h>
#include "MQ135.h"

const int mq135Pin =A0;     // Pin sur lequel est branché de MQ135
MQ135 gasSensor = MQ135(mq135Pin);

void send_to_rpi(float ppm,int ldr,int water_lvl,int humidity_sol){
  Serial.print (ppm);
  Serial.print ("#");
  Serial.print(ldr);
  Serial.print("#");
  Serial.print (water_lvl);
  Serial.print ("#");
  Serial.println (humidity_sol);
  
  
}
void setup() {

  Serial.begin(9600);
}

void loop() {
  // lire les valeurs des differents capteurs
  float ppm = gasSensor.getPPM();
  int ldr = analogRead(A1);
  int water_lvl =analogRead(A2);
  int humidity_sol = analogRead(A3);
  send_to_rpi( ppm, ldr, water_lvl, humidity_sol);
  delay(3000);        // delay in between reads for stability
}
