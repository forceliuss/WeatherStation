#include <Dhcp.h>
#include <Dns.h>
#include <SPI.h>
#include <Ethernet.h>
#include <EthernetClient.h>
#include <EthernetUdp.h>
#include <DHT.h>


//CHUVA
int nRainIn = A1;
int nRainDigitalIn = 4;
int nRainVal;
boolean bIsRaining = false;
String strRaining;
//TEMPERATURA
#define DHTPIN1 2 
#define DHTPIN2 3
#define DHTTYPE DHT22  
DHT dht1(DHTPIN1, DHTTYPE);
DHT dht2(DHTPIN2, DHTTYPE);

byte mac[] = {
  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
byte ip[] = {
  192,168,0,10};
byte server[] = {
  192,168,0,100};
//Variaveis
float h;
float t; 
float e; 
float z; 

EthernetClient client;

void setup() {

  Serial.begin(9600);

  // Teste 1:
  Serial.println("Ponto 0");
  Ethernet.begin(mac,ip);
  //CHUVA
  pinMode(4,INPUT);

  //TEMPERATURA DENTRO porta=2
  h = dht1.readHumidity();
  t = dht1.readTemperature();

  // Temperatura de FORA porta=3
  e = dht2.readHumidity();
  z = dht2.readTemperature();

  // Teste 2:
  //Serial.println("Ponto 1");
}

void loop() {

  nRainVal = analogRead(nRainIn);
  bIsRaining = !(digitalRead(nRainDigitalIn));

  if(bIsRaining){
    strRaining = "1";
  }
  else{
    strRaining = "0";
  }


  conexao();

  // Teste 2:
  Serial.println("Recebendo dados do Apache");
  while (client.available()) {
    char c = client.read();// recebendo cada caracter da string HTML
    Serial.print(c);
  }

  // if the server's disconnected, stop the client:
  if (!client.connected()) {
    Serial.println();
    Serial.println("disconnecting.");
    client.stop();


  }
//delay(500);// para deixar lento o recebimento, pode remover
}
void conexao(){
  // Teste 3:
  //Serial.print("Ponto 3");

  if (client.connect(server, 8080)) {
    Serial.println("Conexao bem Sucedida");
    //client.println("GET /projeto/teste.html");
    //client.println("GET /projeto/insere_arduino.php?t=1&e=2&z=9&c=5&h=6");
    
    client.print("GET /insere_arduino.php?");
     client.print("h=");
     //Umidade Dentro
     client.print(h);
     client.print("&t=");
     //Temp Dentro
     client.print(t);
     client.print("&e=");
     //Umidade Fora
     client.print(e);
     client.print("&z=");
     //Temp Fora
     client.print(z);
     client.print("&c=");
     //Chuva
     client.println(strRaining);
     //client.stop();
     
  } 
 
   delay(1000);
}







