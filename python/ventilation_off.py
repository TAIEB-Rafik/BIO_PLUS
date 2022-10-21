import RPi.GPIO as GPIO
import os
from time import sleep
GPIO.setwarnings(False)

clim =18
GPIO.setmode(GPIO.BCM)
GPIO.setup(clim,GPIO.OUT)
print("desactiver la climatisation dans la serre")
GPIO.output(clim,GPIO.LOW)
GPIO.cleanup()