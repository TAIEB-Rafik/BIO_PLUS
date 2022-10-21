import send_email as alert
import information as inf
import serial
import time
import RPi.GPIO as GPIO
seriel_port = "/dev/ttyAMA0" 
port = serial.Serial(seriel_port, baudrate=9600, timeout=1)

def sendSms(msg):
    port.write(b'AT+CMGF=1\r')
    time.sleep(3)
    port.write(b'AT+CMGS="+213656937265"\r')
    print("envoi du message...")
    time.sleep(3)
    port.write(str.encode(msg+chr(26)))
    time.sleep(3)
    print("message envoye...")

def alert_reservoire():
    msg="""veuillez remplir le reservoir d'eau 
            """
    alert.send_mail(destination=inf.hanane,mon_msg=msg)
    sendSms(msg)


def alert_capteur_mq135():
    msg="""le capteur de gaz a rencontrer un probleme
            veuillez verifier le capteur ou/et le branchage
"""
    alert.send_mail(destination=inf.hanane,mon_msg=msg)
    sendSms(msg)

def alert_ldr():
    msg="""le capteur de luminosite a rencontrer un probleme
            veuillez verifier le capteur ou/et le branchage
"""
    alert.send_mail(destination=inf.hanane,mon_msg=msg)
    sendSms(msg)

def alert_dht11():
    msg="""le capteur de temperature a rencontrer un probleme
            veuillez verifier le capteur ou/et le branchage
   """
    alert.send_mail(destination=inf.hanane,mon_msg=msg)
    sendSms(msg)
    
def alert_capteur_lvl_eau():
    msg="""le capteur de niveau_d'eau a rencontrer un probleme
            veuillez verifier le capteur ou/et le branchage
"""
    alert.send_mail(destination=inf.hanane,mon_msg=msg)
    sendSms(msg)
    
 
 
 