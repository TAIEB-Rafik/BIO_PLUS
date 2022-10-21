<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\RoomParameter;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

        
class HomeController extends AbstractController
{
 
    
    
    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        $room = $this->getDoctrine()->getRepository(RoomParameter::class)->findOneBy(['id' => 1]);
        $onoff[1] = 'ON';
        $onoff[0] = 'OFF';
        $inverse[0] = 1;
        $inverse[1] = 0;

        return $this->render('home/index.html.twig', [
            'room' => $room,
            'onoff' => $onoff,
            'inverse' => $inverse,
        ]);
    }
    
    /**
     * @Route("/updatParameters", name="updatParameters")
     */
    public function updatParameters(EntityManagerInterface $entityManager)
    {  
        if (isset($_GET)) {
            $value = $_GET['param_val'];
            $type = $_GET['type'];

            $room = $this->getDoctrine()->getRepository(RoomParameter::class)->findOneBy(['id' => 1]);
            if (!$room) {
                throw $this->createNotFoundException(
                    'No Room found for id 1'
                );
            }
            switch ($type) {
                case 'temp_air':
                    $room->setIdealTemperature($value);
                    $entityManager->persist($room);
                    $entityManager->flush();
                    break;

                case 'humid_air':
                    $room->setIdealHumidity($value);
                    $entityManager->persist($room);
                    $entityManager->flush();
                    break;

                case 'humid_sol':
                    $room->setIdealHumiditySol($value);
                    $entityManager->persist($room);
                    $entityManager->flush();
                    break;

                case 'co2_taux':
                    $room->setCo2TauxIdeal($value);
                    $entityManager->persist($room);
                    $entityManager->flush();
                    break;

                case 'temp_air_max':
                    $room->setIdealTemperatureMax($value);
                    $entityManager->persist($room);
                    $entityManager->flush();
                    break;

                case 'humid_air_max':
                    $room->setIdealHumidityMax($value);
                    $entityManager->persist($room);
                    $entityManager->flush();
                    break;

                case 'humid_sol_max':
                    $room->setIdealHumiditySolMax($value);
                    $entityManager->persist($room);
                    $entityManager->flush();
                    break;

                case 'co2_taux_max':
                    $room->setCo2TauxIdealMax($value);
                    $entityManager->persist($room);
                    $entityManager->flush();
                    break;

                case 'allumerLed':
                    if($value == 0){
                        shell_exec('python /var/www/html/python/led_on.py');
                    }
                    elseif($value == 1){
                        shell_exec('python /var/www/html/python/led_off.py');
                    }
                    $room->setAllumerLed($value);
                    $entityManager->persist($room);
                    $entityManager->flush();
                    break;

                case 'declencherAroosage':
                    if($value == 0){
                        shell_exec('python /var/www/html/python/pomp_on.py');
                    }
                    elseif($value == 1){
                        shell_exec('python /var/www/html/python/pomp_off.py');
                    }
                    $room->setDeclencherAroosage($value);
                    $entityManager->persist($room);
                    $entityManager->flush();
                    break;

                case 'declencherVentilation':
                    if($value == 0){
                        shell_exec('python /var/www/html/python/ventilation_on.py');
                        shell_exec('python /var/www/html/python/servo_motor_on.py');
                    }
                    elseif($value == 1){
                        shell_exec('python /var/www/html/python/ventilation_off.py');
                        shell_exec('python /var/www/html/python/servo_motor_off.py');
                    }                
                    $room->setDeclencherVentilation($value);
                    $entityManager->persist($room);
                    $entityManager->flush();
                    break;
            }
            die();
        } 

    }
    
    /**
     * @Route("/getNotification", name="getNotification")
     */
    public function getNotification(EntityManagerInterface $entityManager)
    { 

        $room = $this->getDoctrine()->getRepository(RoomParameter::class)->findOneBy(['id' => 1]);
        $incendie = $room->getNotificationIncendie();
        $reservoirevide = $room->getNotificationManqueHumidity();

        if ($incendie == 1 ) {
            
            $room->setNotificationIncendie(0);
            $entityManager->persist($room);
            $entityManager->flush();
        }

        if ($reservoirevide == 1) {


            $room->setNotificationManqueHumidity(0);
            $entityManager->persist($room);
            $entityManager->flush();
        }

        $data['incendie'] = $incendie;
        $data['reservoirevide'] = $reservoirevide;


        
        echo json_encode($data);die();

    }



    /**
     * @Route("/getActualParam", name="getActualParam")
     */
    public function getActualParam()
    { 
        $room = $this->getDoctrine()->getRepository(RoomParameter::class)->findOneBy(['id' => 1]);

        $params['temp_air_actual'] = $room->getTemperature();
        $params['humidity_actual'] = $room->getHumidity();
        $params['humidity_sol_actual'] = $room->getHumiditySol();
        $params['co2_taux_actual'] = $room->getTauxCo2();

        echo json_encode($params);die();

    }


}
