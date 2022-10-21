import RPi.GPIO as GPIO
import os
from time import sleep
GPIO.setwarnings(False)
GPIO.cleanup()
clim =18
GPIO.setmode(GPIO.BCM)
GPIO.setup(clim,GPIO.OUT)
print("activation de la climatisation dans la serre")
GPIO.output(clim,GPIO.HIGH)
