<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\Souvenir;
use Doctrine\ORM\EntityManagerInterface;

class SouvenirPersister implements DataPersisterInterface
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function supports($data) : bool 
    {
        return $data instanceof Souvenir;
    }

    public function persist($data)
    {
        $data->setCreatedAt(new \DateTime());
        $this->em->persist($data);
    }

    public function remove($data)
    {
        $this->em->remove($data);
        $this->em->flush();
    }
}