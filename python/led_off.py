import RPi.GPIO as GPIO
import time
led_rouge = 17
GPIO.setmode(GPIO.BCM)
#gpio.setmode(gpio.BORD) 2eme faconne
on = GPIO.HIGH
GPIO.setup(led_rouge,GPIO.OUT)
GPIO.output(led_rouge,on)
