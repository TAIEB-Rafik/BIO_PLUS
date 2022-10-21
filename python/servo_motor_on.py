import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BCM) #Use Board numerotation mode
GPIO.setwarnings(False) #Disable warnings
#Set function to calculate percent from angle
def angle_to_percent (angle) :
    if angle > 180 or angle < 0 :
        return False
    start = 4
    end = 12.5
    ratio = (end - start)/180 #Calcul ratio from angle to percent
    angle_as_percent = angle * ratio
    return start + angle_as_percent




#Use pin 21 for PWM signal
pwm_gpio = 21
frequence = 50
GPIO.setup(pwm_gpio, GPIO.OUT)
pwm = GPIO.PWM(pwm_gpio, frequence)

#Init at 80°

pwm.start(angle_to_percent(80))
time.sleep(1)
#Finish at 180°

pwm.ChangeDutyCycle(angle_to_percent(180))
time.sleep(1)
#Close GPIO & cleanup
pwm.stop()
GPIO.cleanup()
#Go at 90°





