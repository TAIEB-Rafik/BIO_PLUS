import mysql.connector

def connexion():
    mydb = mysql.connector.connect(
      host="localhost",
      user="root",
      password="memoire",
      database="memoire"
    )
    return mydb

def insert_tmp_hum_db(v):
    mydb = connexion()
    cursor = mydb.cursor()
    sql = "UPDATE room_parameter SET temperature WHERE temperature = %s"
    val = v
    mycursor.execute(sql, val)
    mydb.commit()
    
def insert_taux_co2_db(v):
    mydb = connexion()
    cursor = mydb.cursor()
    sql = "UPDATE room_parameter SET taux_co2 WHERE taux_co2 = %s"
    val = v
    mycursor.execute(sql, val)
    mydb.commit()

def insert_humidity_db(v):
    mydb = connexion()
    cursor = mydb.cursor()
    sql = "UPDATE room_parameter SET humidity WHERE humidity = %s"
    val = v
    mycursor.execute(sql, val)
    mydb.commit()

def insert_humidity_sol_db(v):
    mydb = connexion()
    cursor = mydb.cursor()
    sql = "UPDATE room_parameter SET humidity_sol WHERE humidity_sol = %s"
    val = v
    mycursor.execute(sql, val)
    mydb.commit()