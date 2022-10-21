import serial
import time
import schedule
import alert_serre as al
import to_data_base as bd

def verifier_valeurs(tab):
    co2 = float(tab[0])
    ldr = int(tab[1])
    water_lvl = int(tab[2])
    hum_sol = int(tab[3])
    #verification des capteur
    if ldr < 40:
        al.alert_ldr()
    if co2 > 3000:
        al.alert_capteur_mq135()
    
    


    

    
def connexion_arduino():
    try:
        print("etablissment connection serie entre arduino, Raspberry pi")
        arduino = serial.Serial("/dev/ttyACM0",9600)
    except:
        print("connexion echoue ")
    
    return arduino

def data_arduino():
    
    arduino = connexion_arduino()
    arduino_data = arduino.readline()
    decode_values = str(arduino_data.decode("utf-8"))
    list_values = decode_values.split("#")
    for i in list_values:
        print(i)
    return list_values


#schedule.every(1).seconds.do(data_arduino)
#while True:
    #schedule.run_pending()
#    verifier_valeurs(data_arduino())
al.alert_dht11()
al.alert_reservoire()
al.alert_ldr()