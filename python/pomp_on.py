import RPi.GPIO as GPIO
import time
GPIO.setwarnings(False)

pomp =24
GPIO.setmode(GPIO.BCM)
#gpio.setmode(gpio.BORD) 2eme faconne
on = GPIO.HIGH
GPIO.setup(pomp,GPIO.OUT)
GPIO.output(pomp,on)
