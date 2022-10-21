import from_data_base as telme
import temperature_humidie_air as t
import os

def verifier_temperature():
    resultat = telme.read_temperature_db()
    min_autoriser = resultat[0][0]
    max_autoriser = resultat[0][1]
    if t.get_temp > max_autoriser:
        