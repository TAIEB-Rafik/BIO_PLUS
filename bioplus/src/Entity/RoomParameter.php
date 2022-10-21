<?php

namespace App\Entity;

use App\Repository\RoomParameterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoomParameterRepository::class)
 */
class RoomParameter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $temperature;

    /**
     * @ORM\Column(type="float")
     */
    private $humidity;

    /**
     * @ORM\Column(type="float")
     */
    private $tauxCo2;

    /**
     * @ORM\Column(type="float")
     */
    private $humiditySol;

    /**
     * @ORM\Column(type="smallint")
     */
    private $notificationIncendie;

    /**
     * @ORM\Column(type="smallint")
     */
    private $notificationManqueHumidity;

    /**
     * @ORM\Column(type="smallint")
     */
    private $declencherVentilation;

    /**
     * @ORM\Column(type="smallint")
     */
    private $declencherAroosage;

    /**
     * @ORM\Column(type="smallint")
     */
    private $allumerLed;

    /**
     * @ORM\Column(type="smallint")
     */
    private $openWindow;

    /**
     * @ORM\Column(type="float")
     */
    private $idealTemperature;

    /**
     * @ORM\Column(type="float")
     */
    private $idealHumidity;

    /**
     * @ORM\Column(type="float")
     */
    private $idealHumiditySol;

    /**
     * @ORM\Column(type="float")
     */
    private $co2TauxIdeal;

    /**
     * @ORM\Column(type="float")
     */
    private $idealTemperatureMax;

    /**
     * @ORM\Column(type="float")
     */
    private $idealHumidityMax;

    /**
     * @ORM\Column(type="float")
     */
    private $idealHumiditySolMax;

    /**
     * @ORM\Column(type="float")
     */
    private $co2TauxIdealMax;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getHumidity(): ?float
    {
        return $this->humidity;
    }

    public function setHumidity(float $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getTauxCo2(): ?float
    {
        return $this->tauxCo2;
    }

    public function setTauxCo2(float $tauxCo2): self
    {
        $this->tauxCo2 = $tauxCo2;

        return $this;
    }

    public function getHumiditySol(): ?float
    {
        return $this->humiditySol;
    }

    public function setHumiditySol(float $humiditySol): self
    {
        $this->humiditySol = $humiditySol;

        return $this;
    }

    public function getNotificationIncendie(): ?int
    {
        return $this->notificationIncendie;
    }

    public function setNotificationIncendie(int $notificationIncendie): self
    {
        $this->notificationIncendie = $notificationIncendie;

        return $this;
    }

    public function getNotificationManqueHumidity(): ?int
    {
        return $this->notificationManqueHumidity;
    }

    public function setNotificationManqueHumidity(int $notificationManqueHumidity): self
    {
        $this->notificationManqueHumidity = $notificationManqueHumidity;

        return $this;
    }

    public function getDeclencherVentilation(): ?int
    {
        return $this->declencherVentilation;
    }

    public function setDeclencherVentilation(int $declencherVentilation): self
    {
        $this->declencherVentilation = $declencherVentilation;

        return $this;
    }

    public function getDeclencherAroosage(): ?int
    {
        return $this->declencherAroosage;
    }

    public function setDeclencherAroosage(int $declencherAroosage): self
    {
        $this->declencherAroosage = $declencherAroosage;

        return $this;
    }

    public function getAllumerLed(): ?int
    {
        return $this->allumerLed;
    }

    public function setAllumerLed(int $allumerLed): self
    {
        $this->allumerLed = $allumerLed;

        return $this;
    }

    public function getOpenWindow(): ?int
    {
        return $this->openWindow;
    }

    public function setOpenWindow(int $openWindow): self
    {
        $this->openWindow = $openWindow;

        return $this;
    }

    public function getIdealTemperature(): ?float
    {
        return $this->idealTemperature;
    }

    public function setIdealTemperature(float $idealTemperature): self
    {
        $this->idealTemperature = $idealTemperature;

        return $this;
    }

    public function getIdealHumidity(): ?float
    {
        return $this->idealHumidity;
    }

    public function setIdealHumidity(float $idealHumidity): self
    {
        $this->idealHumidity = $idealHumidity;

        return $this;
    }

    public function getIdealHumiditySol(): ?float
    {
        return $this->idealHumiditySol;
    }

    public function setIdealHumiditySol(float $idealHumiditySol): self
    {
        $this->idealHumiditySol = $idealHumiditySol;

        return $this;
    }

    public function getCo2TauxIdeal(): ?float
    {
        return $this->co2TauxIdeal;
    }

    public function setCo2TauxIdeal(float $co2TauxIdeal): self
    {
        $this->co2TauxIdeal = $co2TauxIdeal;

        return $this;
    }

    public function getIdealTemperatureMax(): ?float
    {
        return $this->idealTemperatureMax;
    }

    public function setIdealTemperatureMax(float $idealTemperatureMax): self
    {
        $this->idealTemperatureMax = $idealTemperatureMax;

        return $this;
    }

    public function getIdealHumidityMax(): ?float
    {
        return $this->idealHumidityMax;
    }

    public function setIdealHumidityMax(float $idealHumidityMax): self
    {
        $this->idealHumidityMax = $idealHumidityMax;

        return $this;
    }

    public function getIdealHumiditySolMax(): ?float
    {
        return $this->idealHumiditySolMax;
    }

    public function setIdealHumiditySolMax(float $idealHumiditySolMax): self
    {
        $this->idealHumiditySolMax = $idealHumiditySolMax;

        return $this;
    }

    public function getCo2TauxIdealMax(): ?float
    {
        return $this->co2TauxIdealMax;
    }

    public function setCo2TauxIdealMax(float $co2TauxIdealMax): self
    {
        $this->co2TauxIdealMax = $co2TauxIdealMax;

        return $this;
    }
}
