import serial
import time
import RPi.GPIO as GPIO
    

def sendSms(msg):
    port.write(b'AT+CMGF=1\r')
    time.sleep(3)
    port.write(b'AT+CMGS="+213662339867"\r')
    print("envoi du message...")
    time.sleep(3)
    port.write(str.encode(msg+chr(26)))
    time.sleep(3)
    print("message envoye...")

if __name__ == '__main__':
    seriel_port = "/dev/ttyAMA0" 
    port = serial.Serial(seriel_port, baudrate=9600, timeout=1)
    msg = '# c est mon message'
    sendSms(msg)
         
    time.sleep(100)
        
