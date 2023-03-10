#include <SPI.h>
#include <MFRC522.h>

#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>

//Network SSID
const char* ssid = "pon";
const char* password = "12345678";

//pengenal host (server) = IP Address komputer server
const char* host = "192.168.193.186";

#define LED_PIN 15 //D8
#define BTN_PIN D1  //D1

//sediakan variabel untuk RFID
#define SDA_PIN 2  //D4
#define RST_PIN 0  //D3

MFRC522 mfrc522(SDA_PIN, RST_PIN);

void setup() {
  Serial.begin(115200);

  //setting koneksi wifi
  WiFi.hostname("NodeMCU");
  WiFi.begin(ssid, password);

  //cek koneksi wifi
  while(WiFi.status() != WL_CONNECTED)
  {
    //progress sedang mencari WiFi
    delay(500);
    Serial.print(".");
  }

  Serial.println("Wifi Connected");
  Serial.println("IP Address : ");
  Serial.println(WiFi.localIP());

  pinMode(LED_PIN, OUTPUT);
  pinMode(BTN_PIN, OUTPUT);

  SPI.begin();
  mfrc522.PCD_Init();
  Serial.println("Dekatkan Kartu RFID Anda ke Reader");
  Serial.println();
}

void loop() {
  //baca status pin button kemudian uji
//  if(digitalRead(BTN_PIN)==1)   //ditekan
//  {
//     Serial.println("OK");
//     //nyalakan lampu LED
//     digitalWrite(LED_PIN, HIGH);
//     while(digitalRead(BTN_PIN)==1) ;   //menahan proses sampai tombol dilepas
//     //ubah mode absensi di aplikasi web
//     String getData, Link ;
//     HTTPClient http ;
//     //Get Data
//     Link = "http://192.168.43.20/absensi/ubahmode.php";
//     http.begin(Link);
//
//     int httpCode = http.GET();
//     String payload = http.getString();
//
//     Serial.println(payload);
//     http.end();
//  }

  //matikan lampu LED
  digitalWrite(LED_PIN, LOW);

  if(! mfrc522.PICC_IsNewCardPresent())
     return ;

  if(! mfrc522.PICC_ReadCardSerial())
     return ;

  String IDTAG = "";
  for(byte i=0; i<mfrc522.uid.size; i++)
  {
      IDTAG += mfrc522.uid.uidByte[i];
  }



  //kirim nomor kartu RFID untuk disimpan ke tabel tmprfid
  WiFiClient client;
  const int httpPort = 80;
  if(!client.connect(host, httpPort))
  {
     Serial.println("Connection Failed");
     digitalWrite(LED_PIN, HIGH);
     delay(200);
     digitalWrite(LED_PIN, LOW);
     delay(100);
     digitalWrite(LED_PIN, HIGH);
     delay(200);
     digitalWrite(LED_PIN, LOW);
     return;
  }
  
  //nyalakan lampu LED
  digitalWrite(LED_PIN, HIGH);
  String Link;
  HTTPClient http;
  Link = "http://192.168.193.186/absensiv3/absensi.php?token=A001&nokartu=" + IDTAG;
  http.begin(Link);

  int httpCode = http.GET();
  String payload = http.getString();
  Serial.println(payload);
  http.end();

  delay(2000);
}
