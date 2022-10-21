import to_data_base as cc
import mysql.connector

def read_temperature_db(v):
    mydb = cc.connexion()
    mycursor = mydb.cursor()
    sql = "SELECT ideal_temperature,ideal_temperature_max FROM room_parameter"
    mycursor.execute(sql)
    myresult = mycursor.fetchall()
    return myresult
    
def read_taux_co2_db():
    mydb = cc.connexion()
    mycursor = mydb.cursor()
    sql = "SELECT co2_taux_ideal,co2_taux_ideal_max FROM room_parameter"
    mycursor.execute(sql)
    myresult = mycursor.fetchall()
    return myresult
    

def read_humidity_db():
    mydb = cc.connexion()
    mycursor = mydb.cursor()
    sql = "SELECT ideal_humidity,ideal_humidity_max FROM room_parameter "
    mycursor.execute(sql)
    myresult = mycursor.fetchall()
    return myresult

def read_humidity_sol_db():
    mydb = cc.connexion()
    mycursor = mydb.cursor()
    sql = "SELECT ideal_humidity_sol,ideal_humidity_sol_max FROM  room_parameter"
    mycursor.execute(sql)
    myresult = mycursor.fetchall()
    return myresult

t = read_humidity_db()
print(t[0][1])