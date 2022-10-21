import RPi.GPIO as GPIO
import dht11
import time
import datetime

# initialize GPIO
GPIO.setwarnings(True)
GPIO.setmode(GPIO.BCM)

# read data using pin 14
instance = dht11.DHT11(pin=22)

def get_temp():
    print("Last valid input: " + str(datetime.datetime.now()))
    temp_air =result.temperature
    return temp_air

def get_hum():
    print("Last valid input: " + str(datetime.datetime.now()))
    hum_air =result.humidity
    return hum_air
try:
    while True:
        result = instance.read()
        if result.is_valid():
            get_temp()
            get_hum()
            

            print("Temperature: %-3.1f C" % result.temperature)
            print("Humidity: %-3.1f %%" % result.humidity)

        time.sleep(0.2)

except KeyboardInterrupt:
    print("Cleanup")
    GPIO.cleanup()