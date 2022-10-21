import smtplib
from information import email_address,pass_word
from email.message import EmailMessage
import imghdr

def add_joint_file(files,msg):
    for file in files:
        with open(file,'rb')as f:
            file_data = f.read()
            file_name=f.name
        msg.add_attachement(file_data,maintype='application',
                            subtype='octet-stream',filename=file_name)

def send_my_email(msg):
        with smtplib.SMTP_SSL('smtp.gmail.com',465)as smtp:
            smtp.login(email_address,pass_word)
            smtp.send_message(msg)
        

def send_mail(destination,mon_msg):
    print("envoie de msg ")
    msg = EmailMessage()
    msg['Subject'] = "Notification from BIO PLUS"
    msg['From'] = email_address
    msg['To'] = destination
    msg.set_content(mon_msg)
    
    send_my_email(msg)
    print("message envoyer")

